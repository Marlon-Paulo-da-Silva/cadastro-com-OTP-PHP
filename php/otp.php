<?php

  session_start();

  $otp1 = $_POST['otp1'];
  $otp2 = $_POST['otp2'];
  $otp3 = $_POST['otp3'];
  $otp4 = $_POST['otp4'];

  $unique_id = $_SESSION['unique_id'];
  $session_otp = $_SESSION['otp'];
  $otp = $otp1.$otp2.$otp3.$otp4;

  if(!empty($otp)){
    if($otp == $session_otp){
      $sql = mysqli_query($conn, "SELECT * FROM cliente_pendente WHERE unique_id = '{$unique_id}' AND otp = '{$otp}'");
      if(mysqli_num_rows($sql) > 0){
        $null_otp = 0;
      }
    }
  }

  echo "<pre>";
  print_r($_SESSION['unique_id']);
  echo "</pre>";
  exit();
  
?>