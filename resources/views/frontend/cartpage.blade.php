@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Your Cart page
@endsection

@php
$totalitem = Cart::count();
@endphp

@section('content')
    @if ($totalitem)
        <main class="main cart">
            <div class="page-content pt-7 pb-10">
                <div class="container mt-7 mb-2" id="cartlist">

                </div>
            </div>
        </main>
        <!-- End Main -->
    @else
        <div class="not-found-product text-center d-flex justify-content-center align-items-center py-5" style="height: 100%">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                    class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                </svg>
                <h3>No cart item</h3>
            </span>
        </div>
    @endif
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.min.css">
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            // console.log('document ready')

        })
        $(window).on('load', function() {
            loadcartItems();
        });

        $(document).on('click', '.cartRemoveIcon', function() {
            let rowid = $(this).data('rowid');
            $.ajax({
                url: `/cart/remove/${rowid}`,
                type: 'POST',
                beforeSend: function() {
                    return confirm("Are you want to remove item form cart?");
                },
                success: function(data) {
                    loadcartItems()
                },
                error: function(error) {
                    console.log(error)
                }
            })
        });

        // $(document).on('change', '.quantity', function(){
        //     // let qty = $(this).val();
        //     console.log('welcome')
        // });

        // Quantity Plus
        $(document).on('click', '.qtyplusbtn', function() {
            let maxval = $(this).parent().children('input[name="quantity"]').prop('max')
            let rowid = $(this).parent().children('input[name="quantity"]').data('rowid')
            let cval = $(this).parent().children('input[name="quantity"]').val()

            if (parseInt(maxval) > parseInt(cval)) {
                $(this).parent().children('input[name="quantity"]').val(function(i, oldval) {
                    return ++oldval;
                });
                let cval = $(this).parent().children('input[name="quantity"]').val()
                updateCart(rowid, cval)
                loadcartItems()
                // console.log('cval',cval)
            }

        })
        // Quantity Minus
        $(document).on('click', '.qtyminusbtn', function() {
            let minval = $(this).parent().children('input[name="quantity"]').prop('min')
            let rowid = $(this).parent().children('input[name="quantity"]').data('rowid')
            let cval = $(this).parent().children('input[name="quantity"]').val()

            if (parseInt(minval) < parseInt(cval)) {
                $(this).parent().children('input[name="quantity"]').val(function(i, oldval) {
                    return --oldval;
                });
                let cval = $(this).parent().children('input[name="quantity"]').val()
                updateCart(rowid, cval)
                loadcartItems()
            }

        })


        function loadcartItems() {
            $.ajax({
                url: '/ajax/cart-item/list',
                type: 'POST',
                success: function(data) {
                    $('#cartlist').empty()
                    $('#cartlist').append(data)
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }

        function updateCart(rowid, qty) {
            console.log(rowid, qty)
            $.ajax({
                url: `/cart/update/${rowid}`,
                type: 'POST',
                data: {
                    quantity: qty
                },
                success: function(data) {
                    console.log(data)
                },
                error: function() {
                    console.log('error')
                }
            })
        }
    </script>
@endpush
