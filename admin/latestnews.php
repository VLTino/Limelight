<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

$rdlatest = query("SELECT * FROM `latestnewrd`")[0];
$latest = query("SELECT * FROM `latestnew` WHERE `id`= 1")[0];
$latest2 = query("SELECT * FROM `latestnew` WHERE `id`= 2")[0];
$message = mysqli_query($conn, "SELECT * FROM `message` ");

if (isset($_POST["sbm"])) {
    if (latest($_POST) > 0) {
        echo "<script>
      alert('data  telah diganti')
      document.location.href = 'latestnews.php';
      </script>";
    } else {
        echo "<script>
      alert('data  gagal diganti')
      document.location.href = 'latestnews.php';
      </script>";
    }
}

if (isset($_POST["sbmrd"])) {
    if (latestrd($_POST) > 0) {
        echo "<script>
      alert('data  telah diganti')
      document.location.href = 'latestnews.php';
      </script>";
    } else {
        echo "<script>
      alert('data  gagal diganti')
      document.location.href = 'latestnews.php';
      </script>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VLT Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminvlt.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VLT Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="adminvlt.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav item home pages -->
            <li class="nav-item">
                <a class="nav-link" href="homehdr.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home Page</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="abouthm.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Home (About Page)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="servicespage.php">
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Services Page</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="newdesign.php">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>New Design Page</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="crudcontact.php">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Contact Page</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="latestnews.php">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Latest News</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="crudtesti.php">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Testimonial</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="crudgalery.php">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Galery</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-shoe-prints"></i>
                    <span>Footer</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">CRUD</h6>
                        <a class="collapse-item" href="crudfootersosmed.php">Social Media</a>
                        <a class="collapse-item" href="crudfooter2.php">Footer 2</a>
                        <a class="collapse-item" href="crudfooter3.php">Footer 3</a>

                    </div>
                </div>
            </li>





            <!-- Divider -->
            <hr class="sidebar-divider">

           



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">
                                    <?php $count = mysqli_num_rows($message);
                                    echo $count; ?>
                                </span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <?php while ($row = mysqli_fetch_assoc($message)): ?>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="message.php?id=<?php echo $row["id"]; ?>" id="pesan">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                <?php echo $row["message"]; ?>
                                            </div>
                                            <div class="small text-gray-500">
                                                <?php echo $row["name"]; ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                                <a class="dropdown-item text-center small text-gray-500" href="crudcontact.php">Read
                                    More Messages</a>


                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Latest News</h1>
                        <a href="#"></i> </a>
                    </div>
                    <h5>Update latest News </h5>

                   <div class="row">
                        <div class="col-xl-5"
                            style="border-style:solid; border-radius:10px; padding:10px; word-break: break-all;">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $latest["id"]; ?>" name="id">
                                <div class="form-group">
                                    <h5>Image</h5>
                                    <img src="img/<?php echo $latest["gambar"]; ?>" alt="" srcset=""
                                        style="width:100%;"><br>
                                    <input type="file" value="img/<?php echo $latest["gambar"]; ?>" name="gambar">
                                </div>
                                <div class="form-group">
                                    <h5>Post by</h5>
                                    <input type="text" name="post" class="form-control"
                                        value="<?php echo $latest["post"]; ?>">
                                </div>
                                <div class="form-group">
                                    <h5>Header 1</h5>
                                    <input type="text" name="header" class="form-control"
                                        value="<?php echo $latest["header"]; ?>">
                                </div>
                                <div class="form-group">
                                    <h5 style="padding-top:15px;">Teks 1</h5>
                                    <textarea name="teks" id="" cols="30" rows="10"
                                        class="form-control"><?php echo $latest["teks"]; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" style="width:100px"
                                    name="sbm">Update</button>

                            </form>
                        </div>
                        <div class="col-xl-1"></div>
                        <div class="col-xl-5"
                            style="border-style:solid; border-radius:10px; padding:10px; word-break: break-all;">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $latest2["id"]; ?>" name="id">
                                <div class="form-group">
                                    <h5>Image</h5>
                                    <img src="img/<?php echo $latest2["gambar"]; ?>" alt="" srcset=""
                                        style="width:100%;">
                                    <br>
                                    <input type="file" value="img/<?php echo $latest["gambar"]; ?>" name="gambar">
                                </div>
                                <div class="form-group">
                                    <h5>Post by</h5>
                                    <input type="text" name="post" class="form-control"
                                        value="<?php echo $latest2["post"]; ?>">
                                </div>
                                <div class="form-group">
                                    <h5>Header 2</h5>
                                    <input type="text" name="header" class="form-control"
                                        value="<?php echo $latest2["header"]; ?>">
                                </div>
                                <div class="form-group">
                                    <h5 style="padding-top:15px;">Teks 2</h5>
                                    <textarea name="teks" id="" cols="30" rows="10"
                                        class="form-control"><?php echo $latest2["teks"]; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" style="width:100px"
                                    name="sbm">Update</button>

                            </form>
                        </div>
                    </div>
                    <br>
                    <form action="" method="post">
                        Readmore
                        <div class="form-group">
                            <input type="text" value="<?php echo $rdlatest["readmore"]; ?>" name="readmore"
                                class="form-control">
                        </div>
                        <button type="submit" name="sbmrd" class="btn btn-primary btn-user btn-block"
                            style="width:100px">Edit</button>
                    </form>





                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2021</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>