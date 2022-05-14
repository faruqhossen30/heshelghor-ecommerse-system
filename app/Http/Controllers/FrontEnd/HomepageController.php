<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use App\Models\Product\Brand;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    public function homePage()
    {

        // $categories = Cache::rememberForever('categories', function () {
        //     return Category::with('products')->orderBy('name', 'asc')->get();
        // });

        // $subcategories = Cache::rememberForever('subcategories', function () {
        //     return SubCategory::inRandomOrder()->get();
        // });
        // $brands = Cache::rememberForever('brands', function () {
        //     return Brand::latest('id')->get();
        // });
        // $products = Cache::rememberForever('products', function () {
        //     return Product::latest('id')->paginate(8);
        // });



        $categories = Category::with('products')->orderBy('name', 'asc')->get();
        $subcategories = SubCategory::with('category')->get()->random(10);
        $brands = Brand::get()->random(10);


        $products = Product::with('category', 'subcategory')->take(8)->orderBy('id', 'desc')->get();
        // return $subcategories;


        return view('frontend.homepage', compact(
            'categories',
            'subcategories',
            'brands',
            'products'
        ));
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
        return view('frontend.terms-and-condition');
    }
    public function returnPolicy()
    {
        return view('frontend.return-policy');
    }
}
