<?php
//TODO: archivos requeridos
require_once('../config/configUsu.php');
class RolesModel
{
    public function todos(){  //TODO: CProcedimeinto para obtener todos los registros de la BDD
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM roles ";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
}
