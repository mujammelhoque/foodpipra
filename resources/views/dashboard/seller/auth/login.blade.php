
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Foodpipra Seller Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets')}}/back-template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets')}}/back-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets')}}/back-template/dist/css/adminlte.min.css">
  <style>
  html,body{
    width: 100%;
    height: 100%;
    margin: 0; /* Space from this element (entire page) and others*/
    padding: 0; /*space from content and border*/
    border: solid rgba(27, 130, 8, 0.909);
    border-top-width: 20px;
    border-bottom-width: 30px;
    border-left-width:8px;
    border-right-width:8px;
    overflow:hidden;
    display:block;
    box-sizing: border-box;
}
</style>
</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Seller  </b>Dashboard</a>
      </div>
      <div class="card-body">
        <form action="{{ route('seller.check') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          {{-- <div class="input-group mb-3">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div> --}}

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
       
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
    
<!-- jQuery -->
<script src="{{ asset('assets')}}/back-template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets')}}/back-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets')}}/back-template/plugins/dist/js/adminlte.min.js"></script>
</body>
</html>