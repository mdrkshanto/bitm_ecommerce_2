@extends('admin.master.index')
@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Unit List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header">
                                <div class="align-middle row justify-content-between">
                                    <h4 class="card-title">Unit List</h4>
                                    @if(session('msg'))
                                        <span class="text-success card-title">{{session('msg')}}</span>
                                    @endif
                                    <a href="{{route('create.unit')}}" class="shadow-none btn btn-sm btn-primary">Add
                                        New</a>
                                </div>
                            </div>

                            <table id="datatable-buttons"
                                   class="table text-center table-sm table-dark table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th class="align-middle"><i class="bx bx-hash"></i></th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Slug</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td class="align-middle">{{$loop->iteration}}</td>
                                        <td class="align-middle">{{$unit->name}}</td>
                                        <td class="align-middle">{{$unit->slug}}</td>
                                        <td class="align-middle{{$unit->status==1?' text-success':' text-danger'}}">{{$unit->status==1?'Active':'Inactive'}}</td>
                                        <td class="align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('edit.unit',['slug'=>$unit->slug])}}" class="shadow-none btn btn-primary"><i
                                                        class="fa fa-edit"></i></a>

                                            <form action="{{route('delete.unit', ['id'=>$unit->id])}}" method="post">
                                                @csrf
                                                <button class="px-2 py-1 shadow-none btn btn-danger" type="submit"><i class="fa fa-trash"></i>
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
