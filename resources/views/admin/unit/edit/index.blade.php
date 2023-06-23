@extends('admin.master.index')

@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Update Unit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between align-middle">
                                <h4 class="card-title">Update {{request()->segment(0)}}</h4>
                                <a href="{{route('unit')}}" class="btn btn-sm btn-primary shadow-none">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-5">
                                    <form action="{{route('update.unit',['id'=>$unit->id])}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Unit Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm shadow-none"
                                                   name="name" value="{{$unit->name}}">
                                            @if($errors->has('name'))
                                                <span class="text-danger ">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea name="short_description"
                                                      class="form-control form-textarea shadow-none">{{$unit->short_description}}</textarea>
                                            @if($errors->has('short_description'))
                                                <span
                                                    class="text-danger ">{{$errors->first('short_description')}}</span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <div class=""><label>Unit Status</label></div>
                                            <div class="row justify-content-between">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="active" name="status" class="custom-control-input" value="1" @checked($unit->status === 1)>
                                                    <label class="custom-control-label" for="active">Active</label>
                                                </div>

                                                <div class="custom-control custom-radio custom-radio-danger mb-3">
                                                    <input type="radio" id="inactive" name="status" class="custom-control-input" value="0" @checked($unit->status !== 1)>
                                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                            @if($errors->has('status'))
                                                <span class="text-danger ">{{$errors->first('status')}}</span>
                                            @endif
                                        </div>

                                        <div class="row justify-content-center">
                                            <button type="submit" class="btn btn-sm shadow-none btn-primary col-6">
                                                Update Unit
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
