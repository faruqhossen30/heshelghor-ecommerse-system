<script>
    $(function() {
        var division = $('select[name=division_id]');
        var district = $('select[name=district_id]');
        var upazila = $('select[name=upazila_id]');

        var product_price = $('input[name=product]').data('price');
        var prdoduct_upazila_id = $('input[name=product]').data('prdoduct_upazila_id');
        var deliverycost = $('input[name="delivery_system"]').val();
        var total_prodcut = $('input[name="total_prodcut"]').val();

        // For District
        division.change(function() {
            district.removeAttr('disabled');
            district.empty();
            upazila.empty();
            var divisionID = $(this).val();
            if (divisionID) {
                // console.log(divisionID)
                district.append(
                    `<option selected>Select</option>`
                );
                $.ajax({
                    url: `/ajax/courier/getdistrictbydivisionid/${divisionID}`,
                    method: 'GET',
                    success(data) {
                        // console.log(data);
                        data.forEach(function(row) {
                            district.append(
                                `<option value="${row.id}">${row.name}</option>`
                            );
                        });
                    },
                    error() {
                        console.log('courier error');
                    },
                });
            }
        });

        // For Upazilla
        district.change(function() {
            upazila.removeAttr('disabled');
            upazila.empty();
            var districtID = $(this).val();
            if (districtID) {
                upazila.append(
                    `<option selected>Select</option>`
                );
                $.ajax({
                    url: `/ajax/courier/getgetupazilabydistrictid/${districtID}`,
                    method: 'GET',
                    success(data) {
                        // console.log(data);
                        data.forEach(function(row) {
                            upazila.append(
                                `<option value="${row.id}">${row.name}</option>`
                            );
                        });
                    },
                    error() {
                        console.log('courier error');
                    },
                });
            }
        });
        // Show Courier server by upazila/thana
        upazila.change(function() {
            // upazila.removeAttr('disabled');
            var upazilaid = $(this).val();
            if (upazilaid) {
                // console.log(upazilaid)

                $.ajax({
                    url: `/checkupazilawisecourierupalizalist/${upazilaid}`,
                    method: 'GET',
                    data: {
                        prdoduct_upazila_id: prdoduct_upazila_id,
                        product_delivery_upazila_id: upazilaid,
                        product_weight: 1
                    },
                    success(data) {
                        console.log('for courier list', data);
                        $('#couriertablerow').empty()
                        $('#couriertablerow').append(data).hide().fadeIn(2000);

                    },
                    error() {
                        console.log('courier error');
                    },
                });
            }
        });

        $(document).on('change select', 'input[name="delivery_system"]', function() {
            let delivery_cost = $(this).val();
            // alert(delivery_cost)
            $('input[name="total_delivery_cost"]').val(delivery_cost)
            $('#delivery_charge').html(delivery_cost)
            totalAmount(delivery_cost);
        });

        $(document).on('change keyup click', 'input[name="quantity"], .quantity-minus, .quantity-plus', function() {
            let qty = $('input[name="quantity"]').val(); // input qty update
            $('input[name="total_prodcut"]').val(qty); // input total product qty update
            // $('input[name="total_product_price"]').val( ); // input total product_price update

            $('#product_quantity').html(qty) // dom product qty update
            $('#sub_total').html((parseInt(product_price) * qty))
            $('#total_product_price').html((parseInt(product_price) * qty))

            // console.log(total_prodcut)
            let delivery_cost = $('input[name="total_delivery_cost"]').val()
            productdetails();
            totalAmount(delivery_cost);

        });

        // claculate
        function totalAmount(delivery_cost) {
            let totalproductprice = $('input[name="total_product_price"]').val()
            let quantity = $('input[name="total_prodcut"]').val();
            var inTotal = parseInt(totalproductprice)  + (  parseInt(delivery_cost) *  quantity);

            let totaldeliverycost = parseInt(delivery_cost) * quantity;
            $('input[name=total_amount]').val(inTotal);
            $('input[name="delivery_cost"]').val(delivery_cost)
            $('input[name="total_delivery_cost"]').val(totaldeliverycost)
            $('#total_product_price').html(inTotal);
        }

        function productdetails(){
            let quantity = $('input[name="total_prodcut"]').val();
            let product_price = $('input[name="product_price"]').val()
            let totalprice = parseInt(product_price) * parseInt(quantity);
            $('input[name="total_product_price"]').val(totalprice)
            let totalproductprice = $('input[name="total_product_price"]').val()

        }

    });
</script>
