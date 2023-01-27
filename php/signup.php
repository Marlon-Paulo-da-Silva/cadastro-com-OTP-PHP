<?php
  session_start();
  
  include_once 'db.php';
  include_once 'hash.php';

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
        // $hash = mt_rand(1111, 9999); // cria um hash de confirmação de cadastro
        $hash = generateToken(); // cria um hash de confirmação de cadastro

        // inserir dados na tabela
        // echo "<pre>";
        // echo "INSERT INTO `cliente_pendente` (`unique_id`, `name`, `phone`, `email`, `passwrd`, `hash`, `verification_status`, `role`)
        // VALUES (({$random_id}), '{$name}', '{$email}', '{$phone}', '{$password_hash}', '{$hash}', '{$verification_status}', '{$role}')
        // ";
        // echo "</pre>";
        // exit();
        
        $sql2 = mysqli_query($conn, "INSERT INTO `cliente_pendente` (`unique_id`, `name`, `phone`, `email`, `passwrd`, `hash`, `verification_status`, `role`)
        VALUES (({$random_id}), '{$name}', '{$email}', '{$phone}', '{$password_hash}', '{$hash}', '{$verification_status}', '{$role}')
        ");

        if($sql2){
          $lastinsert = mysqli_insert_id($conn);
          $_SESSION['unique_id'] = $random_id;
          $_SESSION['email'] = $email;

          if($hash){
            $receiver = $email;
            $subject = "From: $name <$email>";
            $body = "Oi, $name \n para verificar o seu cadastro clique no link:\n\n http://localhost:8000/confirm.php?verification=$hash";
            
            $sendMail = sendMail($name, $receiver, $subject, $body);

            if($sendMail == "Success"){
              echo "Success";
            } else {
              echo "Problema ao enviar e-mail!!  ". $sendMail;
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