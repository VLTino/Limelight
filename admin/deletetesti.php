<?php 
require 'functions.php';

$id = $_GET["id"];

if (deletets($id) > 0){
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'crudtesti.php';
    </script>";
}else {
    echo "<script>
    alert('data gagal dihapus')
    document.location.href = 'crudtesti.php';
    </script>";
}
?>