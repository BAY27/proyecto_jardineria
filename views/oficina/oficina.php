<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Categoria de Productos";
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php require_once('../html/head.php')  ?>
        
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

                                        <button class='btn btn-primary' type='button' data-toggle='modal' data-target='#modaloficina'>
                                            Nuevo
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <table class='table card-table'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ciudad</th>
                                                    <th>pais</th>
                                                    <th>region</th>
                                                    <th>codigo_postal</th>
                                                    <th>telefono</th>
                                                    <th>linea_direccion1</th>
                                                    <th>linea_direccion2</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tablaoficina'>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Modal -->
                <div class='modal fade' id='modaloficina' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>

                            <div class='modal-header'>
                                <h5 class='modal-title' id='titleLabeloficina'>Nuevo oficina</h5>
                                <button type="button" onclick="limpiacajas()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method='post' id='oficina_form'>
                                <div class='modal-body'>
                                    <input type='hidden' name='codigo_oficina' id='codigo_oficina' />
                                    <div class='form_group'>
                                        <label class='form-control-label' for='ciudad'>Ciudad</label>
                                        <input type='text' required class='form-control' name='ciudad' id='ciudad' placeholder='Ingrese elciudad' />

                                    </div>
                                    <div class='form_group'>
                                        <label class='form-control-label' for='pais'>Pais</label>
                                       
                                            <input type='text' required class='form-control' name='pais' id='pais' placeholder='Ingrese elpais' />
                                       
                                    </div>
                                    <div class='form_group'>
                                        <label class='form-control-label' for='region'>Region</label>
                                        
                                            <input type='text' required class='form-control' name='region' id='region' placeholder='Ingrese elregion' />
                                        
                                    </div>
                                    <div class='form_group'>
                                        <label class='form-control-label' for='codigo_postal'>Codigo Postal</label>
                                       
                                            <input type='text' required class='form-control' name='codigo_postal' id='codigo_postal' placeholder='Ingrese elcodigo_postal' />
                                        
                                    </div>
                                    <div class='form_group'>
                                        <label class='form-control-label' for='telefono'>Telefono</label>
                                        
                                            <input type='text' required class='form-control' name='telefono' id='telefono' placeholder='Ingrese eltelefono' />
                                        
                                    </div>
                                    <div class='form_group'>
                                        <label class='form-control-label' for='linea_direccion1'>Calle 1</label>
                                       
                                            <input type='text' required class='form-control' name='linea_direccion1' id='linea_direccion1' placeholder='Ingrese ellinea_direccion1' />
                                       
                                    </div>
                                    <div class='form_group'>
                                        <label class='form-control-label' for='linea_direccion2'>Calle 2</label>
                                       
                                            <input type='text' required class='form-control' name='linea_direccion2' id='linea_direccion2' placeholder='Ingrese ellinea_direccion2' />
                                       
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

                <!-- Footer -->
                <?php include_once('../html/footer.php') ?>
                <!-- End of Footer -->
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!--scripts-->
        <?php include_once('../html/scripts.php')  ?>
        
        <script src="oficina.js"></script>
    </body>

    </html>


<?php
} else {
    header('Location:../../index.php');
}
?>