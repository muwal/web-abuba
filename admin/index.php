<?php  
require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/../secret/training-abe86-c1169630c405.json');

$firebase = (new Factory)
->withServiceAccount($serviceAccount)
->create();

$database = $firebase->getDatabase();
$auth = $firebase->getAuth();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TheAdmin - Responsive Bootstrap 4 Admin, Dashboard &amp; WebApp Template">
  <meta name="keywords" content="dashboard, index, main">

  <title>Abuba 4.0</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i|Dosis:300,500" rel="stylesheet">

  <!-- Styles -->
  <link href="../assets/css/core.min.css" rel="stylesheet">
  <link href="../assets/css/app.min.css" rel="stylesheet">
  <link href="../assets/css/style.min.css" rel="stylesheet">
  <link href="../assets/css/custom-css.css" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
  <link rel="icon" href="../assets/img/logo_splash.png">

  <!--  Open Graph Tags -->
  <meta property="og:title" content="The Admin Template of 2018!">
  <meta property="og:description" content="TheAdmin is a responsive, professional, and multipurpose admin template powered with Bootstrap 4.">
  <meta property="og:image" content="http://thetheme.io/theadmin/../assets/img/og-img.jpg">
  <meta property="og:url" content="http://thetheme.io/theadmin/">
  <meta name="twitter:card" content="summary_large_image">
</head>

