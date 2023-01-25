<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Cadastrar</title>

  <link rel="shortcut icon" href="assets/img/favicon.png">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <div class="main-wrapper login-body">
    <div class="login-wrapper">
      <div class="container">
        <img class="img-fluid logo-dark mb-2" src="assets/img/favicon.png" alt="Logo">
        <div class="loginbox">
          <div class="login-right">
            <div class="login-right-wrap">
              <h1>Cadastre - se</h1>
              <p class="account-subtitle">Crie sua conta</p>

              <form class="form" id="form">
                <div class="error-text alert alert-danger alert-dismissible fade show" style="display: none;">Erro</div>
                <div class="form-group">
                  <label class="form-control-label">Nome</label>
                  <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Telefone</label>
                  <input class="form-control" type="text" name="phone">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Endereço de e-mail</label>
                  <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Senha</label>
                  <input class="form-control" type="password" name="passwrd1">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Confirme sua senha</label>
                  <input class="form-control" type="password" name="passwrd2">
                </div>
                <div class="form-group mb-0">
                  <button class="btn btn-lg btn-block btn-primary w-100 submit" type="submit">Cadastrar</button>
                </div>
              </form>

              <!-- <div class="login-or">
                    <span class="or-line"></span>
                    <span class="span-or">or</span>
                  </div>

                  <div class="social-login">
                  <span>Register with</span>
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
                  </div> -->

                  <div class="text-center dont-have">Já tem uma conta? <a href="login.php">Acessar</a></div>
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
    <script src="assets/js/register.js"></script>
</body>

</html>