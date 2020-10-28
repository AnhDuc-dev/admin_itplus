<?php 
    $host = 'localhost';
    $user = 'root';
    $passw = '';
    $database = 'php0720_itplus';

    $conn = mysqli_connect($host ,$user ,$passw ,$database) or die("Can't not");

    if ($conn){
        mysqli_set_charset($conn, 'utf8');
    }else{
        echo "cant connect";
    }

?>