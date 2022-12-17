<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>RHU San Teodoro - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>">
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/jquery.desoslide.css" rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/bell.css" rel='stylesheet' type='text/css'>
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/style.css" rel='stylesheet' type='text/css' />
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/fontawesome-all.css" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
  rel="stylesheet">
</head>
<style>
  body:not(.modal-open){
    padding-right: 0px !important;
  }
  .shorten{
    display: block;
    width: 100%;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
  }
  .imgcard{
    background: white;
    width: 100%;
    padding: 3px;
  }
  .card_image{
    width: 100%;
    height: 400px;
    object-fit: cover;
    object-position: top left;
    border: 3px solid gray;
    transition: transform .3s;
    -webkit-filter: brightness(100%);
  }
  .card_image:hover {
      transform: scale(1.03);
      -webkit-filter: brightness(80%);
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
      transition: all 0.5s ease;
  }
  .carousel-inner img {
    width: 100%;
  }

  .carousel-caption{
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(3px);
    text-align: center;
  }
  .carousel-item img:hover{
    -webkit-filter: brightness(60%);
    -webkit-transition: all 0.5s ease;
  }
</style>
<body>
  <?php include("header.php");?>
  <div class="banner-inner"></div>
  <!--/main-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
  </ol>
  <section class="main-content-w3layouts-agileits">
    <div class="container">

      <div class="row">
        <!--left-->
        <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left" style="border: 1px solid #ced4da">

          <br><h3 style="font-family: arial narrow;">LATEST NEWS</h3><br>
          <?php 
                # code...
              if(empty($data[4][0])){
                echo 'No Latest News...';
              }
              else{
              echo '<div class="blog-grids row mb-3">
              <div class="col-sm-12 blog-grid-left">
                <div class="imgcard">
                  <a href="'.BASE_URL.'home/view_post/'.$data[4][0]['id'].'"><img class="card_image" src="'.BASE_URL.'public/images/'.$data[4][0]['photo'].'"  alt="latest news" ></a>
                  
                  <h5><a href="'.BASE_URL.'home/view_post/'.$data[4][0]['id'].'">'.$data[4][0]['title'].'</a></h5>
                  <div class="shorten">'.$data[4][0]['content'].'</div>
                  <div class="sub-meta">          
                    <span><i class="fa fa-clock"></i> '.$data[4][0]['date'].'</span>
                    <a href="'.BASE_URL.'home/view_post/'.$data[4][0]['id'].'" style="float: right; font-size: 14px;" href="">Read More >></a> 
                  </div>
                  </div>
                </div>
              </div>';
            }
          ?>
          <hr>
          <div class="contact-map">
            <br><h3 style="color: teal; font-style: bold">San Teodoro</h3><br>
            <p>San Teodoro, officially the Municipality of San Teodoro, is a 4th class municipality in the province of Oriental Mindoro, Philippines.</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124241.04011034804!2d120.92865351022046!3d13.317127687442774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bcf4e57f81d06b%3A0xfbf09961036fac99!2sSan%20Teodoro%2C%20Oriental%20Mindoro!5e0!3m2!1sen!2sph!4v1657610003290!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
          </div>
          <br>
          <hr>
          <div class="box">
            <div class="box-body">
              <?php include("includes/article_carousel.php");?>
            </div>
          </div>
        </div>

        <?php if(!empty($data[2])){include("details_modal.php");} ?>
        <?php include("includes/sidebar.php");?>
        
      </div>
    </div>
  </section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>
</html>