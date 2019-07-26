
  <h1>Giriş Kayıt Formu  </h1>
  <form method="post">
  Kullanıcı Adınız:   <input type="text" name="user" value="">
    <br />  <br />
  Parolanız:   <input type="password" name="pass" value="">
    <br />  <br />
  <input type="submit" value="GİRİŞ YAP">
</form>

<?php
@session_start(); //oturum acildi
if(isset($_POST["user"])){
  if($_POST["user"]=="zeynepceyda" and $_POST["pass"]="1234"){
  $_SESSION["GirisBasarili"]==1;
  $_SESSION["adi"]=$_POST["user"];
  $_SESSION["adi"]=$_POST["user"];
  header("location: bilgi1.php");
  die();
  }
  else {
      echo "Giriş hatalı!";
      $_SESSION["GirisBasarili"] = 0;
    }
}




 ?>
