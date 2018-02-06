<?php 
  ob_start();

            Session::init();

          
            if(Session::id() != ''){

                $str = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];  

                $user_agent = Hash::create('md5',$str,HASH_GENERAL_KEY); 

                

                  if( (string)$user_agent != (string) Session::get('user_code')){
                      
                      Session::destroy();
              
                      header('location:'.URL.'login');
                  }

                   if( Session::get('user_online') != '' && Session::get('user_online') == 1) {
                        $online = true;
                   }
                  else{
                        $online = false;
                  } 

                  if((int)Session::get('user_lock') == 0 ){
                      header('location:'.URL.'lockscreen');
                  }
              }
            else{
                Session::destroy();
              
                header('location:'.URL.'login');
            }


//echo Session::get('user_online');


?>
<!doctype html>
<html>
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->  
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  


<title>Anesthesia Center </title>

<!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<?php
	if(isset($this->css)){
		foreach($this->css as $css){
			echo '<link rel="stylesheet" type="text/css" href="'.URL.'publics/'.$css.'" />';
			//echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"><///script>';
		}
	}
	
?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo URL;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>I</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Siriraj anest </b>center</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo URL.'publics/images/staff/'.Session::get('user_pic');?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                  <?php echo Session::get('user_name');?>

              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo URL.'publics/images/staff/'.Session::get('user_pic');?>" class="img-circle" alt="User Image">

                <p>
                  
              <?php echo Session::get('user_name');?>
                  <small>Member since <?php echo Session::get('user_since');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="<?php echo URL;?>" class="btn btn-default btn-flat">Profile</a>
                  <a href="<?php echo URL;?>lockscreen" class="btn btn-default btn-flat">Lockscreen</a>
                </div>
                <div class="pull-right">


                  <?php 
                        
                        
                        if( $online == true)
                          
                   ?> 

                  <a href="<?php echo URL."login/signout";?>" class="btn btn-default btn-flat">Signout</a>
                  
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo URL.'publics/images/staff/'.Session::get('user_pic');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('user_name');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> 
                <?php 
                        $onlines = (int)Session::get('user_online');

                          if($onlines == 1 )
                            echo "Online";
                          else
                            echo "Offline";
                ?>
          </a>
        </div>
      </div>
      <!-- search form -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo URL;?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>รายงาน</span>
            
            <span class="pull-right-container">
              <!-- <span class="label label-primary pull-right">3</span>-->
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL;?>report"><i class="fa fa-circle-o"></i>ทะเบียนครุภัณฑ์</a></li>
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>รายงานการส่งซ่อม</a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i>แบ่งตามปี</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i>แบ่งตามกลุ่ม</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i>แบ่งตามสถานที่</a></li>
              </ul>
            </li>
           <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>รายงานการส่งคืนพัสดุ</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ทะเบียนข้อมูล</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL;?>equipment"><i class="fa fa-circle-o"></i>ครุภัณฑ์</a></li>
            <li><a href="<?php echo URL;?>staff"><i class="fa fa-circle-o"></i> บุคลากร</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>บริการ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo URL;?>staff"><i class="fa fa-circle-o"></i>ส่งซ่อมครุภัณฑ์</a>
              <ul class="treeview-menu">
                <li><a href="<?php echo URL;?>repair"><i class="fa fa-circle-o"></i> แจ้งซ่อม</a></li>
                <li><a href="<?php echo URL;?>repair/approve"><i class="fa fa-circle-o"></i> อนุมัติซ่อม</a></li>
                <li><a href="<?php echo URL;?>repair/back"><i class="fa fa-circle-o"></i> ตรวจรับกลับ</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i>บริการยืม-คืนครุภัณฑ์</a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>ยืมครุภัณฑ์</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>คืนครุภัณฑ์</a></li>
              </ul>
            </li>
            <li><a href="<?php echo URL;?>change"><i class="fa fa-circle-o"></i>เปลี่ยนแปลงสถานที่ครุภัณฑ์</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>บำรุงรักษาและสอบเทียบ</a></li>
            <li><a href="<?php echo URL;?>parcel"><i class="fa fa-circle-o"></i>ส่งคืนพัสดุ</a></li>
           
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>ตั้งค่าข้อมูล</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo URL;?>group"><i class="fa fa-circle-o"></i>กลุ่มเครื่องมือแพทย์</a></li>
            <li><a href="<?php echo URL;?>status"><i class="fa fa-circle-o"></i>สถานะเครื่องมือแพทย์</a></li>
            <li><a href="<?php echo URL;?>type"><i class="fa fa-circle-o"></i>ประเภทครุภัณฑ์</a></li>
            <li><a href="<?php echo URL;?>department"><i class="fa fa-circle-o"></i>ภาควิชาหรือหน่วยงาน</a></li>
            <li><a href="<?php echo URL;?>building"><i class="fa fa-circle-o"></i>อาคาร ตึก</a></li>
            <li><a href="<?php echo URL;?>floor"><i class="fa fa-circle-o"></i>ชั้น</a></li>
            <li><a href="<?php echo URL;?>room"><i class="fa fa-circle-o"></i>ห้อง</a></li>
            <li><a href="<?php echo URL;?>problem"><i class="fa fa-circle-o"></i>ปัญหา</a></li>
            
           
          </ul>
        </li>
        
       
       
       
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

