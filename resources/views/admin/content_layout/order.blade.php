@extends('admin.main')
@section('order')
    <div id="main-wrapper">

        <div class="page-wrapper">


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ORDER MANAGEMENT</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID User</th>
                                                <th>Username</th>
                                                <th>Address</th>
                                                <th>Created at</th>
                                                <th>Order Status</th>
                                                <th>Order Payment</th>
                                                <th>Payment Type</th>
                                                <th>Total Amount</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <form action="{{ route('admin.update_order') }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <td>{{ $item->id }}</td>
                                                        <input type="hidden" name="id_order" value="{{ $item->id }}">
                                                        <td>{{ $item->id_user }}</td>
                                                        <td>{{ $item->username }}</td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->creat_at_order)->format('Y-m-d') }}
                                                        </td>
                                                        {{-- order_status --}}
                                                        @if ($item->order_status == 1)
                                                            <td><select name="order_status" id="order_status">
                                                                    <option value="1">Waitfor confirmation</option>
                                                                    <option value="2">Confirmed</option>
                                                                    <option value="3">Being transported</option>
                                                                    <option value="4">Complete</option>
                                                                    <option value="5">Cancelled</option>
                                                                </select></td>
                                                        @elseif($item->order_status == 2)
                                                            <td><select name="order_status" id="order_status">
                                                                    <option value="2">Confirmed</option>
                                                                    <option value="3">Being transported</option>
                                                                    <option value="4">Complete</option>
                                                                    <option value="5">Cancelled</option>
                                                                </select></td>
                                                        @elseif($item->order_status == 3)
                                                            <td><select name="order_status" id="order_status">
                                                                    <option value="3">Being transported</option>
                                                                    <option value="4">Complete</option>
                                                                    <option value="5">Cancelled</option>
                                                                </select></td>
                                                        @elseif($item->order_status == 4)
                                                            <td><select name="order_status" id="order_status">
                                                                    <option value="4">Complete</option>
                                                                </select></td>
                                                        @else
                                                            <td><select name="order_status" id="order_status">
                                                                    <option value="5">Cancelled</option>
                                                                </select></td>
                                                        @endif
                                                        {{-- order_payment --}}
                                                        @if ($item->order_payment == 1)
                                                            <td>Payment on delivery</td>
                                                        @else
                                                            <td>Payment on card </td>
                                                        @endif
                                                        {{-- order_payment --}}
                                                        @if ($item->order_payment == 1)
                                                            <td>Unpaid</td>
                                                        @else
                                                            <td>Paid</td>
                                                        @endif
                                                        <td>${{ $item->total_amount }}</td>
                                                        <td>
                                                            <button
                                                                onclick="return confirm('Bạn có chắc muốn update đơn hàng?')"
                                                                type="submit" class="btn btn-primary">Update</button>
                                                            <hr>
                                                            <a
                                                                href="{{ route('admin.order_detail', ['id' => $item->id]) }}"><button
                                                                    type="button" class="btn btn-outline-success">Order
                                                                    Details</button></a>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID User</th>
                                                <th>Username</th>
                                                <th>Address</th>
                                                <th>Created at</th>
                                                <th>Order Status</th>
                                                <th>Order Payment</th>
                                                <th>Payment Type</th>
                                                <th>Total Amount</th>
                                                <th>Operation</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

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
