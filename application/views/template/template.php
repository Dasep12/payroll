<?php
$info  = $this->m_payroll->getData(['id' => $this->session->userdata('id')], 'akun')->row();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Payroll</title>
  <!-- Favicon-->
  <link rel="icon" href="<?= base_url('assets') ?>/favicon.ico" type="image/x-icon">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="<?= base_url('assets') ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="<?= base_url('assets') ?>/plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="<?= base_url('assets') ?>/plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Bootstrap Material Datetime Picker Css -->
  <link href="<?= base_url('assets') ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

  <!-- Bootstrap DatePicker Css -->
  <link href="<?= base_url('assets') ?>/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

  <!-- Wait Me Css -->
  <link href="<?= base_url('assets') ?>/plugins/waitme/waitMe.css" rel="stylesheet" />

  <!-- Bootstrap Select Css -->
  <link href="<?= base_url('assets') ?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
  <!-- JQuery DataTable Css -->
  <link href="<?= base_url('assets') ?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="<?= base_url('assets') ?>/css/themes/all-themes.css" rel="stylesheet" />
  <!-- Multi Select Css -->
  <link href="<?= base_url('assets') ?>/plugins/multi-select/css/multi-select.css" rel="stylesheet">
  <!-- Jquery Core Js -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
</head>

