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
                                        <h6 class="m-0 font-weight-bold text-primary">Lista de <?php  echo $_SESSION["ruta"] ?></h6>
                                        
                            <button class='btn btn-primary' type='button' data-toggle='modal' data-target='#modalcliente'>
                                Nuevo
                            </button>
                            </div>
                                    <div class="card-body">
                                        <table class='table card-table'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>nombre_cliente</th>
                                                    <th>nombre_contacto</th>
                                                    <th>apellido_contacto</th>
                                                    <th>telefono</th>
                                                    <th>fax</th>
                                                    <th>linea_direccion1</th>
                                                    <th>linea_direccion2</th>
                                                    <th>ciudad</th>
                                                    <th>region</th>
                                                    <th>pais</th>
                                                    <th>codigo_postal</th>
                                                    <th>codigo_empleado_rep_ventas</th>
                                                    <th>limite_credito</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tablacliente'>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Start Modal -->
            <div class='modal fade' id='modalcliente' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>

                        <div class='modal-header'>
                            <h5 class='modal-title' id='titleLabelcliente'>Nuevo cliente</h5>
                            <button type='button' onclick='limpiacajas()' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <form method='post' id='cliente_form'>
                            <div class='modal-body'>
                                <input type='hidden' name='codigo_cliente' id='codigo_cliente' />
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='nombre_cliente'>nombre_cliente</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='nombre_cliente' id='nombre_cliente' placeholder='Ingrese elnombre_cliente' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='nombre_contacto'>nombre_contacto</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='nombre_contacto' id='nombre_contacto' placeholder='Ingrese elnombre_contacto' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='apellido_contacto'>apellido_contacto</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='apellido_contacto' id='apellido_contacto' placeholder='Ingrese elapellido_contacto' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='telefono'>telefono</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='telefono' id='telefono' placeholder='Ingrese eltelefono' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='fax'>fax</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='fax' id='fax' placeholder='Ingrese elfax' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='linea_direccion1'>linea_direccion1</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='linea_direccion1' id='linea_direccion1' placeholder='Ingrese ellinea_direccion1' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='linea_direccion2'>linea_direccion2</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='linea_direccion2' id='linea_direccion2' placeholder='Ingrese ellinea_direccion2' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='ciudad'>ciudad</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='ciudad' id='ciudad' placeholder='Ingrese elciudad' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='region'>region</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='region' id='region' placeholder='Ingrese elregion' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='pais'>pais</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='pais' id='pais' placeholder='Ingrese elpais' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='codigo_postal'>codigo_postal</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='codigo_postal' id='codigo_postal' placeholder='Ingrese elcodigo_postal' />
                                    </div>
                                </div>
                                <div class='bg-light rounded h-100 p-4'>
                                    <h6 class='mb-4'>codigo</h6>
                                    <select name='combo_empleado' id='combo_empleado' class='form-select mb-3' aria-label=''>
                                        <option selected>Seleccione una opción</option>
                                    </select>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='limite_credito'>limite_credito</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='limite_credito' id='limite_credito' placeholder='Ingrese ellimite_credito' />
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
        
        <script src="cliente.js"></script>
    </body>

    </html>


<?php
} else {
    header('Location:../../index.php');
}
?>