
<?php 
    Session::init();

   if (Session::get('user_name') == '' ){
      Session::destroy();
      header('location:'.URL.'login');
      exit();
   }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anest siriraj | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/css/bootstrap/bootstrap.min.css" />  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/css/dist/AdminLTE.min.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b>Anest Siriraj</b>ASC</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo Session::get('user_name')?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      
      <img src="<?php echo URL.'publics/images/staff/'.Session::get('user_pic');?>" class="user-image" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials"  action="<?php echo URL;?>lockscreen/unlock" method="POST">
      <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <button type="submit" name="unlock" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="<?php echo URL;?>login/signout">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2016 <b><a href="http://almsaeedstudio.com" class="text-black">Almsaeed Studio</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="<?php echo URL;?>publics/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo URL;?>publics/js/bootstrap/bootstrap.min.js"></script>

<script>
  $(function () {
    

    $('#password').focus();
  });
</script>
</body>
</html>
