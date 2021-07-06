<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gold Cross Security & Investigation Agency Client</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php date_default_timezone_set("Asia/Manila"); ?>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Client</b></span>
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
          <!-- Messages: style can be found in dropdown.less-->
         <!--  <li class="dropdown messages-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="fa fa-fw fa-suitcase"></i>
             <span class="label label-success">4</span>
           </a>
           <ul class="dropdown-menu">
             <li class="header">You have 4 messages</li>
             <li>
               inner menu: contains the actual data
               <ul class="menu">
                 <li>start message
                   <a href="#">
                     <div class="pull-left">
                       <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                     </div>
                     <h4>
                       Support Team
                       <small><i class="fa fa-clock-o"></i> 5 mins</small>
                     </h4>
                     <p>Why not buy a new awesome theme?</p>
                   </a>
                 </li>
                 end message
                 <li>
                   <a href="#">
                     <div class="pull-left">
                       <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                     </div>
                     <h4>
                       AdminLTE Design Team
                       <small><i class="fa fa-clock-o"></i> 2 hours</small>
                     </h4>
                     <p>Why not buy a new awesome theme?</p>
                   </a>
                 </li>
                 <li>
                   <a href="#">
                     <div class="pull-left">
                       <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                     </div>
                     <h4>
                       Developers
                       <small><i class="fa fa-clock-o"></i> Today</small>
                     </h4>
                     <p>Why not buy a new awesome theme?</p>
                   </a>
                 </li>
                 <li>
                   <a href="#">
                     <div class="pull-left">
                       <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                     </div>
                     <h4>
                       Sales Department
                       <small><i class="fa fa-clock-o"></i> Yesterday</small>
                     </h4>
                     <p>Why not buy a new awesome theme?</p>
                   </a>
                 </li>
                 <li>
                   <a href="#">
                     <div class="pull-left">
                       <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                     </div>
                     <h4>
                       Reviewers
                       <small><i class="fa fa-clock-o"></i> 2 days</small>
                     </h4>
                     <p>Why not buy a new awesome theme?</p>
                   </a>
                 </li>
               </ul>
             </li>
             <li class="footer"><a href="#">See All Messages</a></li>
           </ul>
         </li> -->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">2</span>
            </a>
            <ul class="dropdown-menu">
             <li class="header">You have 2 notifications</li>
             <li>
           
               <ul class="menu">
                 <li>
                   <a href="#">
                     <i class="fa fa-users text-aqua"></i> 5 new members joined today
                   </a>
                 </li>
                 
                 </li>
                 <li>
                   <a href="#">
                     <i class="fa fa-users text-red"></i> 5 new members joined
                   </a>
                 </li>
                
                 
               </ul>
             </li>
             <li class="footer"><a href="#">View all</a></li>
           </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
         <!--  <li class="dropdown tasks-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="fa fa-flag-o"></i>
             <span class="label label-danger">9</span>
           </a>
           <ul class="dropdown-menu">
             <li class="header">You have 9 tasks</li>
             <li>
               inner menu: contains the actual data
               <ul class="menu">
                 <li>Task item
                   <a href="#">
                     <h3>
                       Design some buttons
                       <small class="pull-right">20%</small>
                     </h3>
                     <div class="progress xs">
                       <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                         <span class="sr-only">20% Complete</span>
                       </div>
                     </div>
                   </a>
                 </li>
                 end task item
                 <li>Task item
                   <a href="#">
                     <h3>
                       Create a nice theme
                       <small class="pull-right">40%</small>
                     </h3>
                     <div class="progress xs">
                       <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                         <span class="sr-only">40% Complete</span>
                       </div>
                     </div>
                   </a>
                 </li>
                 end task item
                 <li>Task item
                   <a href="#">
                     <h3>
                       Some task I need to do
                       <small class="pull-right">60%</small>
                     </h3>
                     <div class="progress xs">
                       <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                         <span class="sr-only">60% Complete</span>
                       </div>
                     </div>
                   </a>
                 </li>
                 end task item
                 <li>Task item
                   <a href="#">
                     <h3>
                       Make beautiful transitions
                       <small class="pull-right">80%</small>
                     </h3>
                     <div class="progress xs">
                       <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                         <span class="sr-only">80% Complete</span>
                       </div>
                     </div>
                   </a>
                 </li>
                 end task item
               </ul>
             </li>
             <li class="footer">
               <a href="#">View all tasks</a>
             </li>
           </ul>
         </li> -->
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
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                /.row
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url('client/client_profile')?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('client/signout')?>" class="btn btn-default btn-flat">Sign out</a>
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
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?=$page_name === 'index2' ? 'active':''?>">
          <a href="<?=base_url('client/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Analysis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Client's Statistical rank</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Client's Manpower Prediction</a></li>
          </ul>
        </li> -->
        
        
        <li class="<?= $page_name === 'account_admin' || $page_name === 'account_employees' || $page_name === 'account_client'|| $page_name === 'account_applicant' || $page_name === 'add_account' || $page_name === 'account_pinformation' || $page_name === 'account_detachment' ? 'active treeview menu-open' : 'treeview'  ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>User Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="<?= $page_name === 'add_account' ? 'active':''  ?>"><a href="<?=base_url('client/add_account')?>"><i class="fa fa-circle-o"></i> Add Account</a></li> -->

            <!-- <li class="<?= $page_name  === 'account_applicant' ? 'active':'' ?>"><a href="<?=base_url('client/account_applicant')?>"><i class="fa fa-circle-o"></i> Applicant</a></li> -->

            <!-- <li class="<?= $page_name === 'account_admin' ? 'active':''  ?>"><a href="<?=base_url('client/account_admin')?>"><i class="fa fa-circle-o"></i> Admin</a></li>
             -->
            <li class="<?= $page_name  === 'account_pinformation' || $page_name  === 'account_detachment' ? 'active treeview menu-open':'treeview' ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Employees
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= $page_name  === 'account_pinformation' ? 'active':'' ?>">
                  <a href="<?=base_url('client/account_pinformation')?>"><i class="fa fa-circle-o"></i> Personal Information</a>
                </li>

                <!-- <li class="<?= $page_name  === 'account_detachment' ? 'active':'' ?>">
                  <a href="<?=base_url('admin/account_detachment')?>"><i class="fa fa-circle-o"></i> Detachment</a>
                </li> -->
              </ul>
            </li>

            <!-- <li class="<?= $page_name  === 'account_client' ? 'active':'' ?>"><a href="<?=base_url('admin/account_client')?>"><i class="fa fa-circle-o"></i> Client</a></li> -->

            
          </ul>
        </li>
        
        <li class="<?=$page_name === 'job_request' ? 'active':''?>">
          <a href="<?=base_url('client/job_request')?>">
            <i class="fa fa-fw fa-suitcase"></i> <span>Job Request</span>
          </a>
        </li>

        <li class="<?=$page_name === 'Security Personnel Evaluation' ? 'active':''?>">
          <a href="<?=base_url('client/sp_evaluation')?>">
            <i class="fa fa-fw fa-pencil-square-o"></i> <span>Security Personnel Evaluation</span>
          </a>
        </li>

          <!-- <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-equalizer"></i>
                <span>Employee Evaluation</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="glyphicon glyphicon-asterisk">Performance Evaluation</i> </a>

                    <a href="#"><i class="glyphicon glyphicon-asterisk">Security Personnel Evaluation </i></a>
                </li>
              </ul>
        </li> -->
        
           <!--  <li>
              <a href="#">
                <i class="glyphicon glyphicon-inbox"></i> <span>Archives</span>
              </a>
            </li> -->

        <!-- <li>
          <a href="#">
            <i class="glyphicon glyphicon-eye-open"></i> <span>Audit Trail</span>
          </a>
        </li> -->

          <!-- <li>
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Reports</span>
          </a>
                  </li> -->

        <!-- <li class="treeview">
          <a href="#">
              <i class="glyphicon glyphicon-equalizer"></i> <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li ><a href="#" class="text-treeview-small"><i class="fa fa-asterisk"></i>List of Hired Applicants</a></li>
              <li ><a href="#" class="text-treeview-small"><i class="fa fa-asterisk"></i>List of Employees on Floater</a></li>
              <li ><a href="#" class="text-treeview-small"><i class="fa fa-asterisk"></i>List of Clients</a></li>
              <li ><a href="#" class="text-treeview-small"><i class="fa fa-asterisk"></i>List of current Employees</a></li> 
              <li ><a href="#" class="text-treeview-small"><i class="fa fa-asterisk"></i>List of Applicants for Appointment</a></li> 
              <li ><a href="#" class="text-treeview-small"><i class="fa fa-asterisk"></i>Disciplinary Action</a></li> 
          </ul>
        </li>
         -->
        
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  

