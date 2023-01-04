<!DOCTYPE html>
<html>

<head>
    <title>Footer with social icons</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/Footer-with-social-icons.css">

<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: teal;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
html {
  scroll-behavior: smooth;
}
</style>
</head>

<body>

    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 myCols">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Log in</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Announcements</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 myCols">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Rural Health Unit</a></li>
                        <li><a href="#">Staff Information</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 myCols">
                    <h5>Articles</h5>
                    <ul>
                        <li><a href="#">Health FAQs</a></li>
                        <li><a href="#">Health Information</a></li>
                        <li><a href="#">News and Activities</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
        <div class="social-networks">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook-official"></i></a>
            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
        </div>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
