<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Assignment Doctor</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>fe_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>fe_assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?=base_url();?>fe_assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>

    <link href="<?=base_url();?>fe_assets/css/fonts.css" rel="stylesheet">
    <link href="<?=base_url();?>fe_assets/css/assignmentdoctor.css" rel="stylesheet">
    
  </head>

  <body>

    <header>
 
    </header>

    <main role="main">
    <!-- navigation start -->
    <input type="hidden" name="paymant_mode" value="true" id="payment_mode">

    <div class="fixed-top inner-nav" data-toggle="affix">
        <div class="navbar navbar-expand-md align-items-start" id="first-inner">
            <a href="<?=base_url();?>" class="navbar-brand" id="logo"><img src="<?=base_url();?>fe_assets/images/logo.png" height="100" width="300" alt=""/></a>
            <a class="navbar-toggler p-2 border-0" data-toggle="collapse" data-target=".navbar-collapse">☰</a>
            <div class="navbar-collapse collapse">
                <div id="navbar-links2">
                    <ul class="navbar-nav flex-row">
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>freesamples/">Free Samples</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>ourwriters/">Our Writers</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?=base_url();?>reviews/">Reviews</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?=base_url();?>contactus/">Contact Us</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="order-btn" href="<?=base_url();?>order/">Order Now</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link"id="signin-btn" href="<?=base_url();?>members/">Sign-in</a>
                      </li>
                      </ul>
                 </div>
            </div>
        </div>
    </div>
