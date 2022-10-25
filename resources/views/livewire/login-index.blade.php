 <div class="col-lg-9 col-xl-8">
     <div class="card-group mb-0">
         <div class="card p-4">
             <div class="card-body">
                 <div class="text-center title-style mb-6">
                     <h1 class="mb-2">Login</h1>
                     <hr>
                     <p class="text-muted">Sign In to your account</p>
                     @if($errorMessage)
                     <div class="alert alert-light-secondary" role="alert">
                         {{ $errorMessage }}
                     </div>
@endif
                 </div>


                 <div class="input-group mb-4">
                     <div class="input-group-prepend">
                         <div class="input-group-text">
                             <i class="fe fe-user"></i>
                         </div>
                     </div>
                     <input wire:model.defer="userName" type="text"
                         class="form-control @error('userName') is-invalid @enderror" placeholder="Phone Number">

                 </div>
                 @error('userName')
                     <p class=" text-danger"> {{ $message }}</p>
                 @enderror
                 <div class="input-group mb-4">
                     <div class="input-group-prepend">
                         <div class="input-group-text">
                             <i class="fe fe-lock"></i>
                         </div>
                     </div>
                     <input type="password" class="form-control @error('password') is-invalid @enderror"
                         wire:model.defer="password" placeholder="Password">
                 </div>
                 @error('password')
                     <p class=" text-danger"> {{ $message }}</p>
                 @enderror
                  
                 <div class=" row">
                     <div class="col-12">
                         <button type="button" wire:loading.class="btn-loading" wire:click="LoginRequest()"
                             class="btn  btn-primary btn-block px-4">
                             <span wire:loading.remove>
                                 Login
                             </span>

                         </button>
                     </div>
                     <div class="col-12 text-center">
                         <a href="forgot-password-3.html" class="btn btn-link box-shadow-0 px-0"> </a>
                     </div>
                 </div>

             </div>
         </div>
         <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
             <div class="text-center justify-content-center page-single-content">
                 <div class="box">
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                 </div>
                 <img src="back/assets/images/brand/logo1.png" style="width:60rem; " alt="img">
             </div>
         </div>
     </div>
 </div>
