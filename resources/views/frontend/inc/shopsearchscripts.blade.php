<script type="text/javascript">
    $(document).ready(function() {
        // modalShopSearchResultDiv

        var location = $('select[name="location"]');

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

        function searchShop() {
            let shopkeyword = $('input[name="shopSearchKeyword"]').val().trim();
            let locationid = location.val();

            if (shopkeyword.length > 0 && locationid) {
                $.ajax({
                    url: `/ajax/search/marketlist/${shopkeyword}`,
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
                    url: `/ajax/search/marketlist/${shopkeyword}`,
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
                    url: '{{ route('search.ajax.trendingmarketlist') }}',
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
                    url: '{{ route('search.ajax.trendingmarketlist') }}',
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

        var loadinghtml = `<div class="d-flex justify-content-center my-4" style="height:vh100%">
                        <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                    </div>`;
    });
</script>
