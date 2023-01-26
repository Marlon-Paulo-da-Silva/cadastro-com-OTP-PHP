<?php
  // se usuário estiver verificado 
 session_start();
 include 'php/db.php';
 $unique_id = $_SESSION['unique_id'];
 if(empty($unique_id)){
  header('Location: register.php');
  exit;
 }

 $qry = mysqli_query($conn, "SELECT * FROM 'cliente_pendente' WHERE unique_id = '{$unique_id}'");
 if(mysqli_num_rows($qry) > 0){
  $row = mysqli_fetch_assoc($qry);
  if($row){
    $_SESSION['verification_status'] = $row['verification_status'];
    if($row['verification_status'] == 'verified'){
      header('Location: index.php');
    }
  }
 }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Confirmação OTP</title>

  <link rel="shortcut icon" href="assets/img/favicon.png">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/verify.css">
</head>

<body>

  <div class="main-wrapper login-body">
    <div class="login-wrapper">
      <div class="container">
        <div class="loginbox">
          <div class="login-right">
            <div class="login-right-wrap">
              <h1>Verificação OTP</h1>
              <p class="account-subtitle">Coloque o código recebido em seu e-mail</p>

              <div class="error-text alert alert-danger alert-dismissible fade show" style="display: none;">Erro</div>


              <form id="form" autocomplete="off">
                <div class="form-group fields-input">
                  <input class="form-control otp_field" type="number" name="otp1" placeholder="0" min="0" max="9" required onpaste="false">
                  <input class="form-control otp_field" type="number" name="otp2" placeholder="0" min="0" max="9" required onpaste="false">
                  <input class="form-control otp_field" type="number" name="otp3" placeholder="0" min="0" max="9" required onpaste="false">
                  <input class="form-control otp_field" type="number" name="otp4" placeholder="0" min="0" max="9" required onpaste="false">
                </div>
                <div class="form-group mb-0">
                  <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Verificação</button>
                </div>
              </form>

              <div class="text-center dont-have">Não recebeu o código? <a href="login.html">Enviar novamente</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/jquery-3.6.0.min.js"></script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/feather.min.js"></script>

  <script src="assets/js/script.js"></script>
  <script src="assets/js/verify.js"></script>
</body>

</html>