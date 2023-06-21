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
                                        
                                        <button onclick="cargaSelectRoles()" class="btn btn-primary float-right" 
                                        data-toggle="modal" data-target="#modalCategoria"> Nueva Categoria de Producto</button>
                                    
                                    </div>
                                    <div class="card-body">
                                        <table width="100%" cellspacing="0" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Gama</th>
                                                    <th>Descripción</th>
                                                    <th>Html</th>
                                                    <th>Imagen</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id='TablaCategorias'></tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Ventanas Modales -->
                <div  class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="titulModalCategoria">Ingresar Categoria de Producto</h5>
                                <button type="button" onclick="limpiar()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="gama_productos_form">
                                <div class="modal-body">
                                 
                                    <div class="form-group">
                                        <label  class="control-label">Gama</label>
                                        <input type="text" name="gama" id="gama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label">Descripcion Texto</label>
                                        <textarea type="text" name="descripcion_texto" id="descripcion_texto" class="form-control" cols="30" rows="10" 
                                        required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label">Descripcion Html</label>
                                        <textarea placeholder="Ingrese un texto" class="form-control"  name="descripcion_html" id="descripcion_html" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label">Imagen de Categoria</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" onclick="limpiar()" data-dismiss="modal">Cerrar</button>
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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="gama_productos.js"></script>
    </body>

    </html>


<?php
} else {
    header('Location:../../index.php');
}
?>