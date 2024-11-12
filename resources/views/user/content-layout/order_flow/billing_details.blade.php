@extends('user.main')
@section('billing_details')
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">checkout</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Billing Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!--start product details-->
        <section class="section-padding">
            <div class="container">
                <form action="{{ route('user.post_billing_details') }}" method="post">
                  @csrf
                    <div class="d-flex align-items-center px-3 py-2 border mb-4">
                        <div class="text-start">
                            <h4 class="mb-0 h4 fw-bold">Billing Details</h4>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-lg-8 col-xl-8">
                            <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Personal Details</h6>
                            <div class="card rounded-0 mb-3">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control rounded-0" name="name"
                                                    id="floatingFirstName" placeholder="First Name" value="{{old('name')}}">
                                                <label for="floatingFirstName">Name</label>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control rounded-0" name="tel_address"
                                                    id="floatingMobileNo" placeholder="Mobile No" value="{{old('tel_address')}}">
                                                <label for="floatingMobileNo">Mobile No</label>
                                                @error('tel_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </div>
                            <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Shipping Details</h6>
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control rounded-0" name="address"
                                                    id="floatingStreetAddress" placeholder="Street Address" value="{{old('address')}}">
                                                <label for="floatingStreetAddress">Street Address</label>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-lg-4 col-xl-4">
                            <div class="card rounded-0 mb-3">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-4">Order Summary</h5>
                                    <div class="hstack align-items-center justify-content-between">
                                        <p class="mb-0">Bag Total</p>
                                        <p class="mb-0">${{ $price }}</p>
                                    </div>
                                    <hr>
                                    <div class="hstack align-items-center justify-content-between">
                                        <p class="mb-0">Bag discount</p>
                                        <p class="mb-0 text-success">- ${{ $sale }}</p>
                                    </div>
                                    <hr>
                                    <div class="hstack align-items-center justify-content-between fw-bold text-content">
                                        <p class="mb-0">Total Amount</p>
                                        <p class="mb-0">${{ $pricesale }}</p>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-dark btn-ecomm py-3 px-5">Continue</button>
                                    </div>
                                    <input type="hidden" id="price" name="price" value="{{ $price }}">
                                    <input type="hidden" id="pricesale" name="pricesale" value="{{ $pricesale }}">
                                    <input type="hidden" id="sale" name="sale" value="{{ $sale }}">
                                </div>
                            </div>

                        </div>
                    </div><!--end row-->
                </form>

            </div>
        </section>
        <!--start product details-->




    </div>
@endsection
