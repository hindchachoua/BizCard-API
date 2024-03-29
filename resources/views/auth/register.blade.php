@extends('layout.layout')
@section('content')
    
<div class="container-fluid">
    {{-- <div class="mt-5">
      @if($errors->any())
      <div class="col-12">
          @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                  {{ $error }}
              </div>
          @endforeach
      </div>
      @endif
  
      @if(session()->has('error'))
      <div class="alert alert-danger" role="alert">
          {{ session('error') }}
      </div>
      @endif
      
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
      @endif
    </div> --}}
    <div class="row h-100 align-items-center justify-content-center" >
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" >
          <form action="{{ route('registerpost') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class=" rounded p-4 p-sm-5 my-4 mx-3" style="background-color: #1E1916">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="" class="">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i></h3>
                    </a>
                    <h3 class="text-primary">Sign Up</h3>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameText" placeholder="jhondoe" name="name">
                    <label for="name">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
                    <label for="password">Password Confirmation</label>
                </div>
                
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                <p class="text-center mb-0" style="color: #a2a2a2">Already have an Account? <a href="{{ route('login')}}">Sign In</a></p>
                
            </div>
          </form>
        </div>
    </div>
  </div>
@endsection