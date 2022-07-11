<!DOCTYPE html>


<html>


  <head>


    <meta charset="utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>AdminLTE 2 | Log in</title>


    <!-- Tell the browser to be responsive to screen width -->


    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <!-- Bootstrap 3.3.5 -->


    <link rel="stylesheet" href="{{ url('admin_assets/bootstrap/css/bootstrap.min.css') }}">


    <!-- Font Awesome -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <!-- Ionicons -->


    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <!-- Theme style -->


    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/AdminLTE.min.css') }}">


    <!-- iCheck -->


    <link rel="stylesheet" href="{{ url('admin_assets/plugins/iCheck/square/blue.css') }}">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


    <!--[if lt IE 9]>


        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>


        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->


  </head>


  <body class="hold-transition register-page">


    <div class="register-box">


      <div class="register-logo">


        <a href=""><b>Administrator</b></a>


      </div>





      <div class="register-box-body">


        <p class="login-box-msg">Đăng ký tài khoản</p>


        <form action="{!! route('postRegister') !!}" name="frmRegister" method="post">


        	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />


			<div class="form-group has-feedback @if ($errors->first('username')!='') has-error @endif">


				<input type="text" class="form-control" name="username" placeholder="Username">


				<span class="glyphicon glyphicon-user form-control-feedback"></span>


				@if ($errors->first('username')!='')


	            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('username'); !!}</label>


	            @endif


			</div>


			<div class="form-group has-feedback @if ($errors->first('name')!='') has-error @endif">


				<input type="text" class="form-control" name="name" placeholder="Name">


				<span class="glyphicon glyphicon-user form-control-feedback"></span>


				@if ($errors->first('name')!='')


	            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('name'); !!}</label>


	            @endif


			</div>


          	<div class="form-group has-feedback @if ($errors->first('email')!='') has-error @endif">


	            <input type="email" class="form-control" name="email" placeholder="Email">


	            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>


	            @if ($errors->first('email')!='')


	            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('email'); !!}</label>


	            @endif


          	</div>


          	<div class="form-group has-feedback @if ($errors->first('password')!='') has-error @endif">


	            <input type="password" class="form-control" name="password" placeholder="Password">


	            <span class="glyphicon glyphicon-lock form-control-feedback"></span>


	            @if ($errors->first('password')!='')


	            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('password'); !!}</label>


	            @endif


          	</div>


          	<div class="form-group has-feedback @if ($errors->first('repassword')!='') has-error @endif">


            	<input type="password" class="form-control" name="repassword" placeholder="Retype password">


            	<span class="glyphicon glyphicon-log-in form-control-feedback"></span>


            	@if ($errors->first('repassword')!='')


	            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('repassword'); !!}</label>


	            @endif


          	</div>


          	<div class="row">


	            <div class="col-xs-8">


	              	<div class="checkbox icheck">	


	              		<a href="login" class="text-center">I already have a membership</a>


		                <!--<label>


		                  <input type="checkbox"> I agree to the <a href="#">terms</a>


		                </label>-->


	              	</div>


	            </div><!-- /.col -->


	            <div class="col-xs-4">


	              	<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>


	            </div><!-- /.col -->


          	</div>


        </form>





        <!--<div class="social-auth-links text-center">


          <p>- OR -</p>


          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>


          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>


        </div>-->





        <!--<a href="login" class="text-center">Tôi đã có tài khoản</a>-->


      </div><!-- /.form-box -->


    </div><!-- /.register-box -->





    <!-- jQuery 2.1.4 -->


    <script src="{{ url('admin_assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>


    <!-- Bootstrap 3.3.5 -->


    <script src="{{ url('admin_assets/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- iCheck -->


    <script src="{{ url('admin_assets/plugins/iCheck/icheck.min.js') }}"></script>


    <script>


      $(function () {


        $('input').iCheck({


          checkboxClass: 'icheckbox_square-blue',


          radioClass: 'iradio_square-blue',


          increaseArea: '20%' // optional


        });


      });


    </script>


  </body>


</html>


