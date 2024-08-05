@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Management</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{route('shipping.index')}}" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="container-fluid">
        @include('admin.alertMessage')
        <form action="{{route('shipping.update',$shippingCharge->id)}}" id="shippingForm" name="shippingForm" method="post">
          @csrf
          @method('PUT')
        <div class="card">
          <div class="card-body">								
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                 <select name="country" id="country" class="form-select">
                  <option value="">Select a Country</option>
                  @if ($countries->isNotEmpty())
                     @foreach ($countries as $country)
                     <option {{($shippingCharge->country_id == $country->id) ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                     @endforeach
                     <option {{($shippingCharge->country_id == 'rest_of_world') ? 'selected' : ''}} value="rest_of_world">Rest of the world</option>
       
                  @endif
                 </select>
                @error('country')
                  <span class="text-danger">
                    {{$message}}
                  </span>
                @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <input type="text" value="{{$shippingCharge->amount}}" name="amount" id="amount" class="form-control @error('amount') is-invalid @endif" placeholder="Amount">
                @error('amount')
                <span class="text-danger">
                  {{$message}}
                </span>
              @enderror
                </div>
              </div>
           
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Update</button>     
              </div>         
              </div>
           
            </div>
          </div>	
        </form>	
      
        </div>
    
      </div>
    

     

      
      <!-- /.card -->
    </section>
    <!-- /.content -->
    @endsection







