<style>
  .skin-blue .main-header .navbar {
    background-color: #076273;
  }
  .skin-blue .main-header .logo{
    background-color: #0b354d;
}
</style>
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini" style="font-family: century gothic;"><b>RHUST</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg" style="font-family: tahoma;">RHU<b>SanTeodoro</b> <i class="fa fa-stethoscope"></i></span>

  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->

        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/avatar/' . $data[0]['photo']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $data[0]['fullname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/avatar/' . $data[0]['photo']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $data[0]['fullname']; ?>
                  <small>Member since <?php echo date('M. Y', strtotime($data[0]['date_created'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <?php 
                  if($_SESSION['usertype'] == 0){
                  echo'
                    <div class="pull-left">
                      <a href="'.site_url('admin/show_profile').'" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                    </div>
                    <div class="pull-right">
                      <a href="'.site_url('admin/logout').'" class="btn btn-default btn-flat">Sign out</a>
                    </div>';
                  }
                  else{
                  echo'
                    <div class="pull-left">
                      <a href="'.site_url('staff/show_profile').'" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                    </div>
                    <div class="pull-right">
                      <a href="'.site_url('staff/logout').'" class="btn btn-default btn-flat">Sign out</a>
                    </div>';
                  }
                ?>
              </li>
            </ul>
          </li>
      </ul>
    </div>
  </nav>
</header>
