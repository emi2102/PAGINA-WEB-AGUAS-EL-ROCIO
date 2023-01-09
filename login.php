<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /tienda/index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $records = $conn->prepare('SELECT id, email, pass FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['pass'], $results['pass'])) {
      $_SESSION['user_id'] = $results['id'];
      header("location: /tienda/index.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style4.css">
  </head>
  <body>
  <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar sesion</h1>
    <span>o <a href="signup.php">Registrarse</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su correo">
      <input name="pass" type="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Entrar">
    </form>
  </body>
</html>
