<?php 
require 'functions.php';

$id = $_GET["id"];

if ( deleteglr($id) > 0){
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'crudgalery.php';
    </script>";
}else {
    echo "<script>
    alert('data gagal dihapus')
    document.location.href = 'crudgalery.php';
    </script>";
}
?>