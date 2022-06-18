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
                                <label class=" col-form-label  border-bottom mb-2" style="align-item: center"
                                    for="flexSwitchCheckDefault">
                                    <h5><b>{{ $category->name }}</b></h5>
                                </label>
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="sub_category_id[]" type="checkbox"
                                                    value="{{ $subcategory->id }}"
                                                    id="flexSwitchCheckDefault{{ $subcategory->id }}"
                                                    @if (in_array($subcategory->id, $promotionnalsubcategoryid)) checked @endif>
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckDefault {{ $subcategory->id }}">{{ $subcategory->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
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
