<script>
    $(function() {
        var division = $('select[name=division_id]');
        var district = $('select[name=district_id]');
        var upazila = $('select[name=upazila_id]');

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
                        console.log(data);
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
                console.log(upazilaid)

                $.ajax({
                    url: `/checkupazilawisecourierupalizalist/${upazilaid}`,
                    method: 'GET',
                    success(data) {
                        // console.log('for courier list',data);
                        $('#couriertablerow').empty()
                        $('#couriertablerow').append(data).hide().fadeIn(2000);

                    },
                    error() {
                        console.log('courier error');
                    },
                });
            }
        });

    });

    // For Price Calculation
    var sub_total = $('#sub_total');
    var product_quantity = $('#product_quantity');
    var productNumber = parseInt(product_quantity.text())
    var delivery_charge = $('#delivery_charge');
    var total_product_price = $('#total_product_price');

    // For Hidden input
    var delivery_cost = $('input[name="delivery_cost"]');
    var total_price = $('input[name="total_price"]');
    var delivery_system_name = $('input[name="delivery_system_name"]');


    $(document).on('change select', 'input[name="delivery_system"]', function() {
        let dhaka_to_dhaka_price = $(this).data('dhaka_to_dhaka_price');
        let all_place_price = $(this).data('all_place_price');
        let dhaka_to_dhaka_per_kg = $(this).data('dhaka_to_dhaka_per_kg');
        let dhaka_to_outside_per_kg = $(this).data('dhaka_to_outside_per_kg');
        // alert(dhaka_to_outside_per_kg)

        delivery_cost.val(all_place_price * productNumber); // for hidden input
        delivery_charge.text(all_place_price * productNumber); // For Show calculate

        totalAmount();

    // claculate
    function totalAmount() {
        var inTotal = parseFloat(sub_total.text()) + parseFloat(delivery_charge.text());
        var sum = inTotal.toFixed(2)
        total_price.val(sum);
        total_product_price.html(sum);
    }


    var payment_method_name = $('input[name="payment_method_name"]');
    var payment_img = $('#payment_img');
    payment_img.hide()

    $(document).on('change', 'select[name="payment_method_id"]', function() {
        var payment_method_id = $('select[name="payment_method_id"]').val();
        payment_img.hide()
        if (payment_method_id) {
            // console.log(payment_method_id);
            $.get(`{{ url('paymentsystemname/${payment_method_id}') }}`, function(data, status) {
                if (data) {
                    // console.log(data);
                    payment_method_name.val(data.name)
                }
            });
            // Online payment
            $.get(`setting/setting-payment-system`, function(data, status) {
                if (data) {
                    data.map(function(d) {
                        if (payment_method_id == d.payment_method_id) {
                            payment_img.show();
                        }
                    });

                }
            });
        };


    });
</script>
