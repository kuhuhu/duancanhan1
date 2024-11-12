@extends('user.main')
@section('cart')
    {{-- @if (session('msg'))
        <script>
            alert('{{ session('msg') }}')
        </script>
    @endif --}}
    <div class="page-content">


        <!--start breadcrumb-->
        <div class="py-4 border-bottom">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->


        <!--start product details-->
        <section class="section-padding">
            <form action="{{ route('user.post_address') }}" method="post">
                @csrf
                <div class="container">
                    <div class="d-flex align-items-center px-3 py-2 border mb-4">
                        <div class="text-start">
                            <h4 class="mb-0 h4 fw-bold">My Bag (4 items)</h4>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ route('homepage') }}">
                                <button type="button" class="btn btn-light btn-ecomm">Continue Shopping</button>
                            </a>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-12 col-xl-8">
                            @foreach ($cart as $item)
                                <div class="card rounded-0 mb-3">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-lg-row gap-3">
                                            @if ($item->price_sale == 0)
                                                <input class="product-checkbox" type="checkbox"
                                                    value ="{{ $item->id }} " name="cartMemory[]"
                                                    data-price="{{ $item->price * $item->quantity }}"
                                                    data-pricesale="{{ $item->price * $item->quantity }}" data-sale="0"
                                                    style="width:15px">
                                            @else
                                                <input class="product-checkbox" type="checkbox"
                                                    value ="{{ $item->id }} " name="cartMemory[]"
                                                    data-price="{{ $item->price * $item->quantity }}"
                                                    data-pricesale="{{ ($item->price * $item->price_sale * $item->quantity) / 100 }}"
                                                    data-sale="{{ $item->price * $item->quantity - ($item->price * $item->price_sale * $item->quantity) / 100 }}"
                                                    style="width:15px">
                                            @endif


                                            <div class="product-img">
                                                <img src="{{ asset('upload') }}/{{ $item->image }}" width="150"
                                                    alt="">
                                            </div>
                                            <div class="product-info flex-grow-1">
                                                <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                                <div class="product-price d-flex align-items-center gap-2 mt-3">

                                                    @if ($item->price_sale == 0)
                                                        <div class="h6 fw-bold">${{ $item->price }}</div>
                                                    @else
                                                        <div class="h6 fw-bold">
                                                            ${{ ($item->price * $item->price_sale) / 100 }}
                                                        </div>
                                                        <div class="h6 fw-light text-muted text-decoration-line-through">
                                                            ${{ $item->price }}</div>
                                                        <div class="h6 fw-bold text-danger">({{ $item->price_sale }}% off)
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="mt-3 hstack gap-2">
                                                    <button type="button" class="btn btn-sm btn-light border rounded-0"
                                                        data-bs-toggle="modal" data-bs-target="#SizeModal">Size :
                                                        {{ $item->size }}</button>
                                                    <button type="button" class="btn btn-sm btn-light border rounded-0"
                                                        data-bs-toggle="modal" data-bs-target="#QtyModal">Qty :
                                                        {{ $item->quantity }}</button>
                                                </div>
                                            </div>
                                            <div class="d-none d-lg-block vr"></div>
                                            <div class="d-grid gap-2 align-self-start align-self-lg-center">
                                                <button type="button" class="btn btn-ecomm" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm khỏi giỏ hàng');">
                                                    <a class="text-black" href="{{ route('user.delete_cart', ['id' => $item->id]) }}">
                                                        <i class="bi bi-x-lg me-2"></i>Remove
                                                    </a>
                                                </button>
                                                <button type="button" class="btn dark btn-ecomm"><i
                                                        class="bi bi-suit-heart me-2"></i>Move to Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    if ($item->price_sale == 0) {
                                        $total += $item->price;
                                    } else {
                                        $total += ($item->price * $item->price_sale) / 100;
                                    }
                                @endphp
                            @endforeach

                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card rounded-0 mb-3">

                                <div class="card-body">
                                    <h5 class="fw-bold mb-4">Order Summary</h5>
                                    <div class="hstack align-items-center justify-content-between">
                                        <p class="mb-0">Bag Total</p>
                                        <p class="mb-0" id="total-price">$0</p>
                                    </div>
                                    <hr>
                                    <div class="hstack align-items-center justify-content-between">
                                        <p class="mb-0">Bag discount</p>
                                        <p class="mb-0 text-success" id="total-sale">- $0</p>
                                    </div>
                                    <hr>
                                    <div class="hstack align-items-center justify-content-between fw-bold text-content">
                                        <p class="mb-0">Total Amount</p>
                                        <p class="mb-0" id="total-price-sale">$0.00</p>
                                    </div>
                                    <input type="hidden" id="price" name="price" value="">
                                    <input type="hidden" id="pricesale" name="pricesale" value="">
                                    <input type="hidden" id="sale" name="sale" value="">
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-dark btn-ecomm py-3 px-5">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!--end row-->
                    <script>
                        document.addEventListener('DOMContentLoaded', (event) => {
                            const checkboxes = document.querySelectorAll('.product-checkbox');
                            const totalPriceElement = document.getElementById('total-price');
                            const totalPriceSaleElement = document.getElementById('total-price-sale');
                            const totalSaleElement = document.getElementById('total-sale');

                            const price = document.getElementById('price');
                            const pricesale = document.getElementById('pricesale');
                            const sale = document.getElementById('sale');
                            checkboxes.forEach(checkbox => {
                                checkbox.addEventListener('change', updateTotalPrice);
                            });

                            function updateTotalPrice() {
                                let totalPrice = 0;
                                let totalPriceSale = 0;
                                let totalSale = 0;
                                checkboxes.forEach(checkbox => {
                                    if (checkbox.checked) {
                                        totalPrice += parseFloat(checkbox.dataset.price);
                                        totalPriceSale += parseFloat(checkbox.dataset.pricesale);
                                        totalSale += parseFloat(checkbox.dataset.sale);
                                    }
                                });
                                totalPriceElement.textContent = '$' + totalPrice.toLocaleString('vi-VN');
                                totalPriceSaleElement.textContent = '$' + totalPriceSale.toLocaleString('vi-VN');
                                totalSaleElement.textContent = '-$' + totalSale.toLocaleString('vi-VN');
                                price.value = totalPrice.toLocaleString('vi-VN');
                                pricesale.value = totalPriceSale.toLocaleString('vi-VN');
                                sale.value = totalSale.toLocaleString('vi-VN');
                            }
                        });
                    </script>
                </div>
            </form>
        </section>
        <!--start product details-->




    </div>
@endsection
