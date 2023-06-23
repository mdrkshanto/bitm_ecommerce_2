@extends('admin.master.index')
@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Category List</h4>
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
                                    <h4 class="card-title">Category List</h4>
                                    @if(session('msg'))
                                        <span class="text-success card-title">{{session('msg')}}</span>
                                    @elseif(session('error_msg'))
                                        <span class="text-danger card-title">{{session('error_msg')}}</span>
                                    @endif
                                    <a href="{{route('create.category')}}" class="btn btn-sm btn-primary shadow-none">Add
                                        New</a>
                                </div>
                            </div>

                            <table id="datatable-buttons"
                                   class="table table-sm text-center table-dark table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th class="align-middle"><i class="bx bx-hash"></i></th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Slug</th>
                                    <th class="align-middle">Image</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="align-middle">{{$loop->iteration}}</td>
                                        <td class="align-middle">{{$category->name}}</td>
                                        <td class="align-middle">{{$category->slug}}</td>
                                        <td class="align-middle">
                                            @if($category->image)
                                                <img src="{{asset($category->image)}}" alt="{{$category->name}}"
                                                     height="40" width="80">
                                            @endif
                                        </td>
                                        <td class="align-middle{{$category->status==1?' text-success':' text-danger'}}">{{$category->status==1?'Active':'Inactive'}}</td>
                                        <td class="align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('edit.category',['slug'=>$category->slug])}}"
                                                   class="btn btn-primary shadow-none"><i
                                                        class="fa fa-edit"></i></a>

                                                <form action="{{route('delete.category', ['id'=>$category->id])}}"
                                                      method="post">
                                                    @csrf
                                                    <button class="btn btn-danger shadow-none py-1 px-2" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('/')}}admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/')}}admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset('/')}}admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('/')}}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('/')}}admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script
        src="{{asset('/')}}admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{asset('/')}}admin/assets/js/pages/datatables.init.js"></script>
@endsection
