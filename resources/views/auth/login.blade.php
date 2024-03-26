<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Favicon -->
     {{-- <link href="img/favicon.ico" rel="icon"> --}}

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 
 
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
 
     <!-- Libraries Stylesheet -->
     <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
     <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
 
     <!-- Customized Bootstrap Stylesheet -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
 
     <!-- Template Stylesheet -->
     <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body style="background-color: #ffe6c0">
<div class="container-fluid position-relative">
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
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" >
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
              <form action="{{route('loginpost')}}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px;">
                @csrf
                <div class=" rounded p-4 p-sm-5 my-4 mx-3" style="background-color: #1E1916">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i></h3>
                        </a>
                        <h3 class="text-primary">Sign In</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                    <p class="text-center mb-0" style="color: #a2a2a2">Don't have an Account? <a href="{{ route('register')}}">Sign Up</a></p>
                </div>
              </form>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>