
@extends('admin.layouts.app')
@section('content')
<div class="content">

    <! Start Content>
    <div class="containerfluid">

        <! start page title >
        <div class="row">
            <div class="col12">
                <div class="pagetitlebox pagetitleboxalt">
                    <h4 class="pagetitle">shop List</h4>
                    <div class="pagetitleright">
                        <ol class="breadcrumb m0">
                            <li class="breadcrumbitem"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumbitem"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumbitem active">Category List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <! end page title >

        <div class="row">
            <div class="collg12">
                <div class="card">
                    <div class="cardheader">
                        Shop Information
                    </div>
                    <div class="cardbody">
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
                                    <td><strong>{{$withdraw[0]->merchant->name}}</strong></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Phone: </td>
                                    <td>{{$withdraw[0]->merchant->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Email: </td>
                                    <td>{{$withdraw[0]->merchant->email}}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Address: </td>
                                    <td>{{$withdraw[0]->merchant->address}}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <! end row >


    </div> <! container >

</div> <! content >
@endsection
