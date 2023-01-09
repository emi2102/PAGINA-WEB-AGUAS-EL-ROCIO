<?php require_once "config/conexion.php";
require_once "config/config.php";
?>

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
      if (!empty($user)) {
    $sql = "INSERT INTO pedido(id_usuario, total) VALUES (:id_usuario, :total_pagar)";
    $sql2 = "INSERT INTO pedido_producto(id_usuario, total) VALUES (:id_usuario, :total_pagar)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_usuario',$_SESSION['user_id']);
    $stmt->bindParam(':total_pagar', $_POST['total_pagar']);
    if ($stmt->execute()) {
      $message = 'El pedido se registro con exito';
    } else {
      $message = 'lo siento, el pedido no fue registrado. Revisar que haya añadido elementos al carrito';
    }
  }else{
    $message = 'Por favor inicie sesion para confirmar el pedido';
  }
}
    }else{
    $message = 'Por favor inicie sesion para confirmar el pedido';
  }

  
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrito de Compras</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="estilos.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
<!-- <?php require 'partials/header.php' ?> -->

    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a href="index.php"><img class="navbar-brand tam" src="assets/img/logo1.png" alt="logo"></a>  
                <a class="navbar-brand" href="index.php">Aguas y suministro el rocio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Carrito</h1>
                <p class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="contenedor1">
                        <form action="carrito.php" method="post">
                        <h4>Total a Pagar: <input name="total_pagar" id="total_pagar" readonly value="0.00" class="total"> </h4> 
                        <div class="d-grid gap-2">
                            <button class="btn btn-warning" type="submit" id="btnRegistrar">Registrar pedido</button>
                            </form>
                            <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
                            <?php if(!empty($message)): ?>
    <p> <?= $message ?><br></p>
    <?php endif; ?>
                                
                            <p>Por favor, luego de registrar su pedido, escriba al siguiente numero para formalizar su pago: </p>
                            <p>DATOS DEL PAGO MOVIL: <br>C.I:28.619.685 <br>MERCANTIL<br>+58414-7675878</p>
                            <a class="btn" id="btnWs" href="https://api.whatsapp.com/send?phone=584147675878&text=Hola%2C%20aqui%20le%20envio%20foto%20del%20pago%20de%20mi%20pedido%20de%20aguas%20la%20reliquia%2C%20soy..">Realizar pago al whatssApp</a>
                            <p>O pague directamente por paypal:</p>
            
                            <div id="paypal-button-container"></div>
                    </div>
                         </div>
                         <div class="contenedor1">
                                 <!-- Mapa-->
                                 <div class="mapa">
                                     <hr><p class="m-0 text-center text-white"><iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d15792.062390811896!2d-62.73727628720682!3d8.301245787433514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m5!1s0x8dcbfbd60ce82747%3A0x744c6352b0c97c30!2sAlta%20Vista%2C%20Ciudad%20Guayana%2C%20Bol%C3%ADvar!3m2!1d8.2950251!2d-62.7353277!4m3!3m2!1d8.3053862!2d-62.722778399999996!5e0!3m2!1ses!2sve!4v1673288978271!5m2!1ses!2sve" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                 </div>
   
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
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
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&locale=<?php echo LOCALE; ?>"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        mostrarCarrito();

        function mostrarCarrito() {
            if (localStorage.getItem("productos") != null) {
                let array = JSON.parse(localStorage.getItem('productos'));
                if (array.length > 0) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        async: true,
                        data: {
                            action: 'buscar',
                            data: array
                        },
                        success: function(response) {
                            console.log(response);
                            const res = JSON.parse(response);
                            let html = '';
                            res.datos.forEach(element => {
                                html += `
                            <tr>
                                <td>${element.id}</td>
                                <td>${element.nombre}</td>
                                <td>${element.precio}</td>
                                <td>1</td>
                                <td>${element.precio}</td>
                            </tr>
                            `;
                            });
                            document.getElementById("total_pagar").value =res.total;
                            $('#tblCarrito').html(html);
                            // $('#total_pagar').text(res.total);
                            paypal.Buttons({
                                style: {
                                    color: 'blue',
                                    shape: 'pill',
                                    label: 'pay'
                                },
                                createOrder: function(data, actions) {
                                    // This function sets up the details of the transaction, including the amount and line item details.
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: res.total
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    // This function captures the funds from the transaction.
                                    return actions.order.capture().then(function(details) {
                                        // This function shows a transaction success message to your buyer.
                                        alert('Transaction completed by ' + details.payer.name.given_name);
                                    });
                                }
                            }).render('#paypal-button-container');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            }
        }

        $('#btnRegistrar').click(function(){
        
            
         })
    </script>
</body>

</html>