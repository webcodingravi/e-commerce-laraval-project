@extends('front.layouts.app')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
  <div class="container">
      <div class="light-font">
          <ol class="breadcrumb primary-color mb-0">
              <li class="breadcrumb-item"><a class="white-text" href="{{route('front.home')}}">Home</a></li>
              <li class="breadcrumb-item">Reset Password</li>
          </ol>
      </div>
  </div>
</section>

<section class=" section-10">
  <div class="container">
    @if (Session::has('success'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    </div> 
    @endif


    @if (Session::has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('error')}}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    </div> 
    @endif

      <div class="login-form">    
          <form action="{{route('front.processResetPassword')}}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
              <h4 class="modal-title">Reset Password</h4>
              <div class="form-group">
                  <input type="password"  name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
                  @error('new_password')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                  @enderror
               
              </div>


              <div class="form-group">
                <input type="password"  name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password">
                @error('confirm_password')
                    <span class="text-danger">
                      {{$message}}
                    </span>
                @enderror
             
            </div>
          
           
              <input type="submit" class="btn btn-dark btn-block btn-lg" value="Submit">              
          </form>			
          <div class="text-center small"><a href="{{route('account.login')}}">Click Here to Login</a></div>
      </div>
  </div>
</section>
  
@endsection