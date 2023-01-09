<?php require_once "config/conexion.php"; ?>

<?php
  session_start();

  require 'database.php';
$user='';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, pass FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = '';

    if (count($results) > 0 && $results['email']!='') {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Aguas y suministro el rocio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="estilos.css" rel="stylesheet"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet"/>
    <!-- <link href="estilos.css" rel="stylesheet"/> -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" >

</head>

<body>
    <a href="#" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>
    <!-- Navigation-->
    <div class="container navbar2">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img class="navbar-brand tam" src="assets/img/logo1.png" alt="">
                <a class="navbar-brand" href="#">Aguas y suministro el rocio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <a href="#" class="nav-link" category="all">Todo</a>
                        <?php
                        $query = mysqli_query($conexion, "SELECT * FROM categorias");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <a href="#" class="nav-link" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                        <?php } ?>
                        <?php if(!$user==''): ?>
                            <div class="resp">
                                 <p>Bienvenid@ <?= $user['email']; ?></p>
                                  tu sesion ha sido iniciada.
                                <a class="exit" href="logout.php">
                                    Salir
                                </a>
                            </div>
                        <?php else: ?>
                            <!-- <p class="">Iniciar sesion o registrar</p> -->
                                <div class="links-ini">
                                    <a href="login.php" class="ini">Iniciar sesion</a> o
                                    <a href="signup.php" class="regi">Registrar</a>
                                </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <!-- <header class="bg-dark py-5"> -->
    <div class="slideshow">
		<ul class="slider">
			<li>
				<img src="assets/img/1.png" alt="">
				<!-- <section class="caption">
					 <h1>Lorem ipsum 1</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quis ipsa, id quidem quisquam unde.</p> -->
				<!-- </section> -->
			</li>
			<li>
				<img src="assets/img/2.png" alt="">
				<!-- <section class="caption">
					 <h1>Lorem ipsum 2</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quis ipsa, id quidem quisquam unde.</p> -->
				<!-- </section>  -->
			</li>
			<li>
				<img src="assets/img/3.png" alt="">
				<!-- <section class="caption">
					<h1>Lorem ipsum 3</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quis ipsa, id quidem quisquam unde.</p> -->
				<!-- </section>  -->
			</li>
			<li>
				<img src="assets/img/4.png" alt="">
				<!-- <section class="caption">
					 <h1>Lorem ipsum 4</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quis ipsa, id quidem quisquam unde.</p> -->
				<!-- </section> --> 
			</li>
            <li>
				<img src="assets/img/5.png" alt="">
				<!-- <section class="caption">
					 <h1>Lorem ipsum 4</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quis ipsa, id quidem quisquam unde.</p> -->
				<!-- </section> --> 
			</li>
		</ul>

		<ol class="pagination">
			
		</ol>
	
		<div class="left">
			<span class="fa fa-chevron-left"></span>
		</div>

		<div class="right">
			<span class="fa fa-chevron-right"></span>
		</div>

	</div>
    <!-- </header> -->
    <!-- <?php if(!$user==''): ?>
      <br> Bienvenid@. <?= $user['email']; ?>
      <br>Tu sesion ha sido iniciada.
      <a href="logout.php">
        Salir
      </a>
    <?php else: ?> -->
      <!-- <p class="">Iniciar sesion o registrar</p> -->
        <!-- <div class="links-ini">
            <a href="login.php" class="ini">Iniciar sesion</a> o
            <a href="signup.php" class="regi">Registrar</a>
        </div>
    <?php endif; ?> -->
<!--  -->
    <?php $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
                $result = mysqli_num_rows($query); ?>
<!-- Buscador -->
<form method="post" action="<?php 
if(!empty($_POST)) {
				$valor = $_POST['buscar'];
				if (!empty($valor)){
					$where = "WHERE Nombre LIKE '%$valor%'";
					 }
					 if (!empty($where)){
$query = mysqli_query($conexion, "SELECT * FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria $where");
                $result = mysqli_num_rows($query);
				 }
}
?>"> <br><br>
<div class="buscar">
    <input type="text" name="buscar" class="bus1" placeholder="Buscar por Nombre"/>
    <input type="submit" name="buscando" class="bus" value="Buscar"/>
</div>

    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
                                <!-- Product image-->
                                <img class="card-img-top" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
                                        <p><?php echo $data['descripcion']; ?></p>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through"><?php echo $data['precio_normal'] ?></span>
                                        <?php echo $data['precio_rebajado'] ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div>
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>

            </div>
        </div>
    </section>
</form>   
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Emilmar C, Paola S, Angel P, Jairo N. 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>