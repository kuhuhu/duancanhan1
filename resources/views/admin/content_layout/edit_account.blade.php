@extends('admin.main')
@section('edit_account')
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
                        <form action="{{ route('admin.put_edit_account', ['id' => $data->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Account</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Username</label>
                                        <input type="text" class="form-control" value="{{ $data->username }}"
                                            name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="hue-demo">Password</label>
                                        <input type="text" class="form-control" value="{{ $data->password }}"
                                            name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="hue-demo">Email</label>
                                        <input type="text" class="form-control" value="{{ $data->email }}"
                                            name="email">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="position-top-right">Tel</label>
                                            <input type="number" id="position-top-right" class="form-control"
                                                data-position="top right" value="{{ $data->tel }}" name="tel">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <a href="{{ route('admin.account') }}"><button type="button"
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
