<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "my_db";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    //$con = mysqli_connect('localhost', 'root', '',’db_contact’);
      if(!$conn){
          echo "not connected";
          die('Could not Connect MySql Server:' .mysql_error());
        }else{
            echo "connected successfully";
        }
?>