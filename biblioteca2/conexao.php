<div>
<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "biblioteca"; 

if($conn = mysqli_connect($host, $username, $password, $dbname)){

         echo"conectado <br>";


}
else{

        echo"não conectado";


}

?>

<a href="index.html"  class="bnt btn-primary ">voltar</a>
</div>
