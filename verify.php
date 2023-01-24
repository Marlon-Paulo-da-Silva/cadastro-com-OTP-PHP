<!DOCTYPE html>
<html lang="en">

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

              <form action="login.html" autocomplete="off">
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
</body>

</html>