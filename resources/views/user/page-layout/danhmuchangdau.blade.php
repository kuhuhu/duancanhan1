<section class="cartegory-slider section-padding bg-section-2">
    <div class="container">
        <div class="text-center pb-3">
            <h3 class="mb-0 h3 fw-bold">Top Categories</h3>
            <p class="mb-0 text-capitalize">Select your favorite categories and purchase</p>
        </div>
        <div class="cartegory-box">
            
            @foreach ($danhmuc as $key => $item)
                <a href="{{ route('user.shop_grid_type_5') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="overflow-hidden">
                                <img src="{{ $link_img }}/{{ $item->image }}" class="card-img-top rounded-0"
                                    alt="...">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 cartegory-name mt-3 fw-bold">{{ $item->name }}</h5>
                                <h6 class="mb-0 product-number fw-bold">{{ $item->quantity }} Products</h6>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>
</section>
