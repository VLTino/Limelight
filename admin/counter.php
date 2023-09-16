<?php

$conn = mysqli_connect("localhost", "root", "", "companyprofile");
// query untuk mengambil data pengunjung
$sql = "SELECT counter FROM visitor";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  // data pengunjung ditemukan, update nilai counter
  $row = mysqli_fetch_assoc($result);
  $counter = $row['counter'] + 1;
  $sql = "UPDATE visitor SET counter = $counter";
  mysqli_query($conn, $sql);
} else {
  // data pengunjung belum ada, insert data baru
  $counter = 1;
  $sql = "INSERT INTO visitor (counter) VALUES ($counter)";
  mysqli_query($conn, $sql);
}
?>