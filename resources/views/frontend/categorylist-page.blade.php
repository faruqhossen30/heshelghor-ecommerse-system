@extends('frontend.layouts.app')
@section('content')
        <!-- breadcrumb start -->
        <div class="breadcrumb-area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 offset-lg-3 col-lg-6">
                        <div class="breadcrumb-search-bar text-center">
                            <h2 class="text-white">All Categories</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- category start -->
        <div class="category-area pt-5 pb-5" style="background-color: #FCE6DF;">
            <div class="container">
                @foreach ($categories as $category)
                <div class="row">
                    <div class="subcategory-title d-flex justify-content-between align-items-center">
                        <span style="font-size: 20px;" class="category-border">{{$category->name}} </span>
                        <span style="font-size: 15px;"><a href="{{route('categorypage', $category->slug)}}">View All</a> </span>
                    </div>
                    @foreach ($category->subcategories as $subcategory)
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                        <a href="{{route('subcategorypage', $subcategory->slug)}}" class="category_links  ">
                            <div class="single-category bg-white mb-4">
                                <div class="category-photo">
                                    <img class="lozad" data-src="{{asset('storage/subcategory/'.$subcategory->photo)}}" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';" data-placeholder-background="white" alt="{{$category->name}}">
                                </div>
                                <span>{{$subcategory->name}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <!-- category end -->

@endsection
