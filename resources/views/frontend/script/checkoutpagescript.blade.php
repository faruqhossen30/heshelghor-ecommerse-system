<script>
    $(document).ready(function() {
        var division = $('select[name=division_id]');
        var district = $('select[name=district_id]');
        var upazila = $('select[name=upazila_id]');

        // In Division
        $(document).on('change', 'select[name=division_id]', function() {
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
                    url: `/ajax/courier/getdistrictbydivisionid/${divisionID}`
                    , method: 'GET'
                    , success(data) {
                        // console.log(data);
                        data.forEach(function(row) {
                            district.append(
                                `<option value="${row.id}">${row.name}</option>`
                            );
                        });
                    }
                    , error(error) {
                        console.log(error);
                    }
                , });
            }
        }); // Division id change event

        // In District
        $(document).on('change', 'select[name=district_id]', function() {
            upazila.removeAttr('disabled');
            upazila.empty();
            var districtID = $(this).val();
            if (districtID) {
                upazila.append(
                    `<option selected>Select</option>`
                );
                $.ajax({
                    url: `/ajax/courier/getgetupazilabydistrictid/${districtID}`
                    , method: 'GET'
                    , success(data) {
                        // console.log(data);
                        data.forEach(function(row) {
                            upazila.append(
                                `<option value="${row.id}">${row.name}</option>`
                            );
                        });
                    }
                    , error(error) {
                        console.log(error);
                    }
                });
            }
        }); // District id change event

        // In Upazila
        $(document).on('change', 'select[name=upazila_id]', function() {
            // upazila.removeAttr('disabled');
            var upazilaid = $(this).val();
            if (upazilaid) {
                console.log(upazilaid)
                $('select[name="deliver_system[]"]').each(function(index, value) {
                    let itemid = $(this).data('id')
                    let courieroption = $(`#delivery${itemid}`);
                    $.ajax({
                        url: `courierlistforcartchekoutpage/${upazilaid}`
                        , method: 'GET'
                        , data: {
                            product_id: itemid
                            , product_delivery_upazila_id: upazilaid
                            , product_weight: 1
                        }
                        , success(data) {
                            // console.log('for courier list', data);
                            $(`#delivery${itemid}`).empty()
                            $(`#delivery${itemid}`).append(
                                `<option value="" selected>Select</option>`)
                            $(`#delivery${itemid}`).append(data)

                        }
                        , error(error) {
                            console.log(error);
                        }
                    , }); // ajax end

                }); // loop end

            }

        }); // Upazila id change event

        $(document).on('change', 'select[name="deliver_system[]"]', function() {
            let id = $(this).data('id');
            let delivery_cost = $(this).val();
            let curierid = $(this).children('option:selected').data('curierid');
            let courierpackegedesc = $(this).children('option:selected').data('courierpackegedesc');

            let dtimes = $(this).children('option:selected').data('curierid');

            // console.log(dtimes);
            if (dtimes == 1) {
                $(`#dtime${id}`).html("1 day dalivery")
            } else {
                $(`#dtime${id}`).html("(7-10) days dalivery")

            }

            $(`input[name="courier_id[${id}]"]`).val(curierid)
            $(`input[name="courier_packege_desc[${id}]"]`).val(courierpackegedesc)
            $(`input[name="delivery_cost[${id}]"]`).val(delivery_cost)

            // console.log('curierid', curierid)
            // console.log('courierpackegedesc', courierpackegedesc)

            let dprice = (Number($(this).val()) * Number($(this).data('qty')));
            // console.log(id)
            $(`#dcost${id}`).html(`৳${dprice}`)
            deliveryprice()
        });

        function deliveryprice() {
            var sum = 0;

            $('select[name="deliver_system[]"]').each(function() {
                sum += (Number($(this).val()) * Number($(this).data('qty')));
            });

            $('#totaldelivercost').html('৳' + sum)
            $('input[name="total_delivery_cost"]').val(sum)

            let tpp = $('input[name="total_product_price"]').val();
            let total = Number(tpp) + Number(sum);

            $('input[name="total_amount"]').val(total);
            $('#totalAmount').html(`৳ ${total}`);

            console.log('tpp', tpp)
            console.log('total', total)
            console.log('sum', sum)
        }


    }); // Document Ready

</Script>
