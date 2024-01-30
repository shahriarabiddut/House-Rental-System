<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset($SiteOption[1]->value) }}" />
    <meta name="author" content="">

    <title> Admin Login | @isset($SiteOption)
        {{ $SiteOption[0]->value }}
    @endisset </title>
    <!-- Custom fonts for this template-->
    <link href="{{  asset('vendor/fontawesome-free/css/all.min.css')  }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>

    <section class="pt-5 pb-5 mt-0 align-items-center d-flex " style="background-color: white" >
        <div class="container-fluid">

        <style>
          .card-title{
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: black;
          }
          .rounded,input{
            border-radius: 100px !important;
          }
          .rounded{
            background-color:#28a745 !important;
            transition: all .3s ease;
          }
          .rounded:hover{
            background-color:white !important;
            color: black;
            border: 1px solid black;
          }

          .padding{
            padding: 30px;
          }
        </style>
            
          <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
            <div class="col-12 col-md-4 col-lg-5 h-50 ">
              <div class="card shadow">
                <div class="card-body padding mx-2">
                @error('email')
                  <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
                  @enderror
                  @error('password')
                  <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
                  @enderror
                 
                  <h4 class="card-title mt-1 text-center">Admin Login</h4>
                  <form method="POST" action="{{ route('admin.adminlogin') }}">
                    @csrf
                    <div class="form-group input-group">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                      </div>  -->
                      <input required name="email" class="form-control rounded-full" placeholder="Enter Email address" type="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group input-group">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div> -->
                      <input  required name="password" class="form-control rounded-full" placeholder="Enter password" type="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary rounded btn-block w-50 mx-auto"> Login </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    @yield('scripts')


</body>

</html>
