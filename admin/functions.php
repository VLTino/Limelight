<?php

$conn = mysqli_connect("localhost", "root", "", "companyprofile");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function register($data)
{
    global $conn;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username

    //cek confirm password
    if ($password !== $password2) {
        echo "<script> 
        alert('Konfirmasi password salah')
        </script>";
        return false;
    }



    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "insert into admin values ('$username','$password')");

    return mysqli_affected_rows($conn);

}

function home($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    $readmore = htmlspecialchars($data["readmore"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO `home` VALUES ('$header','$teks','$readmore','$status',NULL)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hdredit($data)
{

    global $conn;

    $id = $data["id"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    $readmore = htmlspecialchars($data["readmore"]);
    $status = htmlspecialchars($data["status"]);

    $query = "UPDATE `home` SET `header` = '$header', `teks` = '$teks', `readmore` = '$readmore', `status` = '$status' WHERE `id` = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}

function headerimg($data)
{
    global $conn;

    $result = mysqli_query($conn, "SELECT `gambar` FROM `homeimg` LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambar = img();
    if (!$gambar) {
        return false;
    }


    mysqli_query($conn, "UPDATE `homeimg` SET `gambar`='$gambar' ");

    if ($gambarlama && $gambarlama != $gambar) {
        $old_file = "img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }

    return mysqli_affected_rows($conn);




}

function img()
{
    $namafile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;

}

function deletehm($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM `home` WHERE `id`='$id' ");
    return mysqli_affected_rows($conn);
}


function editabout($data)
{

    global $conn;

    $teksabt = htmlspecialchars($data["teks"]);
    $gambarabt = htmlspecialchars($data["gambar"]);
    $readmore = htmlspecialchars($data["readmore"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `abouthm` LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambarabt = img();
    if (!$gambarabt) {
        return false;
    }

    mysqli_query($conn, "UPDATE `abouthm` SET `teks` = '$teksabt', `gambar` = '$gambarabt', `readmore` = '$readmore' ");

    if ($gambarlama && $gambarlama != $gambarabt) {
        $old_file = "img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }


    return mysqli_affected_rows($conn);

}


function design($data)
{
    global $conn;
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO `newdesign` VALUES ('$header','$teks',NULL,'$status')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function imgnewdesign($data)
{

    global $conn;
    $gambardsg = htmlspecialchars($data["gambar"]);
    $result = mysqli_query($conn, "SELECT `gambar` FROM `newdesignimg` LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambardsg = img();
    if (!$gambardsg) {
        return false;
    }

    mysqli_query($conn, "UPDATE `newdesignimg` SET  `gambar` = '$gambardsg' ");

    if ($gambarlama && $gambarlama != $gambardsg) {
        $old_file = "img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }


    return mysqli_affected_rows($conn);
}

function deletedsg($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM `newdesign` WHERE `id`='$id' ");
    return mysqli_affected_rows($conn);
}

function editdsg($data)
{
    global $conn;

    $id = $data["id"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    $status = htmlspecialchars($data["status"]);


    $query = "UPDATE `newdesign` SET `header` = '$header', `teks` = '$teks', `status` = '$status' WHERE `id` = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



function sosmed($data)
{
    global $conn;

    $fb = htmlspecialchars($data["facebook"]);
    $tw = htmlspecialchars($data["twitter"]);
    $lin = htmlspecialchars($data["linkedin"]);
    $ig = htmlspecialchars($data["instagram"]);
    $teks = htmlspecialchars($data["teks"]);



    $query = "UPDATE `footersosmed` SET `facebook` = '$fb', `twitter` = '$tw', `linkedin` = '$lin', `instagram` = '$ig', `teks` = '$teks' WHERE `id` = 1";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function footer2($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);



    $query = "UPDATE `footer2` SET `header` = '$header', `teks` = '$teks' WHERE `id` = 11";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function footer3($data)
{
    global $conn;

    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);



    $query = "UPDATE `footer3` SET `header` = '$header', `teks` = '$teks' WHERE `id` = 111";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



function editsrvc($data)
{

    global $conn;

    $id = $data["id"];
    $tekssrvc = htmlspecialchars($data["teks"]);
    $gambarsrvc = htmlspecialchars($data["gambar"]);
    $header = htmlspecialchars($data["header"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `services` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambarsrvc = img();
    if (!$gambarsrvc) {
        return false;
    }

    mysqli_query($conn, "UPDATE `services` SET `header`= '$header',`teks` = '$tekssrvc', `gambar` = '$gambarsrvc' WHERE `id` = '$id' ");

    if ($gambarlama && $gambarlama != $gambarsrvc) {
        $old_file = "img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }


    return mysqli_affected_rows($conn);
}

function rdservice($data)
{

    global $conn;

    $rdsrvc = $data["readmore"];

    $query = "UPDATE `readmoresrvc` SET `readmore` = '$rdsrvc' ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function message($data)
{
    global $conn;

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    mysqli_query($conn, "INSERT INTO `message` VALUES (NULL,'$name','$email','$phone','$message')");
    return mysqli_affected_rows($conn);
}

function readmsg($data)
{
    global $conn;

    $id = $data["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    mysqli_query($conn, "INSERT INTO `messageread` VALUES (NULL,'$name','$email','$phone','$message')");

    mysqli_query($conn, "DELETE FROM `message` WHERE `id`='$id'");
    return mysqli_affected_rows($conn);
}

function deletemsg($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM `messageread` WHERE `id`='$id' ");
    return mysqli_affected_rows($conn);
}

function updmap($data)
{
    global $conn;

    $map = $data["map"];
    mysqli_query($conn, "UPDATE `contactmap` SET `map`='$map' WHERE 1");
    return mysqli_affected_rows($conn);
}

function latest($data)
{
    global $conn;

    $id = $data["id"];
    $post = htmlspecialchars($data["post"]);
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `latestnew` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambar = img();
    if (!$gambar) {
        return false;
    }

    $query = "UPDATE `latestnew` SET `id`='$id',`header`='$header',`teks`='$teks',`post`='$post',`gambar`='$gambar' WHERE `id` = '$id'";

    if ($gambarlama && $gambarlama != $gambar) {
        $old_file = "img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function latestrd($data){
    global $conn;

    $readmore = htmlspecialchars($data["readmore"]);

    $query = "UPDATE `latestnewrd` SET `readmore` = '$readmore'";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function plustesti($data)
{
    global $conn;
    error_reporting(0);
    $h1 = htmlspecialchars($data["header1"]);
    $teks1 = htmlspecialchars($data["teks1"]);
    $img1 = htmlspecialchars($data["img1"]);
    $h2 = htmlspecialchars($data["header2"]);
    $teks2 = htmlspecialchars($data["teks2"]);
    $img2 = htmlspecialchars($data["img2"]);
    $status = htmlspecialchars($data["status"]);

    if (!isset($img1, $img2)) {
        return false;
    }


    $img1 = imgtesti1();
    if (!$img1) {
        return false;
    }

    $img2 = imgtesti2();
    if (!$img2) {
        return false;
    }

    $query = "INSERT INTO `testi` VALUES (NULL,'$h1','$h2','$teks1','$teks2','$img1','$img2','$status')";

    mysqli_query($conn, $query);
    mysqli_affected_rows($conn);
    return true;

}

function imgtesti1()
{
    $namafile = $_FILES['img1']['name'];
    $error = $_FILES['img1']['error'];
    $tmpname = $_FILES['img1']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;

}

function imgtesti2()
{
    $namafile = $_FILES['img2']['name'];
    $error = $_FILES['img2']['error'];
    $tmpname = $_FILES['img2']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;

}

function deletets($id)
{
    global $conn;


    $result = mysqli_query($conn, "SELECT `gambar1`,`gambar2` FROM `testi` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($result);
    $img1 = $row['gambar1'];
    $img2 = $row['gambar2'];


    // Path ke file gambar yang akan dihapus
    $file_path1 = "img/$img1";

    // Periksa apakah file gambar ada
    if (file_exists($file_path1)) {
        // Hapus file gambar
        if (unlink($file_path1)) {
            echo "File gambar berhasil dihapus.";
        } else {
            echo "Gagal menghapus file gambar.";
        }
    } else {
        echo "File gambar tidak ditemukan.";
    }

    // Path ke file gambar yang akan dihapus
    $file_path2 = "img/$img2";

    // Periksa apakah file gambar ada
    if (file_exists($file_path2)) {
        // Hapus file gambar
        if (unlink($file_path2)) {
            echo "File gambar berhasil dihapus.";
        } else {
            echo "Gagal menghapus file gambar.";
        }
    } else {
        echo "File gambar tidak ditemukan.";
    }



    mysqli_query($conn, "DELETE FROM `testi` WHERE `id`='$id' ");
    return mysqli_affected_rows($conn);
}

function edittesti($data)
{
    global $conn;
    error_reporting(0);
    $id = $data["id"];
    $h1 = htmlspecialchars($data["header1"]);
    $teks1 = htmlspecialchars($data["teks1"]);
    $h2 = htmlspecialchars($data["header2"]);
    $teks2 = htmlspecialchars($data["teks2"]);
    $status = htmlspecialchars($data["status"]);
    $img1 = htmlspecialchars($data["img1"]);
    $img2 = htmlspecialchars($data["img2"]);

    if (!isset($img1, $img2)) {
        return false;
    }



    $result = mysqli_query($conn, "SELECT `gambar1`,`gambar2` FROM `testi` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($result);
    $gambarlama1 = $row['gambar1'];
    $gambarlama2 = $row['gambar2'];

    $img1 = imgtesti1();
    if (!$img1) {
        return false;
    }

    $img2 = imgtesti2();
    if (!$img2) {
        return false;
    }

    mysqli_query($conn, "UPDATE `testi` SET `h1`='$h1',`h2`='$h2',`teks1`='$teks1',`teks2`='$teks2',`gambar1`='$img1',`gambar2`='$img2',`status`='$status' WHERE `id` = '$id'");

    if ($gambarlama1 && $gambarlama1 != $img1) {
        $old_file = "img/$gambarlama1";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }


    if ($gambarlama2 && $gambarlama2 != $img2) {
        $old_file = "img/$gambarlama2";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }


    mysqli_affected_rows($conn);
    return true;

}


function plusglr($data)
{
    global $conn;
error_reporting(0);
    $gambar = htmlspecialchars($data["gambar"]);

    $gambar = img();
    if (!$gambar) {
        return false;   
    }

    $query = "INSERT INTO `galeryimg` VALUES (NULL,'$gambar')";
    mysqli_query($conn, $query);
    mysqli_affected_rows($conn);
    return true;
}

function deleteglr($id){
    global $conn;
    error_reporting(0);
    $result = mysqli_query($conn, "SELECT `gambar` FROM `galeryimg` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($result);
    $gambar = $row['gambar1'];
   


    // Path ke file gambar yang akan dihapus
    $file_path1 = "img/$gambar";

    // Periksa apakah file gambar ada
    if (file_exists($file_path1)) {
        // Hapus file gambar
        if (unlink($file_path1)) {
            echo "File gambar berhasil dihapus.";
        } else {
            echo "Gagal menghapus file gambar.";
        }
    } else {
        echo "File gambar tidak ditemukan.";
    }
    
    mysqli_query($conn, "DELETE FROM `galeryimg` WHERE `id`='$id' ");
    return mysqli_affected_rows($conn);
    
}

function edittxtglr($data){
    global $conn;

    $id = $data["id"];
    $header = htmlspecialchars($data["header"]);
    $teks = htmlspecialchars($data["teks"]);

    $query ="UPDATE `galeryteks` SET `header`= '$header',`teks`= '$teks' WHERE `id`='$id'";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function editgaleryimg($data){
    global $conn;

    $id = $data ["id"];
    $gambarglr = htmlspecialchars($data["gambar"]);

    $result = mysqli_query($conn, "SELECT `gambar` FROM `galeryimg` WHERE `id`= '$id'");
    $row = mysqli_fetch_assoc($result);
    $gambarlama = $row['gambar'];

    $gambarglr = imgglr();
    if (!$gambarglr) {
        return false;
    }

    mysqli_query($conn, "UPDATE `galeryimg` SET  `gambar` = '$gambarglr' WHERE `id`= '$id' ");

    if ($gambarlama && $gambarlama != $gambarglr) {
        $old_file = "img/$gambarlama";
        if (file_exists($old_file)) {
            unlink($old_file);
        }
    }


    return mysqli_affected_rows($conn);
}

    

function imgglr(){

    $namafile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }
    //cek ekstensi
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }
    //generate namafile baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;
}


?>