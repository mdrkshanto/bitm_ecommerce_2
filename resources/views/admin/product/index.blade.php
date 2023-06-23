@extends('admin.master.index')
@section('body')
    <div class="page-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Product List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="card-header">
                                    <div class="row justify-content-between align-middle">
                                        <h4 class="card-title">Product List</h4>
                                        @if(session('msg'))
                                            <span class="text-success card-title">{{session('msg')}}</span>
                                        @endif
                                        <a href="{{route('create.product')}}" class="btn btn-sm btn-primary shadow-none">Add
                                            New</a>
                                    </div>
                                </div>

                                <table id="datatable-buttons"
                                       class="table table-sm text-center table-dark table-striped table-hover table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th class="align-middle"><i class="bx bx-hash"></i></th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Category</th>
                                        <th class="align-middle">Slug</th>
                                        <th class="align-middle">Image</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle"></td>
                                            <td class="align-middle"></td>
                                            <td class="align-middle"></td>
                                            <td class="align-middle"></td>
                                            <td class="align-middle">
                                                    <img src="" alt=""
                                                         height="40" width="80">
                                            </td>
                                            <td class="align-middle">Active || Inactive</td>
                                            <td class="align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="" class="btn btn-primary shadow-none"><i
                                                            class="fa fa-edit"></i></a>

                                                    <form action="" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger shadow-none py-1 px-2" type="submit"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
    </div>
@endsection
