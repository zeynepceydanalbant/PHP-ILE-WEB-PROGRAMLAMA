<?php

$servername = "localhost";
$username   = "root";
$password   = "1";
$dbname     = "bilgiler";

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) { die("Hata oluştu: " . mysqli_connect_error()); }
//echo "Bağlantı tamam!";

  $SQL   = "SELECT DISTINCT il FROM referandum ORDER BY il";
  $rows  = mysqli_query($db, $SQL);
  $iller ="";
  while($row = mysqli_fetch_assoc($rows)) {
      $iller .= sprintf(
                "<option value='%s'>%s</option> \n",
                $row["il"], $row["il"]
              );
  }
?>
