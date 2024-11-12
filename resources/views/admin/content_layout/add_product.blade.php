@extends('admin.main')
@section('add_product')
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post_add_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="hue-demo">Category</label>
                                        <select name="id_category" class="select form-control custom-select"
                                            style="width: 100%; height:36px;" value="{{ old('id_category') }}">
                                            @foreach ($data2 as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="position-bottom-left">Image</label>
                                        <input type="file" class="form-control" name="image" id="imageInput1"
                                            value="">
                                        <img id="imagePreview" src="" alt="Image Preview" width="100px"
                                            height="80px" style="display: none; margin-top: 10px;">
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <script>
                                        document.getElementById('imageInput1').addEventListener('change', function(event) {
                                            const imagePreview = document.getElementById('imagePreview');
                                            const file = event.target.files[0];

                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    imagePreview.src = e.target.result;
                                                    imagePreview.style.display = 'block'; // Hiển thị ảnh
                                                };
                                                reader.readAsDataURL(file);
                                            } else {
                                                imagePreview.src = '';
                                                imagePreview.style.display = 'none'; // Ẩn ảnh nếu không có ảnh nào được chọn
                                            }
                                        });
                                    </script>
                                    <div class="form-group">
                                        <label for="position-bottom-left">Image Description</label>
                                        <input type="file" class="form-control" name="image_description[]"
                                            id="imageInput" value="{{ old('image_description[]') }}" multiple>
                                        <div id="imagePreview2"></div>
                                    </div>
                                    @error('image_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <script>
                                        document.getElementById('imageInput').addEventListener('change', function(event) {
                                            const imagePreview = document.getElementById('imagePreview2');
                                            imagePreview.innerHTML = ''; // Xóa nội dung cũ nếu có
                                            const files = event.target.files;
                                            if (files) {
                                                Array.from(files).forEach(file => {
                                                    const reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        const imgElement = document.createElement('img');
                                                        imgElement.src = e.target.result;
                                                        imgElement.width = 100; // hoặc chiều rộng mong muốn của bạn
                                                        imgElement.height = 80; // hoặc chiều cao mong muốn của bạn
                                                        imgElement.style.margin = '5px'; // khoảng cách giữa các ảnh
                                                        imagePreview.appendChild(imgElement);
                                                    };
                                                    reader.readAsDataURL(file);
                                                });
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="position-top-right">Price</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                data-position="top right" placeholder="00.00$" name="price"
                                                value="{{ old('price') }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="position-top-right">Price sale</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                data-position="top right" placeholder="%" name="price_sale"
                                                value="{{ old('price_sale') }}">
                                            @error('price_sale')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="position-top-right">Size 38</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                placeholder="" name="size38" value="{{ old('size38') }}">
                                            @error('size38')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="position-top-right">Size 39</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                placeholder="" name="size39" value="{{ old('size39') }}">
                                            @error('size39')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="position-top-right">Size 40</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                placeholder="" name="size40" value="{{ old('size40') }}">
                                            @error('size40')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="position-top-right">Size 41</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                placeholder="" name="size41" value="{{ old('size41') }}">
                                            @error('size41')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="position-top-right">Size 42</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                placeholder="" name="size42" value="{{ old('size42') }}">
                                            @error('size42')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <label>Description</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <a href="{{ route('admin.product') }}"><button type="button"
                                                class="btn btn-primary">Back</button></a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>

        </div>

    </div>

    <script src="{{ asset('assets_admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets_admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets_admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets_admin/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- This Page JS -->
    <script src="{{ asset('assets_admin/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/mask/mask.init.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets_admin/libs/quill/dist/quill.min.js') }}"></script>
    <script>
        $(".select2").select2();

        $('.demo').each(function() {

            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
@endsection
