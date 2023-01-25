<?php
  $conn = new mysqli('localhost', 'root', '', 'lojaapi');
  if(!$conn){
    echo "Conexão falhou !!" . mysqli_connect_error();
    die();
  }
?>