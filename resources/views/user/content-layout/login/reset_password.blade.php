@extends('user.main')
@section('reset_password')
    <section class="py-5">
    <div class="container">
      
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
             <div class="card rounded-0">
               <div class="card-body p-4">
                 <h4 class="mb-4 fw-bold text-center">Reset Password</h4>
                 {{-- sử lý form --}}
                 <form method="POST" action="{{route('user.post_reset_password')}}">
                  @csrf
                    <div class="row g-4">
                      <div class="col-12">
                          <label for="exampleNewPassword" class="form-label">New Password</label>
                          <input type="text" class="form-control rounded-0" id="exampleNewPassword" name="newpassword">
                          @error('newpassword')
                              <span style="color: red">{{$mesage}}</span>
                          @enderror
                      </div>
                      <div class="col-12">
                        <label for="examplePassword" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control rounded-0" id="examplePassword" name="confirmpassword">
                        @error('confirmpassword')
                              <span style="color: red">{{$mesage}}</span>
                          @enderror
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-dark rounded-0 btn-ecomm w-100">Change Password</button>
                      </div>
                      <div class="col-12 text-center">
                        <a href="{{route('user.login')}}"><p class="mb-0 rounded-0 w-100 btn  btn-ecomm border border-dark"><i class="bi bi-arrow-left me-2"></i>Return to Login</p></a>
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