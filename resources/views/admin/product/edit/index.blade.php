@extends('admin.master.index')

@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">New Category</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between align-middle">
                                <h4 class="card-title">Add New {{request()->segment(0)}}</h4>
                                <a href="{{route('category')}}" class="btn btn-sm btn-primary shadow-none">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-5">
                                    <form action="{{route('update.category',['id'=>$category->id])}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm shadow-none"
                                                   name="name" value="{{$category->name}}">
                                            @if($errors->has('name'))
                                                <span class="text-danger ">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea name="short_description"
                                                      class="form-control form-textarea shadow-none">{{$category->short_description}}</textarea>
                                            @if($errors->has('short_description'))
                                                <span
                                                    class="text-danger ">{{$errors->first('short_description')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Category Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input shadow-none" name="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            @if($category->image)
                                                <div class="image mt-2">
                                                    <img src="{{asset($category->image)}}" alt="{{$category->name}}" height="50" width="100">
                                                </div>
                                            @endif
                                            @if($errors->has('image'))
                                                <span class="text-danger ">{{$errors->first('image')}}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class=""><label>Category Status</label></div>
                                            <div class="row justify-content-between">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="active" name="status" class="custom-control-input" value="1" @checked($category->status === 1)>
                                                    <label class="custom-control-label" for="active">Active</label>
                                                </div>

                                                <div class="custom-control custom-radio custom-radio-danger mb-3">
                                                    <input type="radio" id="inactive" name="status" class="custom-control-input" value="0" @checked($category->status !== 1)>
                                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                            @if($errors->has('status'))
                                                <span class="text-danger ">{{$errors->first('status')}}</span>
                                            @endif
                                        </div>

                                        <div class="row justify-content-center">
                                            <button type="submit" class="btn btn-sm shadow-none btn-primary col-6">
                                                Update Category
                                            </button>
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
