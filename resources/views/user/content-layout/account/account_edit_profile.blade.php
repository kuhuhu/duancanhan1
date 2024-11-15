@extends('user.main')
@section('account_edit_profile')
    <div class="page-content">


   <!--start breadcrumb-->
   <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Account</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>
   </div>
   <!--end breadcrumb-->


   <!--start product details-->
   <section class="section-padding">
    <div class="container">
      <div class="d-flex align-items-center px-3 py-2 border mb-4">
        <div class="text-start">
          <h4 class="mb-0 h4 fw-bold">Account - Edit Profile</h4>
       </div>
      </div>
      <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-person me-2"></i>Account</span></div>
       <div class="row">


           @include('user.content-layout.account.account-layout.menu_left')

          
          <div class="col-12 col-xl-7">
            <div class="card rounded-0">
              <div class="card-body p-lg-5">
                  <h5 class="mb-0 fw-bold">Edit Details</h5>
                  <hr>
                   <form>
                     <div class="row row-cols-1 g-3">
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control rounded-0" id="floatingInputName" placeholder="Name" value="jhon Deo">
                            <label for="floatingInputName">Name</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control rounded-0" id="floatingInputNumber" placeholder="Name" value="+99-85XXXXXXXX">
                            <label for="floatingInputNumber">Mobile Number</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control rounded-0" id="floatingInputEmail" placeholder="Email" value="name@example.com">
                            <label for="floatingInputEmail">Email</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="date" class="form-control rounded-0" id="floatingInputDOB" value="">
                            <label for="floatingInputDOB">Date of Birth</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating">
                            <input type="text" class="form-control rounded-0" id="floatingInputLocation" placeholder="Location" value="United Kingdom">
                            <label for="floatingInputLocation">Location</label>
                          </div>
                        </div>
                        <div class="col">
                          <button type="button" class="btn btn-dark py-3 btn-ecomm w-100">Save Details</button>
                        </div>
                        <div class="col">
                          <button type="button" class="btn btn-outline-dark py-3 btn-ecomm w-100" data-bs-toggle="modal" data-bs-target="#ChangePasswordModal">Change Password</button>
                        </div>
                        

                     </div>
                   </form>
              </div>
            </div>
          </div>
       </div><!--end row-->
    </div>
  </section>
   <!--start product details-->


   <!-- Change Password Modal -->
    <div class="modal" id="ChangePasswordModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-0">
          <div class="modal-body">
            <h5 class="fw-bold mb-3">Change Password</h5>
            <hr>
              <form>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-0" id="floatingInputOldPass" placeholder="Old Password">
                  <label for="floatingInputOldPass">Old Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-0" id="floatingInputNewPass" placeholder="New Password">
                  <label for="floatingInputNewPass">New Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-0" id="floatingInputConPass" placeholder="Confirm Password">
                  <label for="floatingInputConPass">Confirm Password</label>
                </div>
                <div class="d-grid gap-3 w-100">
                  <button type="button" class="btn btn-dark py-3 btn-ecomm">Change</button>
                  <button type="button" class="btn btn-outline-dark py-3 btn-ecomm" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end Change Password Modal -->


 </div>
@endsection