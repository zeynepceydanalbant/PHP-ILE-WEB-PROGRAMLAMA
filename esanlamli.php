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

 if(isset($_POST["kelime"])){

      $SQL = sprintf("
              SELECT *
              FROM `esanlam`
              WHERE (`kelime1` = '%s' OR `kelime2` = '%s') "
              ,$_POST["kelime"],$_POST["kelime"]);

echo "$SQL";
              while($row = mysqli_fetch_assoc($rows)) {
                  echo sprintf("
                    <tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                    </tr>", $row["id"], $row["kelime1"], $row["kelime2"]);
              }

}
 ?>


<form method="post">
 kelime:   <input type="text" name="kelime" value="">
  <input type="submit" value="GİRİŞ YAP">
</form>
