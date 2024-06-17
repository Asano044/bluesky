<?php
include_once("../conexao.php");
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Blue Sky | Login</title>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./delete.css">
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="../assets/img/logo_BS.png" type="image/x-icon">



</head>
<body>
  <header>

<div id="container">
<img class="logo" src="../assets/img/logo_BS.png" />


<h2> Área Administrativa</h2>

<section class="welcome">
<p>Para efetuar o seu login, informe o seu usuário <br> (ex.:50056)
e a senha com os quatro últimos dígitos do seu CPF.</p>

<ul class="buttons">
<li><a class="primary" href="#">Login</a></li>
</ul>
</section>  
  
<form id="formulario" class="hidden" action="index.php" method="post">
 
<section>
<div class="field">
<label for="registro"><i class='bx bx-user-check'></i></label>
<input type="text" name="registro" placeholder="Informe o seu usuário">
</div>
    
<div class="field">
<label for="password"><i class='bx bx-memory-card'></i></label>
<input type="password" name="password" placeholder="Insira sua senha">
</div>
</section>

<?php 
  if (isset($_POST['btn-enviar'])) {
    $registro = $_POST['registro'];
    $password = $_POST['password'];

    $_SESSION['registro'] = $registro;
    $_SESSION['password'] = $password;

    $consulta = "SELECT usuario, senha FROM login WHERE usuario='$registro' AND senha='$password'";
    $query = mysqli_query($mysqli, $consulta) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($query) > 0) {
      header("Location: formulario.php");
    } else {
      ?>
      <p style="color: red; font-size: 16px">Não encontrado usuário fornecido.</p>
      <?php
    }
  }
?>

<ul class="buttons">
<li><input type="submit" value="Log In" name="btn-enviar" class="primary disabled"></li>
<li><a href="#" class="minor">&#10229; Voltar</a></li>
</ul>
</form>
</div>
</header>



<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
