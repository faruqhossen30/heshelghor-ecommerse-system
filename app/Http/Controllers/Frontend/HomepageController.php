<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use App\Models\Admin\Market;
use App\Models\Admin\Promotion\Slider;
use App\Models\Merchant\Shop;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use App\Models\Product\Brand;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\returnSelf;

class HomepageController extends Controller
{
    public function homePage()
    {

        $categories = Category::inRandomOrder()->take(12)->get();
        $markets = Market::inRandomOrder()->take(12)->get();
        // $sliders = Slider::latest()->get();

        $sliders = Cache::rememberForever('sliders', function () {
            return Slider::latest()->get();
        });



        // Featured Shops
        $promotion_products = option('promotion_shops');
        $shops = null;
        if ($promotion_products) {
            $shops = Shop::whereIn('id', $promotion_products)->take(12)->get();
        };
        // Featurd products
        $promotion_products = option('promotion_products');
        $featursproducts = null;
        if ($promotion_products) {
            $featursproducts = Product::whereIn('id', $promotion_products)->select('id', 'title', 'slug', 'price', 'discount', 'img_small')->inRandomOrder()->take(12)->get();
        };

        // $promotion_subcategoryies = option('promotion_subcategoryies');


        // return $promotion_subcategoryies;




        return view('frontend.homepage', compact('shops', 'categories', 'markets', 'sliders', 'featursproducts'));
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function promotion()
    {
        return view('frontend.promotion');
    }
    public function jobs()
    {
        $jobs = Job::get();
        return view('frontend.job.jobs', compact('jobs'));
    }
    public function jobsShow(Request $request, $id)
    {
        $job = Job::firstWhere('id', $id);
        $jobs = Job::get();
        // return $job;
        return view('frontend.job.show', compact('job', 'jobs'));
    }
    public function termsAndCondition()
    {
        return view('frontend.termsand-condition');
    }
    public function returnPolicy()
    {
        return view('frontend.return-policy');
    }

    public function ajaxOffcanvascategory()
    {
        $categories = Cache::rememberForever('categoriesWisthSubcategories', function () {
            return Category::with(['subcategories' => function ($query) {
                return $query->select(['id', 'category_id', 'name', 'slug', 'photo'])->orderBy('name', 'asc');
            }])->select('id', 'name', 'slug', 'photo')->orderBy('name', 'asc')->get();
        });

        $data = view('frontend.ajax.offcanvascategories', compact('categories'));
        return $data;
    }

    public function ajaxSearch(Request $request)
    {
        // return $request->all();
        $keyword = $request->keyword;
        $products = Product::where('title', 'like', '%' . $request->keyword . '%')->take(4)->get();
        $data = view('frontend.ajax.ajaxproductsearch', compact('products', 'keyword'));
        return $data;
    }
}
