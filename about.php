<?php 
require 'admin/functions.php';
$abouthm = mysqli_query($conn, "SELECT * FROM `abouthm`");
$sosmed = query("SELECT * FROM `footersosmed`;" )[0];
$footer2 = query("SELECT *FROM `footer2`;")[0];
$footer3 = query("SELECT *FROM `footer3`;")[0];
 ?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>limelight</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout in_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-10 offset-md-1">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                           <li class="nav-item ">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active" href="about.php">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="service.php">Services</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.php">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="testimonial.php"> Testimonial </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>About <span class="green">Us</span></h2>
                     <?php while($row = mysqli_fetch_assoc($abouthm)): ?>
                     <p><?php echo $row["teks"]?></p>
                     <a class="read_more" href="<?php echo $row["readmore"]?>"> Read More</a>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="admin/img/<?php echo $row["gambar"]?>" alt="#"/></figure>
                  </div>
                  <?php endwhile ;?>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-3 col-sm-6">
                     <ul class="social_icon">
                        <li><a href="<?php echo $sosmed ["facebook"]; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $sosmed ["twitter"]; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $sosmed ["linkedin"]; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $sosmed ["instagram"]; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                     <p class="variat pad_roght2">
                     <?php echo $sosmed ["teks"]; ?>
                     </p>
                  </div>
                  <div class=" col-md-3 col-sm-6">
                     <h3><?php echo $footer2 ["header"]; ?></h3>
                     <p  class="variat pad_roght2">
                     <?php echo $footer2 ["teks"]; ?>
                     </p>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h3>INFORMATION</h3>
                     <ul class="link_menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php"> About</a></li>
                        <li><a href="service.php">Services</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="testimonial.php">Testimonial</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h3><?php echo $footer3 ["header"]; ?></h3>
                     <p  class="variat">
                     <?php echo $footer3 ["teks"]; ?>    
                     </p>
                  </div>
                  <div class="col-md-6 offset-md-6">
                     <form id="hkh" class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>