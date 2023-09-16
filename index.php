<?php 
require 'admin/functions.php';
include ("admin/counter.php"); 

$gbr = mysqli_query($conn, "SELECT * FROM `homeimg`");
$result = mysqli_query($conn, "select * from `home` ;");
$abouthm = mysqli_query($conn, "SELECT * FROM `abouthm`");
$dsg =  mysqli_query($conn,"SELECT * FROM `newdesign`");
$dsgimg =  mysqli_query($conn,"SELECT * FROM `newdesignimg`");
$sosmed = query("SELECT * FROM `footersosmed`;" )[0];
$footer2 = query("SELECT *FROM `footer2`;")[0];
$footer3 = query("SELECT *FROM `footer3`;")[0];
$services1 = query("SELECT * FROM `services` WHERE `id` = 1;")[0];
$services2 = query("SELECT * FROM `services` WHERE `id` = 2;")[0];
$services3 = query("SELECT * FROM `services` WHERE `id` = 3;")[0];
$services4 = query("SELECT * FROM `services` WHERE `id` = 4;")[0];
$rdsrvc = query("SELECT * FROM `readmoresrvc`;" )[0];
$mapq = query("SELECT * FROM `contactmap`;" )[0];
$latest = query("SELECT * FROM `latestnew` WHERE `id`= 1")[0];
$latest2 = query("SELECT * FROM `latestnew` WHERE `id`= 2")[0];
$latestrd = query("SELECT * FROM `latestnewrd` ")[0];
$testi = mysqli_query($conn,"SELECT * FROM `testi`;");
$galery1 = mysqli_query($conn,"SELECT *FROM `galeryimg` LIMIT 4");
$galery2 = query("SELECT *FROM `galeryimg` LIMIT 2");
$txtglr1 = query("SELECT * FROM `galeryteks` WHERE `id` = 1 ")[0];
$txtglr2 = query("SELECT * FROM `galeryteks` WHERE `id` = 2 ")[0];
$txtglr3 = query("SELECT * FROM `galeryteks` WHERE `id` = 3 ")[0];

