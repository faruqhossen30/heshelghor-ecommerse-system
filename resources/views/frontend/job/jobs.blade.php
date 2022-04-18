@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | About Us
@endsection

@section('content')
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li><a href="#" class="active">Blog</a></li>
                    <li>Listing</li>
                </ul>
            </div>
        </nav>
        <div class="page-content with-sidebar">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="col-lg-9">
                        <div class="posts">
                            @foreach ($jobs as $job)
                                <article class="post post-list mb-4">
                                    <figure class="post-media overlay-zoom">
                                        <a href="{{route('jobs.show', $job->id)}}">
                                            <img src="{{ asset('storage/jobs/' . $job->photo) }}" width="355" height="250"
                                                alt="post" />
                                        </a>
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            Published on <a href="#" class="post-date">{{$job->created_at->format('d M, Y')}}</a>
                                        </div>
                                        <h4 class="post-title"><a href="{{route('jobs.show', $job->id)}}">{{ $job->title }}</a>
                                        </h4>
                                        <p class="post-content">
                                            {{ $job->description }}
                                        </p>
                                        <a href="{{route('jobs.show', $job->id)}}" class="btn btn-link btn-underline btn-primary">Read
                                            more<i class="d-icon-arrow-right"></i></a>
                                    </div>
                                </article>
                            @endforeach

                        </div>

                    </div>
                    <aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
                        <div class="sidebar-overlay">
                            <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        </div>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                                <div class="widget widget-search border-no mb-2">
                                    <form action="#" class="input-wrapper input-wrapper-inline btn-absolute">
                                        <input type="text" class="form-control" name="search" autocomplete="off"
                                            placeholder="Search in Blog" required />
                                        <button class="btn btn-search btn-link" type="submit">
                                            <i class="d-icon-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Popular Jobs</h3>
                                    <div class="widget-body">
                                        <div class="post-col">
                                            @foreach ($jobs as $job)
                                                <div class="post post-list-sm">
                                                    <figure class="post-media">
                                                        <a href="{{route('jobs.show', $job->id)}}">
                                                            <img src="{{ asset('storage/jobs/' . $job->photo) }}" width="90" height="90"
                                                                alt="post" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            <a href="#" class="post-date">{{$job->created_at->format('d M, Y')}}</a>
                                                        </div>
                                                        <h4 class="post-title"><a href="{{route('jobs.show', $job->id)}}">{{$job->title}}</a></h4>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
    <!-- End Main -->
    <!-- End Main -->
@endsection
