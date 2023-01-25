<?php
  session_start();
  
  include_once 'db.php';

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $passwrd1 = $_POST['passwrd1'];
  $passwrd2 = $_POST['passwrd2'];
  $role = 'user';
  $verification_status = '0';

  if(!empty($name) && !empty($phone) && !empty($email) && !empty($passwrd1) && !empty($passwrd2)){
    // se senha coincidem
    if($passwrd1 != $passwrd2){
      echo "Confirmação de senha não coincide";
      exit;
    } else {
      $password_hash = password_hash($passwrd1, PASSWORD_DEFAULT);
    }
    
    // se e-mail for válido
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      // checar se e-mail já existe
      $sql = mysqli_query($conn, "SELECT email FROM cliente WHERE email = '{$email}'");
      if(mysqli_num_rows($sql) > 0){
        echo "$email - já existe";
      } else {
        $random_id = rand(time(), 100000000); // cria um usuário unico
        $otp = mt_rand(1111, 9999); // cria um otp de 4 dígitos

        // inserir dados na tabela
        // echo "<pre>";
        // echo "INSERT INTO `cliente_pendente` (`unique_id`, `name`, `phone`, `email`, `passwrd`, `otp`, `verification_status`, `role`)
        // VALUES (({$random_id}), '{$name}', '{$email}', '{$phone}', '{$password_hash}', '{$otp}', '{$verification_status}', '{$role}')
        // ";
        // echo "</pre>";
        // exit();
        
        $sql2 = mysqli_query($conn, "INSERT INTO `cliente_pendente` (`unique_id`, `name`, `phone`, `email`, `passwrd`, `otp`, `verification_status`, `role`)
        VALUES (({$random_id}), '{$name}', '{$email}', '{$phone}', '{$password_hash}', '{$otp}', '{$verification_status}', '{$role}')
        ");

        if($sql2){
          $lastinsert = mysqli_insert_id($conn);
          $_SESSION['unique_id'] = $random_id;
          $_SESSION['email'] = $email;
          $_SESSION['otp'] = $otp;

          if($otp){
            $receiver = $email;
            $subject = "From: $name <$email>";
            $body = "Oi, $name \n para verificar o seu cadastro digite o código:  $otp";
            $sender = "FROM: marlon.pauloo@gmail.com";

            if(mail($receiver, $subject, $body, $sender)){
              echo "Success";
            } else {
              echo "Problema ao enviar e-mail!!  ". mysqli_error($conn);
            }
          } else {
            echo "Algo deu errado !!";
          }

        } else {
          echo "Algo deu errado !!";
        }
        
      }

    } else {
      echo "$email - E-mail inválido";
    }


  } else {
    echo "Preencha todos os campos";
  }

?>