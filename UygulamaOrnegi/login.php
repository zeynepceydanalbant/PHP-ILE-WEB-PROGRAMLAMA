
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
if($_POST["tur"]=="" ) {//isset($_POST["adisoyadi"]) and
  echo "Tür seçimi yapılmamış."."<br />";
}
if($_POST["adisoyadi"]==""){
  echo "Adı soyadı eksik"."<br />";

}
if($_POST["parola"]==""){
  echo "Parola eksik"."<br />";
}
if(isset($_POST["adisoyadi"]) and $_POST["tur"]!="" and $_POST["adisoyadi"]!="" and $_POST["parola"]!=""){

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
 Adı Soyadı:   <input type="text" required name="adisoyadi" value="<?php echo $_POST["adisoyadi"] ?>">
   <br />  <br />
 Parola:   <input type="password" required name="parola" value="<?php echo $_POST["parola"] ?>">
 <select name="tur" >

    <option selected required value="">Seçiniz</option>
    <option selected required value="M" <?php if($_POST["tur"]=="M") echo "selected";  ?> >Müşteri</option> //
    <option selected required value="E" <?php if($_POST["tur"]=="E") echo "selected";  ?>  >Esnaf</option>
  </select>
   <br />  <br />
 <input type="submit" value="KAYIT">
</form>
