@extends('user.main')
@section('account_orders')
    <div class="page-content">


        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop With Grid</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->


        <!--start product details-->
        <section class="section-padding">
            <div class="container">
                <div class="d-flex align-items-center px-3 py-2 border mb-4">
                    <div class="text-start">
                        <h4 class="mb-0 h4 fw-bold">Account - Orders</h4>
                    </div>
                </div>
                <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i
                            class="bi bi-person me-2"></i>Account</span></div>
                <div class="row">

                    @include('user.content-layout.account.account-layout.menu_left')

                    <div class="col-12 col-xl-9">

                        <div class="card rounded-0 mb-3 bg-light">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-xl-row gap-3 align-items-center">
                                    <div class="">
                                        <h5 class="mb-1 fw-bold">All Orders</h5>
                                        <p class="mb-0">for anytime</p>
                                    </div>
                                    <div class="order-search flex-grow-1">
                                        <form>
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5 rounded-0"
                                                    placeholder="Search Product...">
                                                <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                        class="bi bi-search ms-3"></i></span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="filter">
                                        <button type="button" class="btn btn-dark rounded-0" data-bs-toggle="modal"
                                            data-bs-target="#FilterOrders"><i class="bi bi-filter me-2"></i>Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($order as $item)
                            <div class="card rounded-0 mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-xl-row gap-3">
                                        <div class="product-img">
                                            <img src="assets/images/featured-products/05.webp" width="120"
                                                alt="">
                                        </div>
                                        <div class="product-info flex-grow-1">
                                                <h5 class="fw-bold mb-1">{{ $item->username }}</h5>
                                                <p class="mb-0">Delivery address: {{ $item->address }}</p>
                                            @if ($item->payment_type == 1)
                                                <p class="mb-0">Payment methods: Payment on delivery</p>
                                            @else
                                                <p class="mb-0">Payment methods: Payment on card </p>
                                            @endif
                                            <div class="mt-3 hstack gap-2">
                                                <button type="button" class="btn btn-sm border rounded-0">Total amount:
                                                    {{ $item->total_amount }}
                                                </button>
                                                <button type="button" class="btn btn-sm border rounded-0">Date of purchase:
                                                    {{ date('Y-m-d', strtotime($item->creat_at_order)) }}

                                                </button>

                                                @if ($item->order_status == 1)
                                                    <button type="button" class="btn btn-sm border rounded-0">Status: Wait
                                                        for confirmation</button>
                                                @elseif($item->order_status == 2)
                                                    <button type="button" class="btn btn-sm border rounded-0">Status:
                                                        Confirmed</button>
                                                @elseif($item->order_status == 3)
                                                    <button type="button" class="btn btn-sm border rounded-0">Status: Being
                                                        transported</button>
                                                @elseif($item->order_status == 4)
                                                    <button type="button" class="btn btn-sm border rounded-0">Status:
                                                        Complete</button>
                                                @else
                                                    <button type="button" class="btn btn-sm border rounded-0">Status:
                                                            </button>
                                                @endif
                                                @if ($item->order_payment == 1)
                                                    <button type="button" class="btn btn-sm border rounded-0">Order
                                                        status: Unpaid</button>
                                                @else
                                                    <button type="button" class="btn btn-sm border rounded-0">Order
                                                        status: Paid</button>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="d-none d-xl-block vr"></div>
                                        <div class="d-grid align-self-start align-self-xl-center">
                                            <a href=""><button type="button"
                                                    class="btn btn-outline-dark btn-ecomm">View
                                                    Details</button></a>
                                        </div>
                                        <div class="d-grid align-self-start align-self-xl-center">
                                            <a href=""><button type="button"
                                                    class="btn btn-outline-danger btn-ecomm">Cancel
                                                    Order</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer rounded-0 bg-transparent">
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="mb-1 fw-bold">Rate this Product</p>
                                        <div class="ratings">
                                            <i class="bi bi-star-fill text-warning h6"></i>
                                            <i class="bi bi-star-fill text-warning h6"></i>
                                            <i class="bi bi-star-fill text-warning h6"></i>
                                            <i class="bi bi-star h6"></i>
                                            <i class="bi bi-star h6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div><!--end row-->
            </div>
        </section>
        <!--start product details-->


        <!-- filter Modal -->
        <div class="modal" id="FilterOrders" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Filter Orders</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 class="mb-3 fw-bold">Status</h6>
                        <div class="status-radio d-flex flex-column gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    On the way
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Delivered
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Cancelled
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault5">
                                <label class="form-check-label" for="flexRadioDefault5">
                                    Returned
                                </label>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-3 fw-bold">Time</h6>
                        <div class="status-radio d-flex flex-column gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioTime"
                                    id="flexRadioDefault6" checked>
                                <label class="form-check-label" for="flexRadioDefault6">
                                    Anytime
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioTime"
                                    id="flexRadioDefault7">
                                <label class="form-check-label" for="flexRadioDefault7">
                                    Last 30 days
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioTime"
                                    id="flexRadioDefault8">
                                <label class="form-check-label" for="flexRadioDefault8">
                                    Last 6 months
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioTime"
                                    id="flexRadioDefault9">
                                <label class="form-check-label" for="flexRadioDefault9">
                                    Last year
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="d-flex align-items-center gap-3 w-100">
                            <button type="button" class="btn btn-outline-dark btn-ecomm w-50">Clear Filters</button>
                            <button type="button" class="btn btn-dark btn-ecomm w-50">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Filters Modal -->


    </div>
@endsection
