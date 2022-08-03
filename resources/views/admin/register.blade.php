<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel - Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ URL::to('img/icon.png') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page bg-philex">
<div class="login-box">
  <div class="login-logo">
    <a href="/" class="text-white"><b>Admin</b>Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register to start your session</p>
		@include('inc.messages')
      <form action="{{ route('admin.login') }}" method="post">
		  {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary bg-philex btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


              <!-- form start -->
              <form role="form" action="{{ route('user-update.update', $user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
          <div class="col-lg-6">
          <div class="card-body">

      <div class="form-group">
      <label for="image"> Profile Picture</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="image" id="image">
          <label class="custom-file-label" for="image">Choose Image</label>
        </div>
      </div>
    </div>

            <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if(old('name')){{ old('name') }} @else{{ $user->name }} @endif">
            </div>
            
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" disabled="disabled" name="email" placeholder="Email" value="@if(old('email')){{ old('email') }} @else{{ $user->email }} @endif">
            </div>
            
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="@if(old('phone')){{ old('phone') }} @else{{ $user->phone }} @endif">
    </div>

    <div class="form-group mt-2">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
  
  $(document).ready(function () {
    bsCustomFileInput.init();
  });

</script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


</body>
</html>

