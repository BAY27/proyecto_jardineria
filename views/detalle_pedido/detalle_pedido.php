<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Categoria de Productos";
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php require_once('../html/head.php')  ?>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <?php require_once('../html/menu.php') ?>
            <!-- End of Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                    <?php include_once('../html/header.php')  ?>
                    <!-- End of Topbar -->

                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION["ruta"] ?></h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Lista de <?php echo $_SESSION["ruta"] ?></h6>

                                        <button onclick="cargaSelectRoles()" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalCategoria"> Nueva Categoria de Producto</button>

                                    </div>
                                    <div class="card-body">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>cantidad</th>
                                                <th>precio_unidad</th>
                                                <th>numero_linea</th>
                                            </tr>
                                        </thead>
                                        <tbody id='tabladetalle_pedido'>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal fade' id='modaldetalle_pedido' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>

                            <div class='modal-header'>
                                <h5 class='modal-title' id='titleLabeldetalle_pedido'>Nuevo detalle_pedido</h5>
                                <button type='button' onclick='limpiacajas()' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <form method='post' id='detalle_pedido_form'>
                                <div class='modal-body'>
                                    <input type='hidden' name='codigo_pedido' id='codigo_pedido' /><input type='hidden' name='codigo_producto' id='codigo_producto' />
                                    <div class='row mb-3'>
                                        <label class='form-control-label' for='cantidad'>cantidad</label>
                                        <div class='col-sm-10'>
                                            <input type='text' required class='form-control' name='cantidad' id='cantidad' placeholder='Ingrese elcantidad' />
                                        </div>
                                    </div>
                                    <div class='row mb-3'>
                                        <label class='form-control-label' for='precio_unidad'>precio_unidad</label>
                                        <div class='col-sm-10'>
                                            <input type='text' required class='form-control' name='precio_unidad' id='precio_unidad' placeholder='Ingrese elprecio_unidad' />
                                        </div>
                                    </div>
                                    <div class='row mb-3'>
                                        <label class='form-control-label' for='numero_linea'>numero_linea</label>
                                        <div class='col-sm-10'>
                                            <input type='text' required class='form-control' name='numero_linea' id='numero_linea' placeholder='Ingrese elnumero_linea' />
                                        </div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' name='action' value='add' class='btn btn-primary'> Guardar</button>
                                    <button type='button' class='btn btn-dark' data-bs-dismiss='modal' onclick='limpiacajas()'>Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include_once('../html/footer.php') ?>
                <!-- End of Footer -->
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!--scripts-->
        <?php include_once('../html/scripts.php')  ?>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="gama_productos.js"></script>
    </body>

    </html>


<?php
} else {
    header('Location:../../index.php');
}
?>