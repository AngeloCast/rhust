<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>San Teodoro BHP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/select2/dist/css/select2.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/dist/css/skins/_all-skins.min.css">
        <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/dist/css/AdminLTE.min.css">

    
    <!-- Custom CSS -->
    <style type="text/css">
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px){ 
      #navbar-search-input{ 
        width: 100px; 
      }
      #navbar-search-input:focus{ 
        width: 150px; 
      }
    }

    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px){ 
      #navbar-search-input{ 
        width: 150px; 
      }
      #navbar-search-input:focus{ 
        width: 200px; 
      } 
    }

    .word-wrap{
      overflow-wrap: break-word;
    }
    .prod-body{
      height:250px;
    }

    .box:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .login-box{
      margin-top: 100px;
    }
    .register-box{
      margin-top:30px;
    }

    #trending{
      list-style: none;
      padding:10px 5px 10px 15px;
    }
    #trending li {
      padding-left: 1.3em;
    }
    #trending li:before {
      content: "\f046";
      font-family: FontAwesome;
      display: inline-block;
      margin-left: -1.3em; 
      width: 1.3em;
    }

    #recent{
      list-style: none;
      padding:10px 5px 10px 15px;
    }
    #recent li {
      padding-left: 1.3em;
    }
    #recent li:before {
      content: "\f046";
      font-family: FontAwesome;
      display: inline-block;
      margin-left: -1.3em; 
      width: 1.3em;
    }

    .boxed {
      border: 0px solid transparent;
      margin-bottom: 10px;
      text-align: center;
      font-size: 18px;
      background-color: #10454b;
      color: white;
      padding: 10px;
      border-radius: 10px 10px 0px 0px ;
      font-family: Trebuchet MS;
    }

    #login, #register{
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('http://localhost/rhust/public/images/mho.jpg');
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      
      overflow-y: hidden;
    }
    #formbox{
      border-top: 10px solid #03a3c7;
    }
    .ulist{
      padding-left: 50px;
      padding-right: 50px;
      columns: 3;
      -webkit-columns: 3;
      -moz-columns: 3;
    }
    .chaps{
      margin-bottom: 5px;
    }
    .b{
      font-family: "Roboto Condensed", Tahoma, sans-serif;
      color: #4b4b4b; 
      text-transform: uppercase;
      font-weight: bold;
      font-size: 28px;
    }
    
    .topbox{
      margin-bottom: 20px;
      background-color: white;
      border-radius: 3px;
      border-bottom: 0.5px solid #d0d2d5;
    }
    li ul{
      max-height:300px;
      overflow:auto;
    }
    #likes{
      padding:10px 5px 10px 15px;
    }
    #likes li {
      padding-left: 1.3em;
    }
    #likes li:before {
      content: "\f51f";
      font-family: FontAwesome;
      display: inline-block;
      margin-left: -1.3em; 
      width: 1.3em;
    }
</style>

</head>