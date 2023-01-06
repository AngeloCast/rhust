<style type="text/css">
  #user{
    width: 100%;
    max-width: 30px;
    height: 30px;
    border-radius: 50%;
  }
  #headerbg{
    background: #08262c;
  }
  #navlink{
    color: #ffffffd4;
  }
  .nav-link:hover{
    background-color: #0f4550;
  }
</style>

<header class="sticky-top">
    <div class="top-bar_sub_w3layouts container-fluid">
      <div class="row">
        <div class="col-md-4 logo text-left">
          <a class="navbar-brand" href="" style="color: #146e3c;">
            <img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>" style="width: 60px;" alt="San Teodoro Logo"> SAN TEODORO<i style="color: #146e3c;" class="fa fa-stethoscope"></i></a>
        </div>
        <div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0">
          <span>Rural Health Unit of San Teodoro</span>
          <span class="mx-lg-4 mx-md-2  mx-1">
            <br>Oriental Mindoro
          </span>
        </div>
        <div class="col-md-4 log-icons text-right">

          <ul class="social_list1 mt-3">

            <li>
              <a href="" class="facebook1 mx-2" >
                <i class="fa fa-facebook-f"></i>

              </a>
            </li>
            <li>
              <a href="" class="twitter2">
                <i class="fa fa-twitter"></i>

              </a>
            </li>
            <li>
              <a href="" class="pin mx-2">
                <i class="fa fa-envelope"></i>
              </a>
            </li>
            <li>
              <a href="" class="pin">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    

      <div class="header_top" id="home">
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="headerbg">
          <button class="navbar-toggler navbar-toggler-right mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
           </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" id="navlink" href="<?=site_url('home'); ?>">Home</a>
              </li>
              
              <li class="nav-item active">
                <a class="nav-link" id="navlink" href="<?=site_url('home/news'); ?>">News & Activities</a>
              </li>
              
              <li class="nav-item active">
                <a class="nav-link" id="navlink" href="<?=site_url('home/events'); ?>">Events</a>
              </li>

              <li class="nav-item dropdown">
                <a style="color: #ffffffd4;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                  Articles
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?=site_url('home/health_info'); ?>">Health Information</a>

                  <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item" href="<?=site_url('home/health_faqs'); ?>">FAQs</a>
                </div>
              </li>
              
              <li class="nav-item active">
                <a class="nav-link" id="navlink" href="<?=site_url('home/clustering'); ?>">Clustering</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navlink" href="<?=site_url('home/about'); ?>">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="navlink" href="<?=site_url('home/contact_us'); ?>">Contact Us</a>
              </li>
            </ul>

            
            <ul class="navbar-nav ml-auto">

              <?php
                if(isset($_SESSION['loggedin'])){
                  echo
                  '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img id="user" src="'.site_url('public/images/avatar/'.$data[3]['photo']).'"> ' . $data[3]['fullname'] . '
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="'.site_url('home/profile').'"><i class="fa fa-user"></i> My Profile</a>

                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item" href="'.site_url('home/logout').'"><i class="fa fa-sign-out"></i> Logout </a>
                    </div>
                  </li>';
                }
                else{
                  echo '
                    <li class="nav-item">
                      <a class="nav-link" href="'.site_url('auth/login').'"><i class="fa fa-user"></i> Log in</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="'.site_url('auth/register').'"><i class="fa fa-pencil"></i> Register</a>
                    </li>';
                }
              ?>
              
            </ul>
              
          </div>
        </nav>

      </div>
  </header>