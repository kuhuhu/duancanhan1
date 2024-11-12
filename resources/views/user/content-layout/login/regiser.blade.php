@extends('user.main')
@section('regiser')
    <section class="section-padding">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 col-xxl-5 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-body p-4">
                            <h4 class="mb-0 fw-bold text-center">Registration</h4>
                            <hr>
                            <p class="mb-2">Join / Sign Up using</p>
                            <div class="social-login mb-4">
                                <div class="row g-4">
                                    <div class="col-xl-6">
                                        <button type="button" class="btn bg-facebook btn-ecomm w-100 text-white"><i
                                                class="bi bi-facebook me-2"></i>Facebook</button>
                                    </div>
                                    <div class="col-xl-6">
                                        <button type="button" class="btn bg-pinterest btn-ecomm w-100 text-white"><i
                                                class="bi bi-google me-2"></i>Google</button>
                                    </div>
                                </div>
                            </div>
                            <div class="separator mb-4">
                                <div class="line"></div>
                                <p class="mb-0 fw-bold">Or</p>
                                <div class="line"></div>
                            </div>
                            {{-- sử lý form --}}
                            <form method="POST" action="{{ route('user.post_regiser') }}">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="exampleName" class="form-label">Name</label>
                                        <input type="text" class="form-control rounded-0" name="username"
                                            id="exampleName" value="{{old('username')}}">
                                        @error('username')
                                            <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                    @csrf
                                    <div class="col-12">
                                        <label for="exampleMobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control rounded-0" name="tel"
                                            id="exampleMobile" value="{{old('tel')}}">
                                             @error('tel')
                                            <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleEmail" class="form-label">Email</label>
                                        <input type="text" class="form-control rounded-0" name="email"
                                            id="exampleEmail" value="{{old('email')}}">
                                             @error('email')
                                            <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-12">
                                        <label for="exampleEmail" class="form-label">address</label>
                                        <input type="text" class="form-control rounded-0" name="address"
                                            id="exampleEmail" value="{{old('address')}}">
                                             @error('address')
                                            <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div> --}}
                                    <div class="col-12">
                                        <label for="examplePassword" class="form-label">Password</label>
                                        <input type="text" class="form-control rounded-0" name="password"
                                            id="examplePassword" value="{{old('password')}}">
                                             @error('password')
                                            <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree to Terms and Conditions
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="my-0">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-dark rounded-0 btn-ecomm w-100">Sign
                                            Up</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="mb-0 rounded-0 w-100">Already have an account? <a href="{{route('user.login')}}"
                                                class="text-danger">Sign In</a></p>
                                    </div>
                                </div><!---end row-->
                            </form>

                        </div>
                    </div>
                </div>
            </div><!--end row-->

        </div>
    </section>
@endsection
