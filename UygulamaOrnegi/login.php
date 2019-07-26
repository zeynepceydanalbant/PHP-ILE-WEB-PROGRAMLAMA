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

if(isset($_POST["adisoyadi"])){

     $SQL = sprintf("
               INSERT INTO
               kullanicilar
               SET
                  adisoyadi = '%s',
                  parola = '%s'  ,
                  tur = '%s'  ",
           $_POST["adisoyadi"],$_POST["parola"], $_POST["tur"]);


           // SQL komutunu MySQL veritabanı üzerinde çalıştır!
           $rows  = mysqli_query($db, $SQL);

 echo "<h4>Kayıt eklendi...</h4>";
}
?>

 <h1>Veritabanı Bağlantısı  </h1>
 <form method="post">
 Adı Soyadı:   <input type="text" name="adisoyadi" value="">
   <br />  <br />
 Parola:   <input type="password" name="parola" value="">
 <select name="tur" >
    <option selected value="">Seçiniz</option>
    <option selected value="M">Müşteri</option>
    <option selected value="E">Esnaf</option>
  </select>
   <br />  <br />
 <input type="submit" value="GİRİŞ YAP">
</form>
