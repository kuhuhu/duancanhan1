@extends('user.main')
@section('wishlist')
    <div class="page-content">


        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->


        <!--start product wishlist-->
        <section class="section-padding">
            <div class="container">
                <div class="d-flex align-items-center px-3 py-2 border mb-4">
                    <div class="text-start">
                        <h4 class="mb-0 h4 fw-bold">Wishlist ({{$countWishlist[0]->countWishlist}} Items)</h4>
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-light btn-ecomm">Continue Shopping</button>
                    </div>
                </div>

                <div class="similar-products">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">

                        @foreach ($wishlist as $item)
                            <div class="col">
                                <div class="card rounded-0">
                                    <div class="btn-close wishlist-close position-absolute end-0 top-0"></div>
                                    <a href="javascript:;">
                                        <img src="{{asset('upload')}}/{{$item->image}}" alt=""
                                            class="card-img-top rounded-0">
                                    </a>
                                    <div class="card-body border-top text-center">
                                        <p class="mb-0 product-short-name">{{ $item->name }}</p>
                                        <div
                                            class="product-price d-flex align-items-center gap-2 mt-2 justify-content-center">
                                            <div class="h6 fw-bold">${{ ($item->price * $item->price_sale) / 100 }}</div>
                                            <div class="h6 fw-light text-muted text-decoration-line-through">
                                                ${{ $item->price }}</div>
                                            <div class="h6 fw-bold text-danger">({{ $item->price_sale }}% off)</div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent text-center">
                                        <a href="javascript:;" class="btn btn-ecomm w-100">Move to Bag</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--start product details-->


    </div>
@endsection
