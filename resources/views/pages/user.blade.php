<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_asset_web/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin_asset_web/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a ><b>Account Information</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      <form action="{{   route('user.edit1',['id'=>Auth::user()->id])   }}" method="post">


		@if(count($errors)>0)
				  		<div class="alert alert-danger">
				  			@foreach($errors->all() as $err)
                             {{$err}}<br>

				  			@endforeach
                             </div>
                            @endif


                            @if(session('messenger'))
                            <div class="alert alert-success">
                            {{session('messenger')}}
                        </div>
                            @endif


      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="input-group mb-3">
          <input type="text" name="Name" value="{{ Auth::user()->name}}" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="Email" value="{{ Auth::user()->email}}" class="form-control" placeholder="Email" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <input type="checkbox" id="changePassword" name="changePassword">
        <label>change Password</label>
        <div class="input-group mb-3">
          <input type="password" name="Password" class="form-control password" placeholder="Password" disabled="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="passwordAgain"  class="form-control password" placeholder="Retype password" disabled="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-9">
            <div class="icheck-primary">


              <a href="homepage"><b>back</a>

            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Edit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="admin_asset_web/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin_asset_web/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset_web/dist/js/adminlte.min.js"></script>
</body>
</html>


 <script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
                 if($(this).is(":checked"))
                 {

                   $(".password").removeAttr('disabled');
                 }
                 else
                 {
                    $(".password").attr('disabled','');

                 }


        });
    });


 </script>
