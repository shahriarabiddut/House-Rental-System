<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset($SiteOption[1]->value) }}" />
    <meta name="author" content="">

    <title> Verify Your EMail  | @isset($SiteOption)
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

    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="min-height: 100vh; background-size: cover; background-image: url('{{ asset($SiteOption[3]->value) }}')">
        <div class="container-fluid">
            
          <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
            <div class="col-12 col-md-4 col-lg-4 h-50 ">
              <div class="card shadow">
                <div class="card-body mx-2">
                 
                  <h4 class="card-title mt-3 text-center"> Please Verify Your EMail </h4>
                  <p class="bg-secondary text-white p-2 text-justify " style="border-radius: 10px;" > Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                  @if(session('status') == 'verification-link-sent')
                  <div class="p-3 mb-2 bg-success text-white">
                      <p> A new verification link has been sent to the email address you provided during registration. </p>
                  </div>
                  @endif
                  @error('email')
                  <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
                  @enderror
                  <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block"> Resend Verification Email </button>
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
