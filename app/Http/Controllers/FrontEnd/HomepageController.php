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

class HomepageController extends Controller
{
    public function homePage()
    {

        $categories = Category::inRandomOrder()->take(12)->get();
        $shops = Shop::inRandomOrder()->take(12)->get();
        $markets = Market::inRandomOrder()->take(12)->get();
        $sliders = Slider::latest()->get();
        $featursproducts = Product::where('category_id', 38)->select('id', 'title', 'slug', 'price', 'discount', 'img_small')->inRandomOrder()->take(12)->get();

        $ladiesproduct = Product::where('category_id', 3)->select('id', 'title', 'slug', 'price', 'regular_price', 'discount', 'img_small')->inRandomOrder()->take(12)->get();

        // return $featursproducts;
        // homepage update

        return view('frontend.homepage', compact('shops', 'categories', 'markets', 'sliders', 'featursproducts', 'ladiesproduct'));
    }
    // Search
    public function search($keyword)
    {

        $result = Product::active()->where('title', 'like', "%$keyword%")
            ->get();
        return $result;
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
        // return "welcome";
        $categories = Category::with('subcategories')->get();
        // return $categories;
        $data = view('frontend.ajax.offcanvascategories', compact('categories'));

        return $data;
    }
}