<body class="theme-red">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
  <!-- Search Bar -->
  <div class="search-bar">
    <div class="search-icon">
      <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
      <i class="material-icons">close</i>
    </div>
  </div>
  <!-- #END# Search Bar -->
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="<?= base_url() ?>">Sistem Informasi Payroll</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          <img src="<?= base_url('assets') ?>/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $info->name ?></div>
          <div class="email"><?= $info->email ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="<?= base_url('Profile') ?>"><i class="material-icons">person</i>Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url('Administrator') ?>"><i class="material-icons">group</i>Administrator</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url('Logout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
        <ul class="list">
          <li class="header">MAIN NAVIGATION</li>
          <li class="<?php if ($url == "Home") {
                        echo "active";
                      } ?>">
            <a href="<?= base_url('Home') ?>">
              <i class="material-icons">home</i>
              <span>Home</span>
            </a>
          </li>
          <li class="<?php if ($url == "Karyawan" || $url == "AddKaryawan" || $url == "Jobclass") {
                        echo "active";
                      } ?>">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">view_list</i>
              <span>Karyawan</span>
            </a>
            <ul class="ml-menu">
              <li class="<?php if ($url == "AddKaryawan") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('AddKaryawan') ?>">Tambah Karyawan</a>
              </li>
              <li class="<?php if ($url == "Karyawan") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Karyawan') ?>">Master Karyawan</a>
              </li>
              <li class="<?php if ($url == "Jobclass") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Jobclass') ?>">Jobclass</a>
              </li>
            </ul>
          </li>


          <li class="<?php if ($url == "Input_gaji" ||  $url == "Tabel_gaji" || $url == "Upload_gaji" || $url == "Histori" || $url == "Setting_gaji") {
                        echo "active";
                      } ?>">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">assignment</i>
              <span>Gaji</span>
            </a>
            <ul class="ml-menu">

              <li class="<?php if ($url == "Setting_gaji") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Setting_gaji') ?>">Setting Gaji</a>
              </li>
              <li class="<?php if ($url == "Tabel_gaji") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Tabel_gaji') ?>">Tabel Gaji Karyawan</a>
              </li>
              <li class="<?php if ($url == "Input_gaji") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Input_gaji') ?>">Input Gaji</a>
              </li>
              <li class="<?php if ($url == "Upload_gaji") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Upload_gaji') ?>">Upload Gaji</a>
              </li>
              <li class="<?php if ($url == "Histori") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('Histori') ?>">Histori Gaji Karyawan</a>
              </li>
              <li>
            </ul>
          </li>
          <li class="<?php if ($url == "CreateSlip" ||  $url == "Send_mail") {
                        echo "active";
                      } ?>">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">widgets</i>
              <span>Tools</span>
            </a>

            <ul class="ml-menu">
              <li class="<?php if ($url == "CreateSlip") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url('CreateSlip') ?>">Create Slip Gaji</a>
              </li>
              <li class="<?php if ($url == "Send_mail") {
                            echo "active";
                          } ?>">
                <a href="<?= base_url("Send_mail") ?>">Send Slip Gaji</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
        <div class="copyright">
          &copy; 2021 <a href="javascript:void(0);">Sistem Informasi Payroll</a>
        </div>
        <div class="version">
          <b>Version: </b> 1.0.0
        </div>
      </div>
      <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
      <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <center>

          <li role="presentation" class=""><a href="#skins" data-toggle="tab">SKINS</a></li>
        </center>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
          <ul class="demo-choose-skin">
            <li data-theme="red" class="active">
              <div class="red"></div>
              <span>Red</span>
            </li>
            <li data-theme="pink">
              <div class="pink"></div>
              <span>Pink</span>
            </li>
            <li data-theme="purple">
              <div class="purple"></div>
              <span>Purple</span>
            </li>
            <li data-theme="deep-purple">
              <div class="deep-purple"></div>
              <span>Deep Purple</span>
            </li>
            <li data-theme="indigo">
              <div class="indigo"></div>
              <span>Indigo</span>
            </li>
            <li data-theme="blue">
              <div class="blue"></div>
              <span>Blue</span>
            </li>
            <li data-theme="light-blue">
              <div class="light-blue"></div>
              <span>Light Blue</span>
            </li>
            <li data-theme="cyan">
              <div class="cyan"></div>
              <span>Cyan</span>
            </li>
            <li data-theme="teal">
              <div class="teal"></div>
              <span>Teal</span>
            </li>
            <li data-theme="green">
              <div class="green"></div>
              <span>Green</span>
            </li>
            <li data-theme="light-green">
              <div class="light-green"></div>
              <span>Light Green</span>
            </li>
            <li data-theme="lime">
              <div class="lime"></div>
              <span>Lime</span>
            </li>
            <li data-theme="yellow">
              <div class="yellow"></div>
              <span>Yellow</span>
            </li>
            <li data-theme="amber">
              <div class="amber"></div>
              <span>Amber</span>
            </li>
            <li data-theme="orange">
              <div class="orange"></div>
              <span>Orange</span>
            </li>
            <li data-theme="deep-orange">
              <div class="deep-orange"></div>
              <span>Deep Orange</span>
            </li>
            <li data-theme="brown">
              <div class="brown"></div>
              <span>Brown</span>
            </li>
            <li data-theme="grey">
              <div class="grey"></div>
              <span>Grey</span>
            </li>
            <li data-theme="blue-grey">
              <div class="blue-grey"></div>
              <span>Blue Grey</span>
            </li>
            <li data-theme="black">
              <div class="black"></div>
              <span>Black</span>
            </li>
          </ul>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
  </section>

  <!-- contents -->
  <?= $contents ?>
  <!-- end of contents -->


  <!-- Bootstrap Core Js -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.js"></script>

  <!-- Select Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

  <!-- Slimscroll Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

  <!-- Waves Effect Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/node-waves/waves.js"></script>

  <!-- Autosize Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/autosize/autosize.js"></script>

  <!-- Moment Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/momentjs/moment.js"></script>

  <!-- Bootstrap Material Datetime Picker Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

  <!-- Bootstrap Datepicker Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


  <!-- Jquery DataTable Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

  <!-- Custom Js -->
  <script src="<?= base_url('assets') ?>/js/admin.js"></script>
  <script src="<?= base_url('assets') ?>/js/pages/tables/jquery-datatable.js"></script>
  <script src="<?= base_url('assets') ?>/js/pages/forms/basic-form-elements.js"></script>

  <!-- Demo Js -->
  <script src="<?= base_url('assets') ?>/js/demo.js"></script>

  <!-- Multi Select Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/multi-select/js/jquery.multi-select.js"></script>
  <!-- Select Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="<?= base_url('assets') ?>/js/pages/ui/notifications.js"></script>
  <!-- Bootstrap Notify Plugin Js -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap-notify/bootstrap-notify.js"></script>

</body>

</html>