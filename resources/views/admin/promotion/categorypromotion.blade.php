@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Admin ')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="header-title fs-4"> Category Promotion </p>
                        </div>
                    </div>
                    <form action="" method="get">
                        <div class="mb-5 row">
                            <label class="col-md-2 col-form-label " style="align-item: center" for="simpleinput">Sub Category Name </label>
                            <div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                                        input</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                        input</label>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="col-2">
                            <button class="btn btn-primary">Submit</button>
                        </div>

                </div>
                </form>


            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection
