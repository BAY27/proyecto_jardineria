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

                            <button class='btn btn-primary float-right' onclick="cargaOficina()" type='button' data-toggle='modal' data-target='#modalempleado'>
                                Nuevo
                            </button>
                            </div>
                                    <div class="card-body">
                                        <table class='table card-table'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombres</th>
                                                    <th>Puesto</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id='tablaempleado'>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Start Modal -->
            <div class='modal fade' id='modalempleado' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>

                        <div class='modal-header'>
                        <h5 class='modal-title' id='titleLabeloficina'>Nuevo Empleado</h5>
                                <button type="button" onclick="limpiacajas()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form method='post' id='empleado_form'>
                            <div class='modal-body'>
                                <input type='hidden' name='codigo_empleado' id='codigo_empleado' />
                                <div class='form_group'>
                                    <label class='form-control-label' for='nombre'>nombre</label>
                                    
                                        <input type='text' required class='form-control' name='nombre' id='nombre' placeholder='Ingrese elnombre' />
                                   
                                </div>
                                <div class='form_group'>
                                    <label class='form-control-label' for='apellido1'>apellido1</label>
                                   
                                        <input type='text' required class='form-control' name='apellido1' id='apellido1' placeholder='Ingrese elapellido1' />
                                   
                                </div>
                                <div class='form_group'>
                                    <label class='form-control-label' for='apellido2'>apellido2</label>
                                   
                                        <input type='text' required class='form-control' name='apellido2' id='apellido2' placeholder='Ingrese elapellido2' />
                                   
                                </div>
                                <div class='form_group'>
                                    <label class='form-control-label' for='extension'>extension</label>
                                    
                                        <input type='text' required class='form-control' name='extension' id='extension' placeholder='Ingrese elextension' />
                                   
                                </div>
                                <div class='form_group'>
                                    <label class='form-control-label' for='email'>email</label>
                                   
                                        <input type='text' required class='form-control' name='email' id='email' placeholder='Ingrese elemail' />
                                   
                                </div>
                                <div class='form_group'>
                                <label class='form-control-label' for='email'>Oficina</label>
                                    <select onchange=" cargaJefe(this); cargapuesto(this);" name='combo_oficina' id='combo_oficina' class='form-control' aria-label=''>
                                        <option selected>Seleccione una opción</option>
                                    </select>
                                </div>
                                <div class='form_group'>
                                <label class='form-control-label' for='email'>Jefe</label>
                                    <select name='combo_jefe' id='combo_jefe' class='form-control' aria-label=''>
                                        <option selected>Seleccione una opción</option>
                                    </select>
                                </div>
                                <div class='form_group'>
                                <label class='form-control-label' for='email'>Puesto</label>
                                    <select name='puesto' id='puesto' class='form-control' aria-label=''>
                                        <option selected>Seleccione una opción</option>
                                    </select>
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
        
        <script src="empleado.js"></script>
    </body>

    </html>


<?php
} else {
    header('Location:../../index.php');
}
?>