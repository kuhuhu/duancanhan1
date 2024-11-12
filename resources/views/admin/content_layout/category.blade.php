@extends('admin.main')
@section('category')
    <style>
        .red-background {
            background-color: rgb(216, 216, 216);
            /* Đặt màu nền của hàng là màu đỏ */
            color: rgb(245, 88, 88);
            /* Đặt màu chữ là màu trắng để dễ đọc trên nền đỏ */
        }
    </style>
    <div id="main-wrapper">

        <div class="page-wrapper">

            {{-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tables</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Category Management</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>

                                            <th scope="col">Id</th>
                                            <th scope="col"></th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="customtable">

                                        @foreach ($data as $item)
                                            <tr class="{{ $item->isdelete == 1 ? 'red-background' : '' }}">

                                                <td>{{ $item->id }}</td>
                                                <td><img src="{{ asset('upload') }}/{{ $item->image }}" alt=""
                                                        width="70" height="50"></td>
                                                <td>{{ $item->name }}</td>
                                                @if ($item->isdelete == 1)
                                                    <td>Deleted</td>
                                                    <td>
                                                        <a href="{{ route('admin.backup_category', ['id' => $item->id]) }}"><button
                                                                type="button" class="btn btn-primary">Back
                                                                up</button></a>
                                                    </td>
                                                @else
                                                    <td>Active</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit_category', ['id' => $item->id]) }}"><button
                                                                type="button" class="btn btn-info ">Edit</button></a>
                                                        <a href="{{ route('admin.delete_category', ['id' => $item->id]) }}"><button
                                                                type="button"
                                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này không')"
                                                                class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets_admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets_admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets_admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets_admin/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('assets_admin/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets_admin/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets_admin/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection
