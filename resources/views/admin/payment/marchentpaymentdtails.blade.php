@extends('admin.layouts.app')
@section('content')
    <div class="content">

        <!-- Start Content-->
            <div class="container-fluid">
                <!---start page title--->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <a class="btn btn-primary mt-2" href="{{ route('merchant.payment.request') }}"> <i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">withdrawrals List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page title-->

                <div class="row">
                    <div class="collg12">
                        <div class="card">
                            <div class="card-header">
                                Shop Information
                            </div>
                            <div class="card-body">
                                <table class="table tablebordered mb0">
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
                                            <td><strong>{{ $withdraw[0]->merchant->name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Phone: </td>
                                            <td>{{ $withdraw[0]->merchant->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Email: </td>
                                            <td>{{ $withdraw[0]->merchant->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Address: </td>
                                            <td>{{ $withdraw[0]->merchant->address }}</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row-->


            </div>
            <!---container-->

    </div>
    <!--- content -->
@endsection
