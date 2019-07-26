<?php
$servername = "localhost";
$username   = "root";
$password   = "1";
$dbname     = "bilgiler";

// Veritabanı bağlantısının oluşturulması
$db = mysqli_connect($servername, $username, $password, $dbname);
// Varsa, bağlantı hatasının ekrana yazdırılarak programın sonlandırılması
if (!$db) { die("Hata oluştu: " . mysqli_connect_error()); }
//echo "Bağlantı tamam!";
 ?>

<h1>Kayıt Liste</h1>

<table border=1 cellpadding=5 cellspacing=0>
  <tr>
    <td>Kayıt#</td>
    <td>SAYI1</td>
    <td>SAYI2</td>
  </tr>
  <?php
  $SQL   = "SELECT id, sayi1, sayi2 FROM sayilar ORDER BY id ";
  $rows  = mysqli_query($db, $SQL);

  while($row = mysqli_fetch_assoc($rows)) {
      echo sprintf("
        <tr>
          <td>%s</td>
          <td>%s</td>
          <td>%s</td>
        </tr>", $row["id"], $row["sayi1"], $row["sayi2"]);
  }

  ?>
</table>
