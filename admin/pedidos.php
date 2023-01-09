<?php
require_once "../config/conexion.php";
// if (isset($_POST)) {
//     if (!empty($_POST)) {
//         $nombre = $_POST['nombre'];
//         $query = mysqli_query($conexion, "INSERT INTO categorias(categoria) VALUES ('$nombre')");
//         if ($query) {
//             header('Location: categorias.php');
//         }
//     }
// }
include("includes/header.php");
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Id del usuario</th>
                        <th>Total del pedido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM pedido");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['id_usuario']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                            <td>
                                <!-- <form method="post" action="eliminar.php?accion=cli&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>