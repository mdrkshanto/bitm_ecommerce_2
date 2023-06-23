@extends('admin.master.index')

@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">New Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between align-middle">
                                <h4 class="card-title">Add New</h4>
                                <a href="{{route('product')}}" class="btn btn-sm btn-primary shadow-none">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-5">
                                    <form action="{{route('create.product')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md">
                                                <label>Select Category<span class="text-danger">*</span></label>
                                                <select name="category_id" class="form-control form-control-sm text-center">
                                                    <option selected disabled>--- Select Category ---</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md">
                                                <label>Select Subcategory<span class="text-danger">*</span></label>
                                                <select name="subcategory_id" class="form-control form-control-sm text-center">
                                                    <option selected disabled>--- Select Subcategory ---</option>
                                                    @foreach($subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md">
                                                <label>Select Brand<span class="text-danger">*</span></label>
                                                <select name="brand_id" class="form-control form-control-sm text-center">
                                                    <option selected disabled>--- Select Brand ---</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md">
                                                <label>Select Unit<span class="text-danger">*</span></label>
                                                <select name="unit_id" class="form-control form-control-sm text-center">
                                                    <option selected disabled>--- Select Unit ---</option>
                                                    @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('scripts')
    <!-- bs custom file input plugin -->
    <script src="{{asset('/')}}admin/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script src="{{asset('/')}}admin/assets/js/pages/form-element.init.js"></script>

    <script src="{{asset('/')}}admin/assets/js/app.js"></script>
@endsection