<body>

  <!-- Preloader --> 
  <div class="preloader">
    <div class="spinner-dots">
      <span class="dot1"></span>
      <span class="dot2"></span>
      <span class="dot3"></span>
    </div>
  </div>


  <!-- Sidebar -->
  <aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">
      <a class="logo-icon" href="?page=dashboard"><img src="../assets/img/logo-icon-light.png" alt="logo icon"></a>
      <span class="logo">
        <a href="?page=dashboard"><img src="../assets/img/logo_light.png" alt="logo"></a>
      </span>
      <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
      <ul class="menu">

        <li class="menu-category">main menu</li>

        <li class="menu-item">
          <a class="menu-link" href="?page=dashboard">
            <span class="icon fa fa-home"></span>
            <span class="title">Dashboard</span>
          </a>
        </li>


        <li class="menu-category">Settings</li>

        <li class="menu-item">
          <a class="menu-link" href="?page=outlet">
            <span class="icon fa fa-gear"></span>
            <span class="title">Outlet</span>
          </a>
        </li>

        <li class="menu-item">
          <a class="menu-link" href="?page=misteriguest">
            <span class="icon fa fa-gear"></span>
            <span class="title">Mystery Guest</span>
          </a>
        </li>

        <li class="menu-item">
          <a class="menu-link" href="?page=users">
            <span class="icon fa fa-gear"></span>
            <span class="title">Setup Users</span>
          </a>
        </li>


      </ul>
    </nav>

  </aside>
  <!-- END Sidebar -->

  <!-- Topbar -->
  <header class="topbar">
    <div class="topbar-left">
      <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

      <!-- <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
        <i class="material-icons fullscreen-default">fullscreen</i>
        <i class="material-icons fullscreen-active">fullscreen_exit</i>
      </a> -->

      <div class="dropdown d-none d-md-block">
        <span class="topbar-btn" data-toggle="dropdown"><i class="ti-layout-grid3-alt"></i></span>
        <div class="dropdown-menu dropdown-grid">
          <a class="dropdown-item" href="?page=dashboard">
            <span data-i8-icon="home"></span>
            <span class="title">Dashboard</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="stack_of_photos"></span>
            <span class="title">Gallery</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="search"></span>
            <span class="title">Search</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="calendar"></span>
            <span class="title">Calendar</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="sms"></span>
            <span class="title">Chat</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="invite"></span>
            <span class="title">Emails</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="contacts"></span>
            <span class="title">Contacts</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="bar_chart"></span>
            <span class="title">Charts</span>
          </a>
          <a class="dropdown-item" href="#">
            <span data-i8-icon="businessman"></span>
            <span class="title">Profile</span>
          </a>
        </div>
      </div>

      <!-- <div class="topbar-divider d-none d-md-block"></div>
      
      <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
        <input class="form-control w-300px" type="text">
        <div class="lookup-placeholder">
          <i class="ti-search"></i>
          <span data-provide="typing" data-type="&lt;strong&gt;Type&lt;/strong&gt; Button|&lt;strong&gt;Type&lt;/strong&gt; Slider|&lt;strong&gt;Type&lt;/strong&gt; Layout|&lt;strong&gt;Type&lt;/strong&gt; Modal|&lt;strong&gt;Try&lt;/strong&gt; typing any keyword..." data-loop="false" data-type-speed="90" data-back-speed="50" data-show-cursor="false"></span>
        </div>
      </div> -->
    </div>

    <div class="topbar-right">
      

      <ul class="topbar-btns">
        <li class="dropdown">
          <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="../assets/img/avatar/1.jpg" alt="..."></span>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="page/profile.html"><i class="ti-user"></i> Profile</a>
            <a class="dropdown-item" href="page-app/mailbox.html">
              <div class="flexbox">
                <i class="ti-email"></i>
                <span class="flex-grow">Inbox</span>
                <span class="badge badge-pill badge-info">5</span>
              </div>
            </a>
            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="page-extra/user-lock-1.html"><i class="ti-lock"></i> Lock</a>
            <a class="dropdown-item" href="#" onclick="adminApp.logout()"><i class="ti-power-off"></i> Logout</a>
          </div>
        </li>

        <!-- Notifications -->
        <!-- <li class="dropdown d-none d-md-block">
          <span class="topbar-btn has-new" data-toggle="dropdown"><i class="ti-bell"></i></span>
          <div class="dropdown-menu dropdown-menu-right">
        
            <div class="media-list media-list-hover media-list-divided media-list-xs">
              <a class="media media-new" href="#">
                <span class="avatar bg-success"><i class="ti-user"></i></span>
                <div class="media-body">
                  <p>New user registered</p>
                  <time datetime="2018-07-14 20:00">Just now</time>
                </div>
              </a>
        
              <a class="media" href="#">
                <span class="avatar bg-info"><i class="ti-shopping-cart"></i></span>
                <div class="media-body">
                  <p>New order received</p>
                  <time datetime="2018-07-14 20:00">2 min ago</time>
                </div>
              </a>
        
              <a class="media" href="#">
                <span class="avatar bg-warning"><i class="ti-face-sad"></i></span>
                <div class="media-body">
                  <p>Refund request from <b>Ashlyn Culotta</b></p>
                  <time datetime="2018-07-14 20:00">24 min ago</time>
                </div>
              </a>
        
              <a class="media" href="#">
                <span class="avatar bg-primary"><i class="ti-money"></i></span>
                <div class="media-body">
                  <p>New payment has made through PayPal</p>
                  <time datetime="2018-07-14 20:00">53 min ago</time>
                </div>
              </a>
            </div>
        
            <div class="dropdown-footer">
              <div class="left">
                <a href="#">Read all notifications</a>
              </div>
        
              <div class="right">
                <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
                <a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>
                <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
              </div>
            </div>
        
          </div>
        </li> -->
        <!-- END Notifications -->

        <!-- Messages -->
        <!-- <li class="dropdown d-none d-md-block">
          <span class="topbar-btn" data-toggle="dropdown"><i class="ti-email"></i></span>
          <div class="dropdown-menu dropdown-menu-right">
        
            <div class="media-list media-list-divided media-list-hover media-list-xs scrollable" style="height: 290px">
              <a class="media media-new1" href="page-app/mailbox-single.html">
                <span class="avatar status-success">
                  <img src="../assets/img/avatar/1.jpg" alt="...">
                </span>
        
                <div class="media-body">
                  <p><strong>Maryam Amiri</strong> <time class="float-right" datetime="2018-07-14 20:00">23 min ago</time></p>
                  <p class="text-truncate">Authoritatively exploit resource maximizing technologies before technically.</p>
                </div>
              </a>
        
              <a class="media media-new1" href="page-app/mailbox-single.html">
                <span class="avatar status-warning">
                  <img src="../assets/img/avatar/2.jpg" alt="...">
                </span>
        
                <div class="media-body">
                  <p><strong>Hossein Shams</strong> <time class="float-right" datetime="2018-07-14 20:00">48 min ago</time></p>
                  <p class="text-truncate">Continually plagiarize efficient interfaces after bricks-and-clicks niches.</p>
                </div>
              </a>
        
              <a class="media" href="page-app/mailbox-single.html">
                <span class="avatar status-dark">
                  <img src="../assets/img/avatar/3.jpg" alt="...">
                </span>
        
                <div class="media-body">
                  <p><strong>Helen Bennett</strong> <time class="float-right" datetime="2018-07-14 20:00">3 hours ago</time></p>
                  <p class="text-truncate">Objectively underwhelm cross-unit web-readiness before sticky outsourcing.</p>
                </div>
              </a>
        
              <a class="media" href="page-app/mailbox-single.html">
                <span class="avatar status-success bg-purple">FT</span>
        
                <div class="media-body">
                  <p><strong>Fidel Tonn</strong> <time class="float-right" datetime="2018-07-14 20:00">21 hours ago</time></p>
                  <p class="text-truncate">Interactively innovate transparent relationships with holistic infrastructures.</p>
                </div>
              </a>
        
              <a class="media" href="page-app/mailbox-single.html">
                <span class="avatar status-danger">
                  <img src="../assets/img/avatar/4.jpg" alt="...">
                </span>
        
                <div class="media-body">
                  <p><strong>Freddie Arends</strong> <time class="float-right" datetime="2018-07-14 20:00">Yesterday</time></p>
                  <p class="text-truncate">Collaboratively visualize corporate initiatives for web-enabled value.</p>
                </div>
              </a>
        
              <a class="media" href="page-app/mailbox-single.html">
                <span class="avatar status-success">
                  <img src="../assets/img/avatar/5.jpg" alt="...">
                </span>
        
                <div class="media-body">
                  <p><strong>Freddie Arends</strong> <time class="float-right" datetime="2018-07-14 20:00">Yesterday</time></p>
                  <p class="text-truncate">Interactively reinvent standards compliant supply chains through next-generation bandwidth.</p>
                </div>
              </a>
            </div>
        
            <div class="dropdown-footer">
              <div class="left">
                <a href="#">Read all messages</a>
              </div>
        
              <div class="right">
                <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
                <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
              </div>
            </div>
        
          </div>
        </li> -->
        <!-- END Messages -->

      </ul>

    </div>
  </header>
  <!-- END Topbar -->


  <!-- Main container -->
  <main class="main-container">

    <div class="main-content">
      <?php 
      $current_page = isset($_GET['page']) ? $_GET['page'] : null;

      switch ($current_page) {
        case 'misteriguest':
        include 'misteri_shopper/setup_mg.php';
        break;

        case 'outlet':
        include 'outlet/setup_outlet.php';
        break;

        case 'users':
        include 'user/setup_user.php';
        break;

        case 'dashboard':
        default:
        include 'dashboard.php';
      }
      ?>

    </div><!--/.main-content -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="row">
        <div class="col-md-6">
          <p class="text-center text-md-left">Copyright © 2019 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</p>
        </div>

        <div class="col-md-6">
          <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
              <a class="nav-link" href="help/articles.html">Documentation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="help/faq.html">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://themeforest.net/item/theadmin-responsive-bootstrap-4-admin-dashboard-webapp-template/20475359?license=regular&amp;open_purchase_for_item_id=20475359&amp;purchasable=source&amp;ref=thethemeio">Purchase Now</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <!-- END Footer -->

  </main>
  <!-- END Main container -->



  <!-- Global quickview -->
  <div id="qv-global" class="quickview" data-url="../assets/data/quickview-global-for-index.html">
    <div class="spinner-linear">
      <div class="line"></div>
    </div>
  </div>
  <!-- END Global quickview -->



  <!-- Scripts -->
  <script src="../assets/js/core.min.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/js/script.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase.js"></script>
  <script type="text/javascript" src="../firebase.js"></script>
  <script type="text/javascript" src="admin.js"></script>

</body>
</html>
