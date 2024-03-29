<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="logo.png">
    <link rel="icon" type="image/png" href="logo.png">
    <title>
        ASK Consultant
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <?php
    require("config.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    table, th, td {
        border: 1px solid black !important;
    }
    .clickedrow
    {
      background-color: #EEEEEE;
    }

    .btn:not([class*="btn-outline-"]) {
    border: 0;
    margin-left: 20px;
    
}





    </style>
    <script>
      $(document).ready(function() {
      $('.table td').on('click', function() 
      {
        $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
        // add highlight to the parent tr of the clicked td
        $(this).closest('tr').addClass("clickedrow");
      });
    });
    </script>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" " target="_blank">
        <img src="logo.png" class="" alt="main_logo">
        <!-- <span class="ms-1 font-weight-bold">Argon Dashboard 2</span> -->
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

      <?php
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
    {
      ?>
        <li class="nav-item">
          <a class="nav-link " href="show_data.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Students</span>
          </a>
        </li>
<?php
    }
?>
<?php
    if(checkLoggedin())
    {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="show_inprocess.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Inprocess</span>
          </a>
        </li>
        <?php
    }
?><?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_completed.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Completed</span>
          </a>
        </li>

        <?php
}

?>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin")||checkPrivilage($_SESSION["user_type"],"case_admin"))
{
  ?>

        <li class="nav-item">
          <a class="nav-link " href="add_inprocess.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Add Inprocess</span>
          </a>
        </li>

        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin")||checkPrivilage($_SESSION["user_type"],"counsellor"))
{
  ?>

        <li class="nav-item">
          <a class="nav-link " href="add_user.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Add Leads</span>
          </a>
        </li>

        <?php
}
        ?>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts"))
{
  ?>

        <li class="nav-item">
          <a class="nav-link " href="add_completed.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Add Completed</span>
          </a>
        </li>

        <?php
}
        ?>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>

        <li class="nav-item">
          <a class="nav-link " href="add_admin.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Add Admins</span>
          </a>
        </li>

        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>

        <li class="nav-item">
          <a class="nav-link " href="add_extra_data.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Add Extra Data</span>
          </a>
        </li>

        <?php
}
        ?>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>

        <li class="nav-item">
          <a class="nav-link " href="show_users.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Admins</span>
          </a>
        </li>

        <?php
}
        ?>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_consultant.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Consultants</span>
          </a>
        </li>
        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_country.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Country</span>
          </a>
        </li>
        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_follow_up_action.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Follow Up Actions</span>
          </a>
        </li>
        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_inquiry_location.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Inquiry Location</span>
          </a>
        </li>
        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_outcome.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Outcome</span>
          </a>
        </li>
        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_priority.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Priority</span>
          </a>
        </li>
        <?php
}
        ?>
        <?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
  ?>
        <li class="nav-item">
          <a class="nav-link " href="show_source.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Show Source</span>
          </a>
        </li>
        <?php
}
        ?>
        
        
        
        
        
      </ul>
    </div>
    <!-- <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div> -->
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        
      </div>
    </nav>