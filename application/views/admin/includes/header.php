<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gold Cross Security & Investigation Agency</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/iCheck/square/blue.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/admin_style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/select2/css/select2.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/select2/css/select2-bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

  <style type="text/css">
    .col-centered{
      float: none;
      margin: 0 auto;
    }
    .top-buffer { margin-top:20px; }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php date_default_timezone_set("Asia/Manila"); ?>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/profile_pictures/').$acc_info->image?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$acc_info->firstname." ".$acc_info->lastname?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets/profile_pictures/').$acc_info->image?>" class="img-circle" alt="User Image">

                <p>
                  <?=$acc_info->firstname." ".$acc_info->lastname?>
                  <!-- Alexander Pierce - Web Developer -->
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url('admin/admin_profile')?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('admin/signout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
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
          <img src="<?=base_url('assets/profile_pictures/').$acc_info->image?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$acc_info->firstname." ".$acc_info->lastname?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?=$page_name === 'dashboard' ? 'active':''?>">
          <a href="<?=base_url('admin/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        
        
        
        
        <li class="<?= $page_name === 'account_admin' || $page_name === 'account_employees' || $page_name === 'account_client'|| $page_name === 'account_applicant' || $page_name === 'with_exp' || $page_name === 'without_exp' || $page_name === 'add_account' || $page_name === 'account_pinformation' || $page_name === 'account_detachment' ? 'active treeview menu-open' : 'treeview'  ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>User Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $page_name  === 'with_exp' || $page_name  === 'without_exp' ? 'active treeview menu-open':'treeview' ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Applicants
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              
              <ul class="treeview-menu">
                <li class="<?= $page_name  === 'with_exp' ? 'active':'' ?>">
                  <a href="<?=base_url('admin/with_exp')?>"><i class="fa fa-circle-o"></i> With Experience</a>
                </li>

                <li class="<?= $page_name  === 'without_exp' ? 'active':'' ?>">
                  <a href="<?=base_url('admin/without_exp')?>"><i class="fa fa-circle-o"></i> Without Experience</a>
                </li>
              </ul>




            </li>

            <li class="<?= $page_name === 'account_admin' ? 'active':''  ?>"><a href="<?=base_url('admin/account_admin')?>"><i class="fa fa-circle-o"></i> Admin</a> </li>
            
            <li class="<?= $page_name  === 'account_pinformation' || $page_name  === 'account_detachment' ? 'active treeview menu-open':'treeview' ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Employees
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= $page_name  === 'account_pinformation' ? 'active':'' ?>">
                  <a href="<?=base_url('admin/account_pinformation')?>"><i class="fa fa-circle-o"></i> Personal Information</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        
        <li class="<?=$page_name === 'jobs' ? 'active':''?>">
          <a href="<?=base_url('admin/jobs')?>">
            <i class="fa fa-fw fa-suitcase"></i> <span>Jobs</span>
          </a>
        </li>

        <li class="<?= $page_name === 'examinee' || $page_name === 'exam_questions' || $page_name === 'add_exam_questions' ? 'active treeview menu-open' : 'treeview'  ?>">
          <a href="#">
            <i class="fa fa-fw fa-pencil-square-o"></i>
            <span>Exams</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $page_name  === 'examinee' ? 'active':'' ?>">
              <a href="<?=base_url('admin/examinee')?>"> <i class="fa fa-circle-o"> </i> Examinees </a> 
            </li>
            <li class="<?= $page_name  === 'exam_questions' || $page_name === 'add_exam_questions' ? 'active':'' ?>">
              <a href="<?=base_url('admin/exam_questions')?>"> <i class="fa fa-circle-o"> </i> Exam Questions </a> 
            </li>
          </ul>
        </li>
           
        <li class="<?=$page_name === 'archives' ? 'active':''?>">
          <a href="<?=base_url('admin/archives')?>">
            <i class="glyphicon glyphicon-inbox"></i> <span> Archives </span>
          </a>
        </li>


        <li class="<?= $page_name === 'floater'  ? 'active treeview menu-open' : 'treeview'  ?>">
          <a href="#">
            <i class="fa fa-fw fa-pencil-square-o"></i>
            <span>Floater</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $page_name  === 'floater' ? 'active':'' ?>">
              <a href="<?=base_url('admin/floater')?>"> <i class="fa fa-circle-o"> </i> View Hired Applicants </a> 
            </li>
          </ul>
        </li>


        

        <?php  
        $var_is_active = ['list_hired','list_clients','list_current_emp','list_applicants'];
        $is_in_array_active = in_array($page_name,$var_is_active) ? 'active treeview menu-open' : 'treeview';
        ?>

        <li class="<?=$is_in_array_active?>">
          <a href="#">
            <i class="glyphicon glyphicon-equalizer"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$page_name === 'list_hired' ? 'active':''?>">
              <a href="<?=base_url('admin/list_hired')?>">
                <i class="fa fa-asterisk"></i> <span>List of Hired Applicants</span>
              </a>
            </li>
          </ul>
        </li>

        <?php  
        $page_name_array = ["text_message"];
        $is_active = in_array($page_name,$page_name_array) ? "active" : "" ;
        ?>
        <li class="<?=$is_active?>">
          <a href="<?=base_url('admin/text_message')?>">
            <i class="fa fa-fw fa-suitcase"></i> <span>Text Message</span>
          </a>
        </li>

        
        
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  

