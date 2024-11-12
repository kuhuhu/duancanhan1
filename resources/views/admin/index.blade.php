@include('admin.page_layout.header')
@include('admin.page_layout.menu')
@include('admin.page_layout.sidebar')

<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
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
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="{{ route('admin') }}">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                            <h6 class="text-white">Dashboard</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
                <a href="{{ route('admin.account') }}">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                            <h6 class="text-white">User Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="{{ route('admin.category') }}">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                            <h6 class="text-white">Category Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="{{ route('admin.product') }}">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                            <h6 class="text-white">Product Management</h6>
                        </div>
                    </div>
                </a>

            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="{{ route('admin.account') }}">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                            <h6 class="text-white">Full Management</h6>
                        </div>
                    </div>
                </a>

            </div>
            <!-- Column -->
            <!-- Column -->

            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Site Analysis</h4>
                                <h5 class="card-subtitle">Overview of Latest Month</h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    {{-- <div class="flot-chart-content" id="flot-line-chart"></div> --}}
                                    <div class="bars" style="height: 300px;"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                {{-- <div class="row">

                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-plus m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{$countAccount}}</h5>
                                            <small class="font-light">New Users</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{$countProduct}}</h5>
                                            <small class="font-light">Total Product</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-tag m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{$countOrder}}</h5>
                                            <small class="font-light">Total Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-table m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{$CountPendingOrder}}</h5>
                                            <small class="font-light">Pending Orders</small>
                                        </div>
                                    </div>

                                </div> --}}
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @include('admin.page_layout.footer')

    </body>

    </html>
