@extends('user.main')
@section('address')
    <div class="page-content">


        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">checkout</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Address</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        

        <!--start product details-->
        <section class="section-padding">
            <form action="{{ route('user.post_payment_method') }}" method="post">
                @csrf
                <div class="container">
                    <div class="d-flex align-items-center px-3 py-2 border mb-4">
                        <div class="text-start">
                            <h4 class="mb-0 h4 fw-bold">Select Delivery Address</h4>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-lg-8 col-xl-8">
                            @if ($addressdefault !== null)
                                <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Default Address</h6>
                                <div class="card rounded-0 mb-3">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-xl-row gap-3">
                                            <div class="address-info form-check flex-grow-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1" value="{{ $addressdefault->id }}" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    <span class="fw-bold mb-0 h5">{{ $addressdefault->name }}</span><br>
                                                    {{ $addressdefault->address }}<br>
                                                    Mobile: <span
                                                        class="text-dark fw-bold">+{{ $addressdefault->tel_address }}</span>
                                                </label>
                                            </div>
                                            <div class="d-none d-xl-block vr"></div>
                                            <div class="d-grid gap-2 align-self-start align-self-xl-center">
                                                <a href="{{ route('user.delete_address', ['id' => $addressdefault->id]) }}"><button
                                                        onclick="return confirm('bạn có chắc muốn xóa địa chỉ này không?')"
                                                        type="button"
                                                        class="btn btn-outline-dark px-5 btn-ecomm">Remove</button></a>
                                                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm"
                                                    data-bs-toggle="modal" data-bs-target="#EditAddress">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if (count($addressother) > 0)
                                <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Other Address</h6>
                            @endif
                            @foreach ($addressother as $item)
                                <div class="card rounded-0 mb-3">

                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-xl-row gap-3">
                                            <div class="address-info form-check flex-grow-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault2" value="{{ $item->id }}">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    <span class="fw-bold mb-0 h5">{{ $item->name }}</span><br>
                                                    {{ $item->address }}<br>
                                                    Mobile: <span class="text-dark fw-bold">+{{ $item->tel_address }}</span>
                                                </label>
                                            </div>
                                            <div class="d-none d-xl-block vr"></div>
                                            <div class="d-grid gap-2 align-self-start align-self-xl-center">
                                                <a href="{{ route('user.delete_address', ['id' => $item->id]) }}"><button
                                                        onclick="return confirm('bạn có chắc muốn xóa địa chỉ này không?')"
                                                        type="button"
                                                        class="btn btn-outline-dark px-5 btn-ecomm">Remove</button></a>
                                                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm"
                                                    data-bs-toggle="modal" data-bs-target="#EditAddress">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="card rounded-0">
                                <div class="card-body">
                                    <a href="{{ route('user.billing_details') }}"><button type="button"
                                            class="btn btn-outline-dark btn-ecomm" data-bs-toggle="modal"
                                            data-bs-target="#NewAddress">Add New Address</button></a>
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

                </div>
            </form>

        </section>
        <!--start product details-->




    </div>
@endsection
