<script type="text/javascript">
    $(document).ready(function() {

        var location = $('select[name="location"]');
        var modalMarketLocation = $('select[name="modalMarketLocation"]');

        $('#searchShopModal').on('shown.bs.modal', function() {
            // $('#modalShopSearchResultDiv').empty();
            var stickySearchbar = $('#stickySearchbar').hasClass('fixed');
            if (stickySearchbar) {
                $('#stickySearchbar').removeClass('fixed')
            }
            $(document).on('keyup', 'input[name="shopSearchKeyword"]', function() {
                searchShop();
            });


        }) // Show Modal

        $('#searchShopModal').on('hidden.bs.modal', function() {
            console.log('modal close');
            $('#modalShopSearchResultDiv').empty();
        })
        $(document).on('focus', 'input[name="shopSearchKeyword"]', function() {
            latestShop();
        });
        $(document).on('click', '#shopSearchTab', function() {
            latestShop();
        });
        // Search Market List

        $(document).on('keyup', 'input[name="modalMarketSearchKeyword"]', function() {
            searchMarket();
        });

        $(document).on('focus', 'input[name="modalMarketSearchKeyword"]', function() {
            latestMarket();
        });
        $(document).on('click', '#marketSearchTab', function() {
            latestMarket();
        });

        function searchShop() {
            let shopkeyword = $('input[name="shopSearchKeyword"]').val().trim();
            let locationid = location.val();

            if (shopkeyword.length > 0 && locationid) {
                $.ajax({
                    url: `/ajax/search/shoplist/${shopkeyword}`,
                    method: 'GET',
                    beforeSend: function() {
                        $("#searchShopPreloader").css('display', 'block');
                    },
                    data: {
                        locationid
                    },
                    success(data) {
                        console.log(data)
                        $("#searchShopPreloader").css('display', 'none');
                        $('#modalShopSearchResultDiv').empty();
                        $('#modalShopSearchResultDiv').append(data)
                    },
                    error() {
                        console.log('Upload error');
                        $('#modalShopSearchResultDiv').empty();
                    },
                });
            } else if (shopkeyword.length > 0) {
                $.ajax({
                    url: `/ajax/search/shoplist/${shopkeyword}`,
                    method: 'GET',
                    beforeSend: function() {
                        $("#searchShopPreloader").css('display', 'block');
                    },
                    success(data) {
                        console.log(data)
                        $("#searchShopPreloader").css('display', 'none');
                        $('#modalShopSearchResultDiv').empty();
                        $('#modalShopSearchResultDiv').append(data)
                    },
                    error() {
                        console.log('Upload error');
                        $('#modalShopSearchResultDiv').empty();
                    },
                });
            }
        } // End searchShop()

        function latestShop() {
            let locationid = location.val();
            if (locationid) {
                // alert(locationid)
                $.ajax({
                    url: '{{ route('search.ajax.trendingshoplist') }}',
                    method: 'GET',
                    beforeSend: function() {
                        $("#searchShopPreloader").css('display', 'block');
                    },
                    data: {
                        locationid
                    },
                    success(data) {
                        console.log("data")
                        $("#searchShopPreloader").css('display', 'none');
                        $('#modalShopSearchResultDiv').empty();
                        $('#modalShopSearchResultDiv').append(data).hide().show('slow');
                    },
                    error() {
                        console.log('Upload error');
                        $('#modalShopSearchResultDiv').empty();
                    },
                });
            } else {
                $.ajax({
                    url: '{{ route('search.ajax.trendingshoplist') }}',
                    method: 'GET',
                    beforeSend: function() {
                        $("#searchShopPreloader").css('display', 'block');
                    },
                    success(data) {
                        console.log("data")
                        $("#searchShopPreloader").css('display', 'none');
                        $('#modalShopSearchResultDiv').empty();
                        $('#modalShopSearchResultDiv').append(data).hide().show('slow');
                    },
                    error() {
                        console.log('Upload error');
                        $('#modalShopSearchResultDiv').empty();
                    },
                });
            }

        }


        function searchMarket() {
            let marketkeyword = $('input[name="modalMarketSearchKeyword"]').val().trim();
            let locationid = modalMarketLocation.val();

            if (marketkeyword.length > 0 && locationid) {
                $.ajax({
                    url: `/ajax/search/marketlist/${marketkeyword}`,
                    method: 'GET',
                    beforeSend: function() {
                        $("#searchShopPreloader").css('display', 'block');
                    },
                    data: {
                        locationid
                    },
                    success(data) {
                        console.log(data)
                        // $("#searchShopPreloader").css('display', 'none');
                        $('#modalMarketSearchResultDiv').empty();
                        $('#modalMarketSearchResultDiv').append(data)
                    },
                    error() {
                        console.log('Upload error');
                        // $('#modalShopSearchResultDiv').empty();
                    },
                });
            } else if (marketkeyword.length > 0) {
                $.ajax({
                    url: `/ajax/search/marketlist/${marketkeyword}`,
                    method: 'GET',
                    beforeSend: function() {
                        $("#searchShopPreloader").css('display', 'block');
                    },
                    success(data) {
                        console.log(data)
                        $("#searchShopPreloader").css('display', 'none');
                        $('#modalMarketSearchResultDiv').empty();
                        $('#modalMarketSearchResultDiv').append(data)
                    },
                    error() {
                        console.log('Upload error');
                        $('#modalMarketSearchResultDiv').empty();
                    },
                });
            }
        } // End searchMarket()
        function latestMarket() {
            let locationid = modalMarketLocation.val();
            if (locationid) {
                $.ajax({
                    url: `/ajax/search/latestmarketlist`,
                    method: 'GET',
                    beforeSend: function() {
                        // $("#searchShopPreloader").css('display', 'block');
                    },
                    data: {
                        locationid
                    },
                    success(data) {
                        console.log(data)
                        // $("#searchShopPreloader").css('display', 'none');
                        $('#modalMarketSearchResultDiv').empty();
                        $('#modalMarketSearchResultDiv').append(data).hide().show('slow');
                    },
                    error() {
                        console.log('Upload error');
                        // $('#modalShopSearchResultDiv').empty();
                    },
                });
            } else {
                $.ajax({
                    url: `/ajax/search/latestmarketlist`,
                    method: 'GET',
                    beforeSend: function() {
                        // $("#searchShopPreloader").css('display', 'block');
                    },
                    success(data) {
                        console.log(data)
                        // $("#searchShopPreloader").css('display', 'none');
                        $('#modalMarketSearchResultDiv').empty();
                        $('#modalMarketSearchResultDiv').append(data).hide().show('slow');
                    },
                    error() {
                        console.log('Upload error');
                        // $('#modalShopSearchResultDiv').empty();
                    },
                });
            }
        } // End searchMarket()



        var loadinghtml = `<div class="d-flex justify-content-center my-4" style="height:vh100%">
                        <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                    </div>`;
    });
</script>
