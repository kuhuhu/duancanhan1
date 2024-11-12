@include('user.page-layout.header')
<!--start page content-->
<div class="page-content">

    <!--start carousel-->
    @include('user.page-layout.slide-section')
    <!--end carousel-->


    <!--start Featured Products slider-->
    @include('user.page-layout.spnoibat')
    <!--end Featured Products slider-->


    <!--start tabular product-->
    @include('user.page-layout.spmoinhat')
    <!--end tabular product-->


    <!--start features-->
    <section class="product-thumb-slider section-padding">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">What We Offer!</h3>
                <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 g-4">
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-primary">
                                <i class="bi bi-truck"></i>
                            </div>
                            <h5 class="fw-bold">Free Delivery</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-danger">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <h5 class="fw-bold">Secure Payment</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-success">
                                <i class="bi bi-minecart-loaded"></i>
                            </div>
                            <h5 class="fw-bold">Free Returns</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-warning border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-warning">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h5 class="fw-bold">24/7 Support</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end features-->


    <!--start special product-->
    <section class="section-padding bg-section-2">
        <div class="container">
            <div class="card border-0 rounded-0 p-3 depth">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('upload/footer.jpg') }}" class="img-fluid rounded-0" alt="...">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body">
                            <h3 class="fw-bold">New Features of Trending Products</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent px-0">Contrary to popular belief, Lorem Ipsum
                                    is not simply
                                    random text.</li>
                                <li class="list-group-item bg-transparent px-0">All the Lorem Ipsum generators on the
                                    Internet tend.
                                </li>
                                <li class="list-group-item bg-transparent px-0">There are many variations of passages
                                    of Lorem Ipsum
                                    available.</li>
                                <li class="list-group-item bg-transparent px-0">There are many variations of passages
                                    available.</li>
                            </ul>
                            <div class="buttons mt-4 d-flex flex-column flex-lg-row gap-3">
                                <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">Buy Now</a>
                                <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--start special product-->


    <!--start Brands-->
    <section class="section-padding">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">Shop By Brands</h3>
                <p class="mb-0 text-capitalize">Select your favorite brands and purchase</p>
            </div>
            <div class="brands">
                <div class="row row-cols-2 row-cols-lg-5 g-4">
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/01.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/02.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/03.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/04.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/05.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/06.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/07.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/08.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/09.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="assets/images/brands/10.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end Brands-->


    <!--start cartegory slider-->
    @include('user.page-layout.danhmuchangdau')
    <!--end cartegory slider-->


    <!--subscribe banner-->
    <section class="product-thumb-slider subscribe-banner p-5">
        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <div class="text-center">
                    <h3 class="mb-0 fw-bold text-white">Get Latest Update by <br> Subscribe Our Newslater</h3>
                    <div class="mt-3">
                        <input type="text"
                            class="form-control form-control-lg bubscribe-control rounded-0 px-5 py-3"
                            placeholder="Enter your email">
                    </div>
                    <div class="mt-3 d-grid">
                        <button type="button"
                            class="btn btn-lg btn-ecomm bubscribe-button px-5 py-3">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--subscribe banner-->





</div>
<!--end page content-->

@include('user.page-layout.footer')
