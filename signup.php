<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['direccion']) && !empty($_POST['telefono'])) {
    $sql = "INSERT INTO users (email, pass, nombre, apellido, direccion, telefono) VALUES (:email, :pass, :nombre, :apellido, :direccion, :telefono)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $stmt->bindParam(':pass', $password);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    if ($stmt->execute()) {
      $message = 'El nuevo usuario se registro con exito';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style4.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar sesion</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="correo@ejemplo.com" require>
      <input name="pass" type="password" placeholder="contraseña" require>
      <input name="confirm_password" type="password" placeholder="Confirmar contraseña" require>
      <input name="nombre" type="text" placeholder="nombre" require>
      <input name="apellido" type="text" placeholder="Apellido" require>
      <input name="direccion" type="text" placeholder="Direccion" require>
      <input name="telefono" type="text" placeholder="+58 414-7600000" require>
      <input type="submit" value="Registrar">
    </form>

  </body>
</html>
