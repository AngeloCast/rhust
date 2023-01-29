<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/avatar/' . $data[0]['photo']; ?>" class="img-circle" alt="User profile">
      </div>
      <div class="pull-left info">
        <p><?php echo $data[0]['fullname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
  <?php 
    if($_SESSION['usertype'] == 2){
    echo
    '<ul class="sidebar-menu" data-widget="tree">
      <li><a href="'.site_url('staff').'"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header">MEDICAL RECORDS</li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-wheelchair"></i>
          <span>PATIENT RECORDS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="'.site_url('patient/patient_records').'"><i class="fa fa-circle"></i><span>ITR </span></a></li>
          <li><a href="'.site_url('patient/follow_up_records').'"><i class="fa fa-circle"></i><span>Follow-Up </span></a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-line-chart"></i>
          <span>COVID19 RECORDS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="'.site_url('covid/covid_records').'"><i class="fa fa-circle-o"></i><span> COVID19 </span></a></li>
          <li><a href="'.site_url('vaccination/vaccination_records').'"><i class="fa fa-circle-o"></i><span>COVID Vaccination </span></a></li>
        </ul>
      </li>
      
      <li class="header">OTHERS</li>
      
      <li><a href="#"><i class="fa fa-pie-chart"></i><span> DATA </span></a></li>
      <li><a href="'.site_url('staff/logout').'"><i class="fa fa-sign-out"></i><span> Logout </span></a></li>
      
    </ul>';
    }
    else{
      echo'<ul class="sidebar-menu" data-widget="tree">
      <li><a href="'.site_url('admin').'"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      <li class="header">MEDICAL RECORDS</li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-wheelchair"></i>
          <span>PATIENT RECORDS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="'.site_url('patient/patient_records').'"><i class="fa fa-circle"></i><span>ITR </span></a></li>
          <li><a href="'.site_url('patient/follow_up_records').'"><i class="fa fa-circle"></i><span>Follow-Up </span></a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-line-chart"></i>
          <span>COVID19 RECORDS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="'.site_url('covid/covid_records').'"><i class="fa fa-circle-o"></i><span> COVID19 </span></a></li>
          <li><a href="'.site_url('vaccination/vaccination_records').'"><i class="fa fa-circle-o"></i><span>COVID Vaccination </span></a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-bookmark"></i>
          <span>POSTS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="'.site_url('admin/events').'"><i class="fa fa-circle-o"></i><span> Events </span></a></li>
          <li><a href="'.site_url('admin/announcements').'"><i class="fa fa-circle-o"></i><span> Announcement </span></a></li>
          <li><a href="'.site_url('admin/news_activities').'"><i class="fa fa-circle-o"></i><span> News & Activities </span></a></li>
          <li><a href="'.site_url('admin/health_faqs').'"><i class="fa fa-circle-o"></i><span> Health FAQs</span></a></li>
          <li><a href="'.site_url('admin/health_info').'"><i class="fa fa-circle-o"></i><span> Health Information </span></a></li>
        </ul>
      </li>

      <li><a href="'.site_url('admin/users').'"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li><a href="'.site_url('admin/staff').'"><i class="fa fa-user-md"></i><span> Staff</span></a></li>
      
      
      <li><a href="'.site_url('admin/inquiry').'"><i class="fa fa-envelope"></i><span> Inquiries </span>';
          
          if($data[1]['crows'] != 0){
            echo 
              '<span class="badge badge-warning" style="background-color:red">'. $data[1]['crows'] .'</span>'; 
          }
          
      echo'
      </a></li>
      <li class="header">OTHERS</li>
      
      <li><a href="'.site_url('#').'"><i class="fa fa-pie-chart"></i><span> DATA </span></a></li>
      <li><a href="'.site_url('admin/logout').'"><i class="fa fa-sign-out"></i><span> Logout </span></a></li>
      
    </ul>';
    }
  ?>
  </section>
  <!-- /.sidebar -->
</aside>