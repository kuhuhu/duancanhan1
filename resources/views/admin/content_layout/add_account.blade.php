@extends('admin.main')
@section('add_account')
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
                        <form action="{{ route('admin.put_edit_product', ['id' => $data->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Product</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Name</label>
                                        <input type="text" class="form-control" value="{{ $data->name }}"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="hue-demo">Category</label>
                                        <select name="id_category" class="select form-control custom-select"
                                            style="width: 100%; height:36px;">
                                            @foreach ($data2 as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <script>
                                            document.querySelector('select[name=id_category]').value = {{ $data->id_category }}
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="position-bottom-left">Image</label>
                                        <input type="file" class="form-control" name="image" value="{{ $data->image }}">
                                        <img src="{{ asset('upload') }}/{{ $data->image }}" alt="" width="100px"
                                            height="80px">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="position-top-right">Price</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                data-position="top right" value="{{ $data->price }}" placeholder="00.00$"
                                                name="price">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="position-top-right">Price sale</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                data-position="top right" value="{{ $data->price_sale }}" placeholder="%"
                                                name="price_sale">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="position-top-right">Size 38</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                value="{{ $data->size38 }}" placeholder="" name="size38">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="position-top-right">Size 39</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                value="{{ $data->size39 }}" placeholder="" name="size39">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="position-top-right">Size 40</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                value="{{ $data->size40 }}" placeholder="" name="size40">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="position-top-right">Size 41</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                value="{{ $data->size41 }}" placeholder="" name="size41">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="position-top-right">Size 42</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                value="{{ $data->size42 }}" placeholder="" name="size42">
                                        </div>
                                    </div>

                                    <label>Description</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="description">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <a href="{{ route('admin.product') }}"><button type="button"
                                                class="btn btn-primary">Back</button></a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                        {{-- <button type="submit" class="btn btn-info">Edit</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button> --}}
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