@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Merchant List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Merchant List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-3">
                                <h4 class="header-title text-derk mt-1">Merchant List</h4>
                            </div>
                            <div class="col-sm-9">
                                <div class="float-sm-end mt-3 mt-sm-0">
                                    <div class="d-flex align-items-start flex-wrap">
                                        <div class="mb-3 mb-sm-0 me-sm-2">
                                            <form>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="keyword" id="search_text" placeholder="Search...">
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <select class="form-select" id="search_key">
                                                <option value="*" selected="" >All</option>
                                                <option value="name">Name</option>
                                                <option value="phone_number">Mobile</option>
                                                <option value="email">Email</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-2">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($merchants as $merchant)
                                        <tr>
                                            <th scope="row">{{ $serial++ }}</th>
                                            <td>{{ $merchant->name }}</td>
                                            <td>{{ $merchant->address }}</td>
                                            <td>{{ $merchant->phone_number }}</td>
                                            <td>{{ $merchant->email }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm text-white" href="{{ route('merchant.profile.details', $merchant->id) }}" title="Edit"><span
                                                        class="mdi mdi mdi-eye"></span></a>
                                                <a class="btn btn-primary btn-sm text-white" href="" title="Edit"><span
                                                        class="mdi mdi-square-edit-outline"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $merchants->links() }}
                        </div> <!-- end .table-responsive-->
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->

        </div>
        <!-- end row -->
    </div> <!-- content -->
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
    <!-- sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        (function($){
            $(document).ready(function () {

                $("#search_text").on('keyup', searchData);

            });
        })(jQuery)

        function searchData(){
            let
            searchText = $('#search_text').val().trim();
            searchKey = $('#search_key').val();
            setTimeout(() => {
                $.ajax({
                    type: "get",
                    url: `allmerchant/search?searchkey=${searchKey}&searchtext=${searchText}`,
                    dataType: "json",
                    success: function (resp) {
                        render_row(resp);
                    }
                });
            }, 1000);
        }



      function render_row(data){
        let
        tableBody = $('#tableBody'),
        tr        = ``,
        sl        =0;

        data.forEach(d => {
            tr += `
                <tr>
                    <td>${++sl}</td>
                    <td>${d.name}</td>
                    <td>${d.address ?? ''}</td>
                    <td>${d.phone_number}</td>
                    <td>${d.email}</td>
                    <td>
                        <a class="btn btn-success btn-sm text-white" href="#" title="Edit"><span  class="mdi mdi mdi-eye"></span></a>
                        <a class="btn btn-primary btn-sm text-white" href="#" title="Edit"><span class="mdi mdi-square-edit-outline"></span></a>
                    </td>
                </tr>
            `;
        })

        if(!data.length){
            tr += `<tr>
                    <td colspan="6" class="text-center">No Data Found</td>
                </tr>`;
        }

        tableBody.html(tr);
      }
    </script>

@endpush
