<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web; ?></title>
  <!--  -->
  <link id='favicon' rel="shortcut icon" href="<?php echo base_url('assets_style/assets/images/logo_pln.png'); ?>" type="image/x-png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_style/assets/css/login.css'); ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="" />
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/responsivelogin.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- <style>
    .{
      flex-wrap: wrap;
    }
  </style> -->
 
  <!-- <style type="text/css">
    .navbar-inverse {
      background-color: #333;
    }

    .navbar-color {
      color: #fff;
    }

    blink,
    .blink {
      animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }

    .login-logo {
      background-color: #fff;
      min-height: auto;
      display: flex;
      flex-wrap: wrap;
      border: 2px solid #226bbf;
      border-radius: 5px;
    }

    .login-logo img {
      width: 80px;
      height: 100px;
    }

    .login-logo a {
      align-items: center;
      padding-left: 10px;
    }
  </style> -->
</head>

<body >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <!-- judul aplikasi -->
            <div class="panel-heading" style="position: relative; flex-wrap: wrap;">
              <div style="position: relative; flex-wrap: wrap; margin-top: 5px; margin-bottom: 10px;">
                <img src="<?php echo base_url('assets_style/assets/images/logo_pln.png'); ?>" alt="logo" class="logo" width="90px">
              </div>
              <div style="position: relative; flex-wrap: wrap; margin:auto; justify-content: center; align-items:center; display:flex; margin-top: -90px; font-size: 130%;height:80px;">
                A P L I K A S I &nbsp; P E  R P U S T A K A A N &nbsp;
                <br> P L N &nbsp;  U P T K S K T
              </div>
              <div style="margin-left: 150px; font-size: 200%;">
                <!-- <strong>FORM LOGIN</strong> -->
              </div>
            </div>

            <!-- end judul aplikasi -->

            <!-- isi -->
            <div class="panel-body">
              <div class="col-md-12">
                <form action="<?= base_url('login/auth'); ?>" method="POST">
                  <div class="form-group has-feedback">
                    <br>
                    <label>USERNAME</label>
                    <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off">
                    <span class="glyphicon glyphicon-user form-control-feedback" style="padding-top: 20px;"></span>
                  </div>

                  <div class="form-group has-feedback">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <br>
                  <!-- <div class="links">
                    <a href="#"> Forgot Password</a>
                    <a href="register.php">Signup</a>
                  </div> -->
                  <br>
                  <button type="submit" id="loding" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  <div id="loadingcuy"></div>
                  <!-- <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary btn-block btn-lg" value="LOGIN">
                  </div> -->
                </form>
              </div>
            </div>
            <!-- end isi -->

            <!-- footer -->
            <div class="panel-footer">

              <strong>&copy;2022- PLN KSKT (<a href="https://www.youtube.com/channel/UCS0McpxsS8d0XC2AmJNQdpQ?view_as=subscriber/">SYAHRILRMN_</a>)

            </div>
            <!-- end footer -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


</html>