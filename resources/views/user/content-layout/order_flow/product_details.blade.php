@extends('user.main')
@section('product_detail')
    <!--start page content-->
    <div class="page-content">
        {{-- @if (session('msg'))
            <script>
                alert('{{ session('msg') }}')
            </script>
        @endif --}}

        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Page Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->


        <!--start product details-->
        <section class="py-4">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12 col-xl-7">
                        <div class="product-images">
                            <div class="product-zoom-images">
                                <div class="row row-cols-2 g-3">

                                    <div class="col">
                                        <div class="img-thumb-container overflow-hidden position-relative"
                                            data-fancybox="gallery"
                                            data-src="{{ asset('upload') }}/{{ $infoProduct[0]->image }}">
                                            <img src="{{ asset('upload') }}/{{ $infoProduct[0]->image }}" class="img-fluid"
                                                alt="">
                                        </div>
                                    </div>
                                    @foreach ($infoProduct as $item)
                                        <div class="col">
                                            <div class="img-thumb-container overflow-hidden position-relative"
                                                data-fancybox="gallery"
                                                data-src="{{ asset('upload') }}/{{ $item->image_description }}">
                                                <img src="{{ asset('upload') }}/{{ $item->image_description }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    @endforeach


                                </div><!--end row-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-5">
                        <div class="product-info">
                            <h4 class="product-title fw-bold mb-1">{{ $infoProduct[0]->name }}</h4>
                            <p class="mb-0">{{ $infoProduct[0]->description }}</p>
                            <div class="product-rating">
                                <div class="hstack gap-2 border p-1 mt-3 width-content">
                                    <div><span class="rating-number">4.8</span><i
                                            class="bi bi-star-fill ms-1 text-warning"></i></div>
                                    <div class="vr"></div>
                                    <div>162 Ratings</div>
                                </div>
                            </div>
                            <hr>
                            <div class="product-price d-flex align-items-center gap-3">
                                @if ($infoProduct[0]->price_sale == 0)
                                    <div class="h4 fw-bold">${{ $infoProduct[0]->price }}</div>
                                @else
                                    <div class="h4 fw-bold">
                                        ${{ ($infoProduct[0]->price * $infoProduct[0]->price_sale) / 100 }}</div>
                                    <div class="h5 fw-light text-muted text-decoration-line-through">
                                        ${{ $infoProduct[0]->price }}</div>
                                @endif

                                <div class="h4 fw-bold text-danger">({{ $infoProduct[0]->price_sale }}% off)</div>
                            </div>
                            <p class="fw-bold mb-0 mt-1 text-success">inclusive of all taxes</p>

                            <div class="more-colors mt-4">
                                <h6 class="fw-bold mb-3">Photo Description</h6>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <a href="javascript:;">
                                            <img src="{{ asset('upload') }}/{{ $infoProduct[0]->image }}" width="65"
                                                alt="">
                                        </a>
                                    </div>
                                    @foreach ($infoProduct as $item)
                                        <div class="">
                                            <a href="javascript:;">
                                                <img src="{{ asset('upload') }}/{{ $item->image_description }}"
                                                    width="65" alt="">
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <form id="productForm" action="{{ route('user.cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $infoProduct[0]->id_product }}">
                                <div class="size-chart mt-4">
                                    <h6 class="fw-bold mb-3">Select Size</h6>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="">
                                            <button type="button" name="size" value="38"
                                                onclick="selectSize('38'); selectSl('{{ $infoProduct[0]->size38 }}')">38</button>
                                        </div>
                                        <div class="">
                                            <button type="button" name="size" value="39"
                                                onclick="selectSize('39'); selectSl('{{ $infoProduct[0]->size39 }}')">39</button>
                                        </div>
                                        <div class="">
                                            <button type="button" name="size" value="40"
                                                onclick="selectSize('40'); selectSl('{{ $infoProduct[0]->size40 }}')">40</button>
                                        </div>
                                        <div class="">
                                            <button type="button" name="size" value="41"
                                                onclick="selectSize('41'); selectSl('{{ $infoProduct[0]->size41 }}')">41</button>
                                        </div>
                                        <div class="">
                                            <button type="button" name="size" value="42"
                                                onclick="selectSize('42'); selectSl('{{ $infoProduct[0]->size42 }}')">42</button>
                                        </div>

                                        <input type="hidden" id="size_product" name="size_product" value="">
                                    </div>
                                    <div id="selectedSize"></div>
                                    <input type="hidden" id="quantity_remaining" name="quantity_remaining"
                                        value="">

                                </div>

                                <script>
                                    function selectSize(size) {
                                        document.getElementById('size_product').value = size;
                                        document.getElementById('selectedSize').innerHTML = 'Selected Size: ' + size;
                                    }

                                    function selectSl(size) {
                                        document.getElementById('selectedSize').innerHTML = 'Quantity remaining: ' + size;
                                        document.getElementById('quantity_remaining').value = size;

                                    }
                                </script>

                                <div class="quantity-container">
                                    <button class="quantity-btn" id="decrease">-</button>
                                    <input type="number" name="quantity_product" id="quantity" value="1"
                                        min="1">
                                    <button class="quantity-btn" id="increase">+</button>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const decreaseButton = document.getElementById('decrease');
                                        const increaseButton = document.getElementById('increase');
                                        const quantityInput = document.getElementById('quantity');

                                        decreaseButton.addEventListener('click', function(event) {
                                            event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện
                                            let currentValue = parseInt(quantityInput.value);
                                            if (currentValue > 1) {
                                                quantityInput.value = currentValue - 1;
                                            }
                                        });

                                        increaseButton.addEventListener('click', function(event) {
                                            event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện
                                            let currentValue = parseInt(quantityInput.value);
                                            quantityInput.value = currentValue + 1;
                                        });
                                    });
                                </script>

                                <div class="cart-buttons mt-3">
                                    <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                                        <button id="addToBag" type="submit"
                                            class="btn btn-lg btn-dark btn-ecomm px-5 py-3 col-lg-6">
                                            <i class="bi bi-basket2 me-2"></i>Add to Bag
                                        </button>
                                        <button id="addToWishlist" type="button" href=""
                                            class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3">
                                            <i class="bi bi-suit-heart me-2"></i>Wishlist</button>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const form = document.getElementById('productForm');
                                        const addToBagButton = document.getElementById('addToBag');
                                        const addToWishlistButton = document.getElementById('addToWishlist');

                                        addToWishlistButton.addEventListener('click', function() {
                                            form.action = "{{ route('user.post_wishlist', ['id' => $infoProduct[0]->id]) }}";
                                            form.submit();
                                        });

                                        addToBagButton.addEventListener('click', function() {
                                            form.action = "{{ route('user.post_cart') }}";
                                        });
                                    });
                                </script>
                            </form>

                            <hr class="my-3">
                            <div class="product-info">
                                <h6 class="fw-bold mb-3">Product Details</h6>
                                <p class="mb-1">{{ $infoProduct[0]->description }}</p>
                            </div>
                            <hr class="my-3">
                            <div class="customer-ratings">
                                <h6 class="fw-bold mb-3">Customer Ratings</h6>
                                <div class="d-flex align-items-center gap-4 gap-lg-5 flex-wrap flex-lg-nowrap">
                                    <div class="">
                                        <h1 class="mb-2 fw-bold">4.8<span class="fs-5 ms-2 text-warning"><i
                                                    class="bi bi-star-fill"></i></span></h1>
                                        <p class="mb-0">3.8k Verified Buyers</p>
                                    </div>
                                    <div class="vr d-none d-lg-block"></div>
                                    <div class="w-100">
                                        <div class="rating-wrrap hstack gap-2 align-items-center">
                                            <p class="mb-0">5</p>
                                            <div class=""><i class="bi bi-star"></i></div>
                                            <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 75%"></div>
                                            </div>
                                            <p class="mb-0">1528</p>
                                        </div>
                                        <div class="rating-wrrap hstack gap-2 align-items-center">
                                            <p class="mb-0">4</p>
                                            <div class=""><i class="bi bi-star"></i></div>
                                            <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 65%"></div>
                                            </div>
                                            <p class="mb-0">253</p>
                                        </div>
                                        <div class="rating-wrrap hstack gap-2 align-items-center">
                                            <p class="mb-0">3</p>
                                            <div class=""><i class="bi bi-star"></i></div>
                                            <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 45%">
                                                </div>
                                            </div>
                                            <p class="mb-0">258</p>
                                        </div>
                                        <div class="rating-wrrap hstack gap-2 align-items-center">
                                            <p class="mb-0">2</p>
                                            <div class=""><i class="bi bi-star"></i></div>
                                            <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 35%"></div>
                                            </div>
                                            <p class="mb-0">78</p>
                                        </div>
                                        <div class="rating-wrrap hstack gap-2 align-items-center">
                                            <p class="mb-0">1</p>
                                            <div class=""><i class="bi bi-star"></i></div>
                                            <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 25%"></div>
                                            </div>
                                            <p class="mb-0">27</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-3">
                            <div class="customer-reviews">
                                <h6 class="fw-bold mb-3">Customer Reviews</h6>
                                <div class="reviews-wrapper">
                                    @foreach ($allComment as $item)
                                        <div class="d-flex flex-column flex-lg-row gap-3">
                                            <div class=""><span class="badge bg-green rounded-0">5<i
                                                        class="bi bi-star-fill ms-1"></i></span></div>
                                            <div class="flex-grow-1">
                                                <p class="mb-2">{{ $item->content }}</p>
                                                <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                                                    <div class="hstack flex-grow-1 gap-3">
                                                        <p class="mb-0">{{ $item->username }}</p>
                                                        <div class="vr"></div>
                                                        <div class="date-posted">{{ $item->creat_at_comment }}</div>
                                                    </div>
                                                    <div class="hstack">
                                                        <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>68
                                                        </div>
                                                        <div class="mx-3"></div>
                                                        <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>24
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach

                                    {{-- comment --}}
                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col">
                                                <form
                                                    action="{{ route('user.post_comment', ['id' => $infoProduct[0]->id]) }}"
                                                    method="post">
                                                    <div class="comment-input">
                                                        @csrf
                                                        <input type="text" placeholder="Type your comment here..."
                                                            name="comment">
                                                        <button type="submit">
                                                            <i class="fas fa-paper-plane"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="javascript:;" class="btn btn-ecomm btn-outline-dark">View More Reviews<i
                                                class="bi bi-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </section>
        <!--start product details-->


        <!--start product details-->
        <section class="section-padding">
            <div class="container">
                <div class="separator pb-3">
                    <div class="line"></div>
                    <h3 class="mb-0 h3 fw-bold">Similar Products</h3>
                    <div class="line"></div>
                </div>
                <div class="similar-products">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">

                        @foreach ($productOfCategory as $item)
                            <div class="col">
                                <a href="{{ route('user.product_detail', ['id' => $item->id]) }}">
                                    <div class="card rounded-0">
                                        <img src="{{ asset('upload') }}/{{ $item->image }}" alt=""
                                            class="card-img-top rounded-0">
                                        <div class="card-body border-top">
                                            <h5 class="mb-0 fw-bold product-short-title">{{ $item->name }}</h5>
                                            {{-- <p class="mb-0 product-short-name">Color Printed Kurta</p> --}}
                                            <div class="product-price d-flex align-items-center gap-3 mt-2">
                                                @if ($item->price_sale == 0)
                                                    <div class="h6 fw-bold">${{ $item->price }}</div>
                                                @else
                                                    <div class="h6 fw-bold">
                                                        ${{ ($item->price * $item->price_sale) / 100 }}
                                                    </div>
                                                    <div class="h6 fw-light text-muted text-decoration-line-through">
                                                        ${{ $item->price }}</div>
                                                @endif

                                                <div class="h6 fw-bold text-danger">({{ $item->price_sale }}% off)</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end product details-->


    </div>
@endsection
