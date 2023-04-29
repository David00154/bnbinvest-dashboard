<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">

  <!-- Bootstrap-extend -->
  <link rel="stylesheet" href="css/bootstrap-extend.css">

  <!-- theme style -->
  <link rel="stylesheet" href="css/master_style.css">

  <!-- Crypto_Admin skins -->
  <link rel="stylesheet" href="css/skins/_all-skins.css">
  <script src="assets/vendor_components/jquery/dist/jquery.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/count.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/custom-style.css">
  <style type="text/css">
    .goog-te-gadget .goog-te-combo {
      padding: 5px;
      border-radius: 5px;
    }
  </style>
</head>

<body class="hold-transition skin-black sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <!-- <a href="index.php" class="logo"> -->

      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg">
  		  <img src="images/logo-light-text.png" alt="logo" class="light-logo">
  	  	<img src="images/logo-dark-text.png" alt="logo" class="dark-logo">
  	  </span> -->
      <!-- </a> -->
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- <li class="user user-menu" style="margin-right: 40px;">
              <a href="#" class="btn btn-outline-danger" style="margin-top: 15px; color: #f15c30;">
                TRADING SESSION
              </a>
            </li> -->
            <li class="user user-menu" style="margin-right: 0px;">
              <a href="#" class="connect-wallet" id="connect-wallet-btn">
                Connect Wallet
              </a>
            </li>



            <!-- User Account -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/user.png" class="user-image rounded-circle" alt="User Image">
              </a>
              <ul class="dropdown-menu scale-up">
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row no-gutters">
                    <div class="col-12">
                      <a href="profile.php"><i class="ion ion-person"></i> My Profile</a>
                    </div>
                    <div class="col-12">
                      <a href="change-password.php"><i class="fa fa-lock"></i> Change Password</a>
                    </div>
                    <div class="col-12">
                      <a href="logout.php"><i class="icon-logout"></i> Logout</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="walletconnect-wrapper" class="hidden" style="visibility: visible;">
      <div id="walletconnect-modal">
        <div id="walletconnect-modal_base">
          <div class="walletconnect-modal_header" id="walletconnect-modal_header">
            <img src="data:image/svg+xml,%3Csvg height='185' viewBox='0 0 300 185' width='300' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='m61.4385429 36.2562612c48.9112241-47.8881663 128.2119871-47.8881663 177.1232091 0l5.886545 5.7634174c2.445561 2.3944081 2.445561 6.2765112 0 8.6709204l-20.136695 19.715503c-1.222781 1.1972051-3.2053 1.1972051-4.428081 0l-8.100584-7.9311479c-34.121692-33.4079817-89.443886-33.4079817-123.5655788 0l-8.6750562 8.4936051c-1.2227816 1.1972041-3.205301 1.1972041-4.4280806 0l-20.1366949-19.7155031c-2.4455612-2.3944092-2.4455612-6.2765122 0-8.6709204zm218.7677961 40.7737449 17.921697 17.546897c2.445549 2.3943969 2.445563 6.2764769.000031 8.6708899l-80.810171 79.121134c-2.445544 2.394426-6.410582 2.394453-8.85616.000062-.00001-.00001-.000022-.000022-.000032-.000032l-57.354143-56.154572c-.61139-.598602-1.60265-.598602-2.21404 0-.000004.000004-.000007.000008-.000011.000011l-57.3529212 56.154531c-2.4455368 2.394432-6.4105755 2.394472-8.8561612.000087-.0000143-.000014-.0000296-.000028-.0000449-.000044l-80.81241943-79.122185c-2.44556021-2.394408-2.44556021-6.2765115 0-8.6709197l17.92172963-17.5468673c2.4455602-2.3944082 6.4105989-2.3944082 8.8561602 0l57.3549775 56.155357c.6113908.598602 1.602649.598602 2.2140398 0 .0000092-.000009.0000174-.000017.0000265-.000024l57.3521031-56.155333c2.445505-2.3944633 6.410544-2.3945531 8.856161-.0002.000034.0000336.000068.0000673.000101.000101l57.354902 56.155432c.61139.598601 1.60265.598601 2.21404 0l57.353975-56.1543249c2.445561-2.3944092 6.410599-2.3944092 8.85616 0z' fill='%233b99fc'/%3E%3C/svg%3E" class="walletconnect-modal_headerLogo">
            <p>WalletConnect</p>
            <div class="walletconnect-modal_close_wrapper">
              <div id="walletconnect-modal_close_btn" class="walletconnect-modal_close_btn">
                <div class="walletconnect-modal_close_line1"></div>
                <div class="walletconnect-modal_close_line2"></div>
              </div>
            </div>
          </div>
          <div>
            <div id="walletconnect_modal_inner">
              <p id="walletconnect_text" class="walletconnect_text">
                Choose your preferred wallet
              </p>
              <input type="text" placeholder="Search" id="walletconnect_input" class="walletconnect_input">
              <div class="walletconnect_wrapper_wrap">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>