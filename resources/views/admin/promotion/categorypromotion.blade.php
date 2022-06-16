@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Admin ')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header border-bottom bg-transparent">
                    <h5 class="header-title mb-0">Category Promotion</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.promotion.store') }}" method="POST">
                        @csrf
                        @foreach ($categories as $category)
                            <div class="row">
                                <label  class=" col-form-label  border-bottom mb-2" style="align-item: center"
                                    for="flexSwitchCheckDefault"> <h5><b>{{ $category->name }}</b></h5> </label>
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"  name="sub_category_id[]" type="checkbox" value="{{$subcategory->id}}" id="flexSwitchCheckDefault{{$subcategory->id}}"
                                                @if (in_array($subcategory->id, $promotionnalsubcategoryid)) checked @endif
                                                >
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckDefault {{$subcategory->id}}">{{ $subcategory->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        {{-- <td style="width: 70%">
                            @php
                                $upazilas = App\Models\Admin\Location\Upazila::where('district_id', $district->id)->get();
                            @endphp
                            <div class="row">
                                @foreach ($upazilas as $upazila)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-check form-switch">
                                            <input value="{{ $upazila->id }}"
                                                name="upazilas[]" class="form-check-input"
                                                type="checkbox"
                                                id="checkUpazila{{ $upazila->id }}"
                                                data-info="{{ $upazila->name }}"
                                                @if (in_array($upazila->id, $deliveryplace)) checked @endif
                                                >
                                            <label class="form-check-label text-dark"
                                                for="checkUpazila{{ $upazila->id }}">{{ $upazila->name }}</label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </td> --}}












                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection
