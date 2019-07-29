<?php
include("sabitler.php");
$servername = "localhost";
$username   = "root";
$password   = "1";
$dbname     = "bilgiler";

// Veritabanı bağlantısının oluşturulması
$db = mysqli_connect($servername, $username, $password, $dbname);
// Varsa, bağlantı hatasının ekrana yazdırılarak programın sonlandırılması
if (!$db) { die("Hata oluştu: " . mysqli_connect_error()); }
//echo "Bağlantı tamam!";

if( isset($_POST["adisoyadi"]) ) {
    // Önce EKLEME için SQL hazırlayalım...

    $tuzlu =md5($_POST["parola"].$TUZ);
    $SQL = sprintf("
        INSERT INTO
          acadamtesting
        SET
          adisoyadi   = '%s',
          telno       = '%s',
          parola      = '%s',
          il          = '%s',
          ilce        = '%s',
          mahalle     = '%s',
          cadde       = '%s',
          sokak       = '%s',
          binano      = '%s',
          kapino      = '%s',
          adres       = '%s'  ",
            $_POST["adisoyadi"], $_POST["telno"],
            $tuzlu, $_POST["il"],
            $_POST["ilce"], $_POST["mahalle"],
            $_POST["cadde"], $_POST["sokak"],
            $_POST["binano"], $_POST["kapino"],
            $_POST["adres"] );


    // SQL komutunu MySQL veritabanı üzerinde çalıştır!
    $rows  = mysqli_query($db, $SQL);
     //echo "$SQL";
    echo "<h4>Kayıt eklendi...</h4>";
  }

?>


<h1>Kullanıcı Kayıt Formu</h1>
<form method="post">

  Adı Soyadı:<input required type="text" name="adisoyadi" value="<?php echo $_POST["adisoyadi"];?>">
  <br /><br />
  Telefon Numarasi:<input required type="text" name="telno" value="<?php echo $_POST["telno"];?>">
  <br /><br />
  Parola:<input required type="password" name="parola" value="<?php echo $_POST["parola"];?>">
  <br /><br />
  İL:<select required name='il'>
    <option value="">SEÇİNİZ</option>
    <option value="adana"  ?>Adana</option>
    <option value="artvin"  ?>Artvin</option>
  </select>
    <br /><br />
  İLÇE:<select required name='ilce'>
    <option value="">SEÇİNİZ</option>
    <option value="pendik" ; >Pendik</option>
    <option value="Kadiköy" ; >Kadıköy</option>
  </select>
  <br /><br />
  MAHALLE:<select required name='mahalle'>
    <option value="">SEÇİNİZ</option>
    <option value="bostanci" >Bostancı</option>
    <option value="kurtköy" >Kurtköy</option>
  </select>
  <br /><br />
  Cadde:<input required type="text" name="cadde" value="<?php echo $_POST["cadde"];?>">
  <br /><br />
  Sokak:<input required type="text" name="sokak" value="<?php echo $_POST["sokak"];?>">
  <br /><br />

  Bina No:<input required type="text" name="binano" value="<?php echo $_POST["binano"];?>">
  Kapı No:<input required type="text" name="kapino" value="<?php echo $_POST["kapino"];?>">

  Açık Adres:<input required type="text" name="adres" value="<?php echo $_POST["adres"];?>">
  <br /><br />

  <input type="submit" name="" value="Üye Ekle (insert)">
</form>
