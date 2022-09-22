
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Foodpipra Seller Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets')}}/back-template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets')}}/back-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets')}}/back-template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="card card-outline card-success" style="width: 450px">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Seller  </b>Dashboard</a>
      </div>
      <div class="card-body" >
        <form action="{{ route('seller.create') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="input-group mb-3">
            <input name="name" type="text" class="form-control" placeholder="Enter name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="phone" type="text" class="form-control" placeholder="Enter phone number">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="shop_name" type="text" class="form-control" placeholder="Enter shop name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-briefcase"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="shop_logo" type="file" class="form-control" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-briefcase"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="business_type" type="text" class="form-control" placeholder="Enter business type">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-store"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="address" type="text" class="form-control" placeholder="Enter business address">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Enter email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Enter Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Sign Up</button>
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