@php
    $admin = Auth::guard('admin')->user();
@endphp
@extends('admin.layouts.app')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">shop List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Category List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Shop Information
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Name: </td>
                                    <td><strong>{{$shop->name}}</strong></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Description: </td>
                                    <td>{{$shop->description}}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Address: </td>
                                    <td>{{$shop->address}}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mobile: </td>
                                    <td>{{$shop->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Marchant Name: </td>
                                    <td>{{ $shop->merchant->name }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Marchant Email: </td>
                                    <td>{{ $shop->merchant->email }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Create at: </td>
                                    <td>{{$shop->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Status</td>
                                    <td>
                                        @if ($shop->status == 1)
                                        <span class="badge badge-soft-success">Active </span>
                                        @else
                                        <span class="badge badge-soft-danger">Pending </span>
                                        @endif
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Photo</td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->
@endsection
