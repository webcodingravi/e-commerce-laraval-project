@extends('front.layouts.app')

@section('content')

<section class="section-5 pt-3 pb-3 mb-3 bg-white">
  <div class="container">
      <div class="light-font">
          <ol class="breadcrumb primary-color mb-0">
              <li class="breadcrumb-item"><a class="white-text" href="{{route('front.home')}}">Home</a></li>
              <li class="breadcrumb-item">{{$page->name}}</li>
          </ol>
      </div>
  </div>
</section>

@if ($page->slug == 'contact-us')
<section class=" section-10">
  <div class="container">
      <div class="section-title mt-5 ">
          <h2>{{$page->name}}</h2>
      </div>   
  </div>
</section>

<section>
  <div class="container">          
      <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-box">
            {{Session::get('success')}}


            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            @elseif(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-box">

            {{Session::get('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            @endif
        </div>
          <div class="col-md-6 mt-3 pe-lg-5">
            {!!$page->content!!}
                 
          </div>

          <div class="col-md-6">
              <form action="" method="post" id="contactForm" name="contactForm">
                @csrf
                  <div class="mb-3">
                      <label class="mb-2" for="name">Name</label>
                      <input class="form-control" id="name" type="text" name="name" data-error="Please enter your name">
                      <p class="help-block with-errors"></p>
                  </div>
                  
                  <div class="mb-3">
                      <label class="mb-2" for="email">Email</label>
                      <input class="form-control" id="email" type="text" name="email" data-error="Please enter your Email">
                      <p class="help-block with-errors"></p>
                  </div>
                  
                  <div class="mb-3">
                      <label class="mb-2">Subject</label>
                      <input class="form-control" id="subject" type="text" name="subject" data-error="Please enter your message subject">
                      <p class="help-block with-errors"></p>
                  </div>
                  
                  <div class="mb-3">
                      <label for="message" class="mb-2">Message</label>
                      <textarea class="form-control" rows="3" id="message" name="message" data-error="Write your message"></textarea>
                      <p class="help-block with-errors"></p>
                  </div>
                
                  <div class="form-submit">
                      <button class="btn btn-dark" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div>
                      <div class="clearfix"></div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</section>
@else

<section class=" section-10">
  <div class="container">
      <h1 class="my-3">{{$page->name}}</h1>
      {!!$page->content!!}

  </div>
</section>

@endif

@endsection

@section('customJS')
<script>
    $("#contactForm").submit(function(event) {
      event.preventDefault();

      $("#form-submit").prop('disabled', true);
      $.ajax({
         url: '{{route("front.sendContactEmail")}}',
         type: 'post',
         data: $(this).serializeArray(),
         dataType: 'json',
         success:function(response) {
            $("#form-submit").prop('disabled', false);

           if(response.status == true) {
            $("#name").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html('')
            $("#email").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html('')
            $("#subject").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html('')

               window.location.href='{{route("front.page",$page->slug)}}';


           }else{
            if(response.errors['name']) {
                $("#name").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html(response.errors['name'])

            }else{
                $("#name").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html('')

            }

            if(response.errors['email']) {
                $("#email").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html(response.errors['email'])

            }else{
                $("#email").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html('')

            }

            if(response.errors['subject']) {
                $("#subject").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html(response.errors['subject'])

            }else{
                $("#subject").addClass("is-invalid").siblings("p").addClass("invalid-feedback").html('')

            }
           }
         }
      });
    })
</script>
    
@endsection



           