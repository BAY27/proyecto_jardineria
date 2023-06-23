<?php
                require_once("../../Config/sesiones.php");
                if (isset($_SESSION["Usuario_IdRoles"])) {
                    $_SESSION["ruta"] = "empleado";
                ?> <!DOCTYPE html> 
<html lang='es'> 
 <?php require_once('../Html/head.php') ?> 
</head> 
<body> 
<div class='container-xxl position-relative bg-white d-flex p-0'>
                <!-- Spinner Start -->
                <div id='spinner' class='show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center'>
                    <div class='spinner-border text-primary' style='width: 3rem; height: 3rem;' role='status'>
                        <span class='sr-only'>Cargando...</span>
                    </div>
                </div> <?php  require_once('../Html/menu.php') ?> 
 <div class='content'>
              
                <?php require_once('../Html/header.php') ?> 
 <?php  require_once('../Html/menu.php') ?> 
   <div class='container-fluid pt-4 px-4'>
                    <div class='bg-light text-center rounded p-4'>
                        <div class='d-flex align-items-center justify-content-between mb-4'>
                            <h6 class='mb-0'>Lista de empleado </h6>
                           
                            <button class='btn btn-primary' type='button' data-bs-toggle='modal' data-bs-target='#modalempleado'>
                                Nuevo
                            </button>
                        </div>
                        <div class='table-responsive'>
                            <table class='table text-start align-middle table-bordered table-hover mb-0'>
                                <thead> 
 <div class='table-responsive text-nowrap'>
                <table class='table card-table'>
                  <thead><tr> 
<th>#</th><th>nombre</th><th>apellido1</th><th>apellido2</th><th>extension</th><th>email</th><th>codigo_oficina</th><th>codigo_jefe</th><th>puesto</th>
 </tr>
        </thead>
        <tbody id='tablaempleado'>
        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 
 <?php require_once('../Html/footer.php') ?>
  </div> 
 <a href='#' class='btn btn-lg btn-primary btn-lg-square back-to-top'><i class='bi bi-arrow-up'></i></a></div>  
      <!-- Start Modal -->  
<div class='modal fade' id='modalempleado' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                  
                    <div class='modal-header'>
                      <h5 class='modal-title' id='titleLabelempleado'>Nuevo empleado</h5>
                      <button type='button' onclick='limpiacajas()' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <form method='post' id='empleado_form'>
                    <div class='modal-body'>
<input type='hidden' name='codigo_empleado' id='codigo_empleado'  /><div class='row mb-3'>
                                <label class='form-control-label' for='nombre'>nombre</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='nombre' id='nombre' placeholder='Ingrese elnombre' />
                                    </div></div><div class='row mb-3'>
                                <label class='form-control-label' for='apellido1'>apellido1</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='apellido1' id='apellido1' placeholder='Ingrese elapellido1' />
                                    </div></div><div class='row mb-3'>
                                <label class='form-control-label' for='apellido2'>apellido2</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='apellido2' id='apellido2' placeholder='Ingrese elapellido2' />
                                    </div></div><div class='row mb-3'>
                                <label class='form-control-label' for='extension'>extension</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='extension' id='extension' placeholder='Ingrese elextension' />
                                    </div></div><div class='row mb-3'>
                                <label class='form-control-label' for='email'>email</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='email' id='email' placeholder='Ingrese elemail' />
                                    </div></div><div class='bg-light rounded h-100 p-4'>
                        <h6 class='mb-4'>codigo</h6>
                        <select name='combo_oficina' id='combo_oficina' class='form-select mb-3' aria-label=''>
                        <option selected>Seleccione una opción</option>
                    </select>
                       </div><div class='bg-light rounded h-100 p-4'>
                        <h6 class='mb-4'>codigo</h6>
                        <select name='combo_jefe' id='combo_jefe' class='form-select mb-3' aria-label=''>
                        <option selected>Seleccione una opción</option>
                    </select>
                       </div><div class='row mb-3'>
                                <label class='form-control-label' for='puesto'>puesto</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='puesto' id='puesto' placeholder='Ingrese elpuesto' />
                                    </div></div> 
 </div>
                <div class='modal-footer'>
                    <button type='submit' name='action' value='add' class='btn btn-primary'> Guardar</button>
                    <button type='button' class='btn btn-dark' data-bs-dismiss='modal' onclick='limpiacajas()'>Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div> 
  <!--End Modal -->  
   <?php require_once('../Html/scripts.php') ?>
                <script src='./empleado.js'></script>
                </body>
            
                </html>
            
            <?php
            } else {
                header('Location:../../index.php');
            }
            
            ?> 
