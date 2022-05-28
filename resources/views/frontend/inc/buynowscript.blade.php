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
                        // console.log('for courier list', data);
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
            totalAmount()
        });

        $(document).on('click', '#qtyplusbtn', function() {
            let maxval = $('input[name="total_prodcut"]').prop('max')
            let cval = $('input[name="total_prodcut"]').val()
            // console.log(typeof test)
            if (parseInt(maxval) > parseInt(cval)) {
                $('input[name="total_prodcut"]').val(function(i, oldval) {
                    return ++oldval;
                });
                totalAmount()
            }
        })

        $(document).on('click', '#qtyminusbtn', function() {
            let minval = $('input[name="total_prodcut"]').prop('min')
            let cval = $('input[name="total_prodcut"]').val()
            // console.log(typeof test)
            if (parseInt(minval) < parseInt(cval)) {
                $('input[name="total_prodcut"]').val(function(i, oldval) {
                    return --oldval;
                });
                totalAmount()
            }
        })


        // claculate

        function totalAmount() {
            let product_price = $('input[name="product_price"]').val()
            let quantity = $('input[name="total_prodcut"]').val();
            let totalprice = parseInt(product_price) * parseInt(quantity)

            $('input[name="total_product_price"]').val(totalprice)

            let dcost = $('input[name="delivery_system"]:checked').val();
            if(dcost){
                let tdcost = parseInt(dcost) * parseInt(quantity);
                $('input[name="delivery_cost"]').val(dcost);
                $('input[name="total_delivery_cost"]').val(tdcost);

                let totalAmount = parseInt(tdcost) + parseInt(totalprice)
                $('input[name="total_amount"]').val(totalAmount);

                $('#totalDeliverCost').html(tdcost);
                $('#pqty').html(quantity);
                $('#total_product_price').html(totalprice);
                $('#intotal').html(totalAmount);


                // console.log('courier ase')
                // console.log('dcost', dcost)
                // console.log('tdcost', tdcost)
                // console.log('totalAmount', totalAmount)
            }else{
                $('#pqty').html(quantity);
                $('#total_product_price').html(totalprice);
                $('#total_product_price').html(totalprice);
                $('#intotal').html(totalprice);
            }

        }


    });
</script>
