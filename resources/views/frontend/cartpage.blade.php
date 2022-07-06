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
<div class="not-found-product text-center d-flex justify-content-center align-items-center py-5" style="height: 60vh">
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
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
            url: `/cart/remove/${rowid}`
            , type: 'POST'
            , beforeSend: function() {
                return confirm("Are you want to remove item form cart?");
            }
            , success: function(data) {
                loadcartItems()
            }
            , error: function(error) {
                console.log(error)
            }
        })
    });

    // $(document).on('change', '.quantity', function(){
    //     // let qty = $(this).val();
    //     console.log('welcome')
    // });

    // Quantity Plus
    $(document).on('click', '.qtyplusbtn', debounce(function() {
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

    }, 500))
    // Quantity Minus
    $(document).on('click', '.qtyminusbtn', debounce(function() {
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
    }, 500))


    function loadcartItems() {
        $.ajax({
            url: '/ajax/cart-item/list'
            , type: 'POST'
            , success: function(data) {
                $('#cartlist').empty()
                $('#cartlist').append(data)
            }
            , error: function(err) {
                console.log(err)
            }
        })
    }

    function updateCart(rowid, qty) {
        console.log(rowid, qty)
        $.ajax({
            url: `/cart/update/${rowid}`
            , type: 'POST'
            , data: {
                quantity: qty
            }
            , success: function(data) {
                console.log(data)
            }
            , error: function() {
                console.log('error')
            }
        })
    }


    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this
                , args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

</script>
@endpush
