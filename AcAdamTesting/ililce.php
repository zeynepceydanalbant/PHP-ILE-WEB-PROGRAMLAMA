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


<?php

$SEHIR = $_POST["sehir"];
$SQL   = "SELECT ilce FROM referandum WHERE il='$SEHIR' ORDER BY ilce ";
$rows  = mysqli_query($db, $SQL);


$KayitSayisi = mysqli_num_rows($rows);
if ($KayitSayisi == 0) {
  // echo "Veri bulunamadı !"; die();
}

if( isset( $_POST["sehir"])) { // Şehir seçimi yapılmış




      while($row = mysqli_fetch_assoc($rows)) {

          $ilce .= sprintf(
                        "<option value='%s'>%s</option> \n",
                        $row["ilce"], $row["ilce"]
                      );
      }
}


mysqli_close($db);

?>


<form method="post">
  Lütfen şehir seçiniz:
  <select name="sehir" >
    <?php echo $iller; ?>
  </select>
  <input type="submit" value="Getir!">
</form>
<form method="post">
  Lütfen ilce seçiniz:
  <select name="ilce"  >
    <?php echo $ilce; ?>
  </select>
</form>
