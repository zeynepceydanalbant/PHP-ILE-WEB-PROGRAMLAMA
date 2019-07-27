
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

if(isset($_POST["sayi1"])){

     $SQL = sprintf("
               INSERT INTO
               sayilar
               SET
                  sayi1 = '%s',
                  sayi2 = '%s'  ",
           $_POST["sayi1"], $_POST["sayi2"]);


           // SQL komutunu MySQL veritabanı üzerinde çalıştır!
           $rows  = mysqli_query($db, $SQL);

 echo "<h4>Kayıt eklendi...</h4>";
}
 ?>

 <h1>Veritabanı Bağlantısı  </h1>
 <form method="post">
 Sayi1:   <input type="number" name="sayi1" value="">
   <br />  <br />
 Sayi2:   <input type="number" name="sayi2" value="">
   <br />  <br />
 <input type="submit" value="GİRİŞ YAP">
</form>
<?php include("aktarma.php"); ?>
