<?php
//Bu dosya , program içinde kullanılan sabit değişkenleri tutar
$TUZ= "ğş?/8.2Wc<*";
//bu sabit md5 sifreleme icin kullanilir
?>


<?php
//include("sabitler.php");
$servername = "localhost";
$username   = "root";
$password   = "1";
$dbname     = "bilgiler";

// Veritabanı bağlantısının oluşturulması
$db = mysqli_connect($servername, $username, $password, $dbname);
// Varsa, bağlantı hatasının ekrana yazdırılarak programın sonlandırılması
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
            $tuzlu, $_POST["sehir"],
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

  Adı Soyadı:
  <input required type="text" name="adisoyadi" value="<?php echo $_POST["adisoyadi"];?>">
  <br /><br />

  Telefon Numarasi:
  <input required type="text" name="telno" value="<?php echo $_POST["telno"];?>">
  <br /><br />

  Parola:
  <input required type="password" name="parola" value="<?php echo $_POST["parola"];?>">
  <br /><br />

  İL:
  <select name="sehir" > <?php echo $iller; ?></select>
  <br /><br />

  İLÇE:
  <select required name='ilce'>
  <option value="">SEÇİNİZ</option>
  <option value="pendik" ; >Pendik</option>
  <option value="Kadiköy" ; >Kadıköy</option>
  </select>
  <br /><br />

  MAHALLE:
  <select required name='mahalle'>
    <option value="">SEÇİNİZ</option>
    <option value="bostanci" >Bostancı</option>
    <option value="kurtköy" >Kurtköy</option></select>
  <br /><br />

  Cadde:
  <input required type="text" name="cadde" value="<?php echo $_POST["cadde"];?>">
  <br /><br />

  Sokak:
  <input required type="text" name="sokak" value="<?php echo $_POST["sokak"];?>">
  <br /><br />

  Bina No:
  <input required type="text" name="binano" value="<?php echo $_POST["binano"];?>">

  Kapı No:
  <input required type="text" name="kapino" value="<?php echo $_POST["kapino"];?>">

  Açık Adres:<input required type="text" name="adres" value="<?php echo $_POST["adres"];?>">
  <br /><br />

  <input type="submit" name="" value="Üye Ekle (insert)">

</form>
