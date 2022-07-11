<!DOCTYPE html>



<html>



  <head>



    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <title>AdminLTE 2 | Log in</title>



    <!-- Tell the browser to be responsive to screen width -->



    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



    <!-- Bootstrap 3.3.5 -->



    <link rel="stylesheet" href="<?php echo e(url('admin_assets/bootstrap/css/bootstrap.min.css')); ?>">



    <!-- Font Awesome -->



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



    <!-- Ionicons -->



    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



    <!-- Theme style -->



    <link rel="stylesheet" href="<?php echo e(url('admin_assets/dist/css/AdminLTE.min.css')); ?>">



    <!-- iCheck -->



    <link rel="stylesheet" href="<?php echo e(url('admin_assets/plugins/iCheck/square/blue.css')); ?>">







    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->



    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->



    <!--[if lt IE 9]>



        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>



        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



    <![endif]-->



  </head>



  <body class="hold-transition login-page">



    <div class="login-box">



      <div class="login-logo">



        <div class="page-icon animated bounceInDown">



             <i class="glyphicon glyphicon-user"></i>



        </div>



        <a href=""><b>Quản trị hệ thống</b></a>



      </div><!-- /.login-logo -->



      <div class="login-box-body">



        <form action="<?php echo route('backend.auth.postLogin'); ?>" name="frmLogin" method="post">



          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />



          <div class="form-group has-feedback <?php if($errors->first('username')!=''): ?> has-error <?php endif; ?>">



            <input type="text" name="username" class="form-control" placeholder="Tài khoản"/>



            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>



            <?php if($errors->first('username')!=''): ?>



            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $errors->first('username');; ?></label>



            <?php endif; ?>



          </div>



          <div class="form-group has-feedback <?php if($errors->first('password')!=''): ?> has-error <?php endif; ?>">



            <input type="password" name="password" class="form-control" placeholder="Mật khẩu"/>



            <span class="glyphicon glyphicon-lock form-control-feedback"></span>



            <?php if($errors->first('password')!=''): ?>



            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $errors->first('password');; ?></label>



            <?php endif; ?>



            <?php if(Session::has('flash_error')): ?>



            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo e(Session::get('flash_error')); ?></label>



            <?php endif; ?>



          </div>



          <div class="row">



            <div class="col-xs-6">



              <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>



            </div><!-- /.col -->



            <div class="col-xs-6">



              <div class="checkbox icheck">



                <label>



                  <input type="checkbox"> Ghi nhớ



                </label>



              </div>



            </div><!-- /.col -->



            



          </div>



        </form>



        <a href="<?php echo e(url('quen-mat-khau')); ?>">Quên mật khẩu</a><br/>



        <a href="register" class="text-center">Tạo tài khoản mới</a>







      </div><!-- /.login-box-body -->



    </div><!-- /.login-box -->







    <!-- jQuery 2.1.4 -->



    <script src="<?php echo e(url('admin_assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>



    <!-- Bootstrap 3.3.5 -->



    <script src="<?php echo e(url('admin_assets/bootstrap/js/bootstrap.min.js')); ?>"></script>



    <!-- iCheck -->



    <script src="<?php echo e(url('admin_assets/plugins/iCheck/icheck.min.js')); ?>"></script>



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



<?php /**PATH /var/www/html/gdigital/resources/views/backend/auth/login.blade.php ENDPATH**/ ?>