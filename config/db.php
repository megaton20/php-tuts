<?php
 $conn = mysqli_connect('localhost', 'megaton', '123456' ,'php_cookie');

 if(!$conn){
     echo 'connection error: ' .  mysqli_connect_error();
 }

?>