@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Management <a href="{{route('shipping.export')}}" style="font-size: 1.7rem;">
              <i class="fas fa-file-excel text-success"></i>
           </a> </h1>
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
        <form action="{{route('shipping.store')}}" id="shippingForm" name="shippingForm" method="post">
          @csrf
        <div class="card">
          <div class="card-body">								
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                 <select name="country" id="country" class="form-select">
                  <option value="">Select a Country</option>
                  @if ($countries->isNotEmpty())
                     @foreach ($countries as $country)
                     <option value="{{$country->id}}">{{$country->name}}</option>
                     @endforeach
                     <option value="rest_of_world">Rest of the world</option>
       
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
                <input type="text" value="{{old('amount')}}" name="amount" id="amount" class="form-control @error('amount') is-invalid @endif" placeholder="Amount">
                @error('amount')
                <span class="text-danger">
                  {{$message}}
                </span>
              @enderror
                </div>
              </div>
           
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Create</button>     
              </div>         
              </div>
           
            </div>
          </div>	
        </form>	
        
        <div class="card">
          <div class="card-body">
         								
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped table-bordered">
                  <thead class="bg-dark text-white">
                      <th>S.No.</th>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Action</th>
                  </thead>
           
                    @if($shippingCharges->isNotEmpty())
                       @foreach ($shippingCharges as $index=>$shippingCharge)
                       <tr>
                        <td>{{$index+1}}</td>
                        <td>{{($shippingCharge->country_id == 'rest_of_world') ? 'Rest of the world' : $shippingCharge->name}}</td>
                        <td> ₹{{number_format($shippingCharge->amount,2)}}</td>
                        <td>
    
                          <div class="d-flex">
                        <a href="{{route('shipping.edit',$shippingCharge->id)}}">
                          <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                          </svg>
                        </a>
                        <form action="{{route('shipping.destroy',$shippingCharge->id)}}" method="post">
                          @csrf
                            @method('DELETE')
                            <button type="submit" class="btn w-4 h-1 mr-1 p-0">
                          <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1 text-danger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                          </button>
                      </form>
                      </div>
                      </td>
                        
                       </tr>
                       @endforeach
                    @endif
                   
           
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
    
      </div>
    

     

      
      <!-- /.card -->
    </section>
    <!-- /.content -->
    @endsection