if(isset($_POST["send"])){
   if(message($_POST) > 0){
      echo "<script>
      alert('Message Succesfully')</script>";
   }else {
      echo "<script>
      alert('Message Failed')</script>";
   }
}
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
   <body class="main-layout">
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
                              <a href="index.php"><img src="images/logo.png" alt="#" /></a>
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
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">About</a>
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
      <!-- banner -->
      <section class="banner_main" >
         <?php while($row = mysqli_fetch_assoc($gbr)): ?>
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel" style="background: url(admin/img/<?php echo $row ["gambar"]; ?>);">
         <?php endwhile ;?>
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class=""active></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
            <?php while($row = mysqli_fetch_assoc($result)):?>
               <div class="carousel-item <?php echo $row ["status"] ;?>">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="row">
                           <div class="col-md-7 offset-md-5">
                              <div class="text-bg">
                                 <h1><?php echo $row ["header"] ;?></h1>
                                 <span><?php echo $row ["teks"]; ?></span>
                                 <a class="read_more" href="<?php echo $row ["readmore"]; ?>">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endwhile ;?>
               
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>
      <!-- end banner -->
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
     <!--  service -->
     <div class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our <span class="green">Services</span></h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="row">
                  <div class="col-md-4 col-sm-6">
                        <div class="service_box"style="word-break:break-all;">
                           <i><img src="admin/img/<?php echo $services1 ["gambar"]; ?>" alt="#"/></i>
                           <h3><?php echo $services1 ["header"]; ?></h3>
                           <p><?php echo $services1 ["teks"]; ?></p>
                        </div>
                     </div>
                     <div class="col-md-4 offset-md-1 col-sm-6">
                        <div class="service_box" style="word-break:break-all;">
                           <i><img src="admin/img/<?php echo $services2 ["gambar"]; ?>" alt="#"/></i>
                           <h3><?php echo $services2 ["header"]; ?></h3>
                           <p><?php echo $services2 ["teks"]; ?></p>
                        </div>
                     </div>
                     <div class="col-md-4 offset-md-3 col-sm-6 mar_top">
                        <div class="service_box" style="word-break:break-all;">
                           <i><img src="admin/img/<?php echo $services3 ["gambar"]; ?>" alt="#"/></i>
                           <h3><?php echo $services3 ["header"]; ?></h3>
                           <p><?php echo $services3 ["teks"]; ?></p>
                        </div>
                     </div>
                     <div class="col-md-4 offset-md-1 col-sm-6 mar_top">
                        <div class="service_box" style="word-break:break-all;">
                           <i><img src="admin/img/<?php echo $services4["gambar"]; ?>" alt="#"/></i>
                           <h3><?php echo $services4 ["header"]; ?></h3>
                           <p><?php echo $services4 ["teks"]; ?></p>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <a class="read_more" href="<?php echo $rdsrvc ["readmore"]; ?>"> Read More</a>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end service -->
      <!-- gallery -->
      <div class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our <span class="green">gallery</span></h2>
                     <p>here are many variations of passages of Lorem Ipsum available, but the majority have suffer</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_text" style="word-break:break-all;">
                     <div class="galleryh3">
                        <h3><?php echo $txtglr1["header"] ?></h3>
                        <p><?php echo $txtglr1["teks"] ?></
                        </p>
                     </div>
                  </div>
               </div>   
               <?php for ($i = 0; $i < 4; $i++): ?>
                  <?php while($row = mysqli_fetch_assoc($galery1)): ?>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="admin/img/<?php echo $row["gambar"] ; ?>" alt="#"/></figure>
                  </div>
               </div>
               <?php endwhile; ?>
               <?php endfor; ?>
               
               <div class="col-md-4 col-sm-6">
               <div class="gallery_text" style="word-break:break-all;">
                     <div class="galleryh3">
                        <h3><?php echo $txtglr2["header"] ?></h3>
                        <p><?php echo $txtglr2["teks"] ?></
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
               <div class="gallery_text" style="word-break:break-all;">
                     <div class="galleryh3">
                        <h3><?php echo $txtglr3["header"] ?></h3>
                        <p><?php echo $txtglr3["teks"] ?></
                        </p>
                     </div>
                  </div>
               </div>
               <?php foreach($galery2 as $glr): ?>
               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="admin/img/<?php echo $glr["gambar"] ; ?>" alt="#"/></figure>
                  </div>
               </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
      <!-- end gallery -->
      <!-- design -->
      <div class="design">
    <div class="container-fluid">
        <div class="row d_flex">
            <div class="col-md-5">
                <div id="design" class="carousel slide banner_design" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#design" data-slide-to="0" class="active"></li>
                        <li data-target="#design" data-slide-to="1"></li>
                        <li data-target="#design" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      
                        <?php while ($row = mysqli_fetch_assoc($dsg)): ?>
                            <div class="carousel-item <?php echo $row ["status"];?>">
                                <div class="container">
                                    <div class="carousel-caption relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text_de">
                                                    <div class="titlepage">
                                                        <h2><?php echo $row["header"]; ?></h2>
                                                    </div>
                                                    <p><?php echo $row["teks"]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div> <!-- added closing tag here -->
                    <a class="carousel-control-prev" href="#design" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#design" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-7 pad_roght0">
                <div class="design_img">
                    <?php $row = mysqli_fetch_assoc($dsgimg); ?>
                    <figure><img src="admin/img/<?php echo $row["gambar"]; ?>" alt="#"/></figure>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- end design -->
      <!-- latest news -->
      <div  class="latest_news">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Read Our <span class="green">Latest News</span></h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 offset-md-2">
                  <div id="new" class="news_box">
                     <div class="news_img">
                        <figure><img src="admin/img/<?php echo $latest["gambar"]; ?>" alt="#"/></figure>
                     </div>
                     <div class="news_room">
                        <span>Post By :<?php echo $latest["post"]; ?></span>
                        <ul>
                           <li><a href="Javascript:void(0)">Like <i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)">Comment <i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)">Share <i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                        </ul>
                        <h3><?php echo $latest["header"]; ?></h3>
                        <p><?php echo $latest["teks"]; ?>  </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 ">
                  <div id="new" class="news_box">
                     <div class="news_img mr_le">
                        <figure><img src="admin/img/<?php echo $latest2["gambar"]; ?>" alt="#"/></figure>
                     </div>
                     <div class="news_room">
                        <span>Post By :<?php echo $latest2["post"]; ?></span>
                        <ul>
                           <li><a href="Javascript:void(0)">Like <i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)">Comment <i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)">Share <i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                        </ul>
                        <h3><?php echo $latest2["header"]; ?></h3>
                        <p><?php echo $latest2["teks"]; ?> </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <a class="read_more" href="<?php echo $latestrd["readmore"]; ?>"> Read More</a>
               </div>
            </div>
         </div>
      </div>
      <!-- end latest news -->
     <!-- testimonial -->
     <div class="Testimonial">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-8 pad_left0">
               
                  <div id="testimon" class="carousel slide banner_testimonial" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#testimon" data-slide-to="0" class="active"></li>
                        <li data-target="#testimon" data-slide-to="1"></li>
                        <li data-target="#testimon" data-slide-to="2"></li>
                     </ol>
                     
                     <div class="carousel-inner">
                        
                        <?php while($row = mysqli_fetch_assoc($testi)): ?>
                        <div class="carousel-item <?php echo $row["status"];?>"> 
                           <div class="container">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div class="col-md-6" style="word-break:break-all;">
                                       <div class="text_humai">
                                          <i><img src="admin/img/<?php echo $row["gambar1"];?>" alt="#"></i>
                                          <span><?php echo $row["h1"];?></span>
                                          <p ><?php echo $row["teks1"];?></p>
                                       </div>
                                    </div>
                                    <div class="col-md-6" style="word-break:break-all;">
                                       <div class="text_humai">
                                          <i><img src="admin/img/<?php echo $row["gambar2"];?>" alt="#"></i>
                                          <span><?php echo $row["h2"];?></span>
                                          <p><?php echo $row["teks2"];?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php endwhile; ?>
                        
                     </div>
                     <a class="carousel-control-prev" href="#testimon" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#testimon" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                        </a>
                  </div>
                  
               </div>
               <div class="col-md-4 ">
                     <div class="titlepage">
                        <h2>Testimonial</h2>
                     </div>
                  </div>
            </div>
            </div>
      </div>         
      <!-- end design -->
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form"  method="post">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="text" name="name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="text" name="phone">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="text" name="message"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn" name="send">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <?php echo $mapq["map"]; ?>
                     
                     </div>
                  </div>
               </div>  
            </div>
         </div>
      </div>
      <!-- end contact -->
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