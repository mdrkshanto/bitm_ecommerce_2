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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm shadow-none" name="name" autofocus>
                                            @if($errors->has('name'))
                                                <span class="text-danger ">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea name="short_description" class="form-control form-textarea shadow-none"></textarea>
                                            @if($errors->has('short_description'))
                                                <span class="text-danger ">{{$errors->first('short_description')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Category Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input shadow-none" name="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            @if($errors->has('image'))
                                                <span class="text-danger ">{{$errors->first('image')}}</span>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <button type="submit" class="btn btn-sm shadow-none btn-primary col-6">Submit</button>
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
