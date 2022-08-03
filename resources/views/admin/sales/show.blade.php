@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Roles ')
@section('content')

    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Order Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Order </td>
                                <td>{{ $showProduct->order_number }}</td>
                            </tr>
                            <tr>
                                <td>Number of Product </td>
                                <td>{{ $showProduct->quantity }}</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td>{{ $showProduct->price }}</td>
                            </tr>
                            <tr>
                                <td>Delivery Status</td>
                                <td>{{ $showProduct->product->status }}</td>
                            </tr>
                            <tr>
                                <td>Payment method</td>
                                <td>{{ $showProduct->order->payment_type }}</td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td>{{ $showProduct->order->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Customer Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name </td>
                                <td>{{ $showProduct->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $showProduct->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>{{ $showProduct->user->mobile }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $showProduct->order->address ?? 'No Identify Address' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Prodcut Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name of Product </td>
                                <td>{{ $showProduct->product->title }}</td>
                            </tr>
                            <tr>
                                <td>Product Quantiry </td>
                                <td>{{ $showProduct->quantity }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Amount Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Price</td>
                                <td>{{ $showProduct->price }}</td>
                            </tr>
                            <tr>
                                <td>Delivery Cost</td>
                                <td>{{ $showProduct->delivery_cost }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td><strong>{{ $showProduct->price+$showProduct->delivery_cost }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
