<section class="section-padding">
    <div class="container">
        <div class="text-center pb-3">
            <h3 class="mb-0 h3 fw-bold">Featured Products</h3>
            <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
        </div>
        <div class="product-thumbs">
            @foreach ($spnoibat as $key => $item)
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="{{ route('user.product_detail', ['id'=>$item->id])}}">
                            <img src="{{$link_img}}/{{$item->image}}" class="card-img-top" alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">{{$item->name}}</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">${{$item->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
