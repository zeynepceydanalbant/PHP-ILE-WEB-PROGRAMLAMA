<?php
$servername = "localhost";
$dbname = "bilgiler";
$username="root";
$password= "1";

$db = mysqli_connect($servername,$username,$password,$dbname);

if(!db){die("Hata mesaji:" .mysqli_connect_error(););}

 ?>

 <h1>Kayit Listesi</h1>
 <table border=1 cellpadding=5 cellspacing=0</table >
   <tr>
     <td>Kayıt#</td>
     <td>SAYI1</td>
     <td>SAYI2</td>
   </tr>
   <?php
    $SQL   = "SELECT id, sayi1, sayi2 FROM sayilar ORDER BY id ";
    $rows  = mysqli_query($db, $SQL);

   while ($row = mysqli_fetch_assoc($rows)) {
     // code...
     echo sprintf("
       <tr>
         <td>%s</td>
         <td>%s</td>
         <td>%s</td>
       </tr>", $row["id"], $row["sayi1"], $row["sayi2"]);
   }


    ?>

    </table>
