<?php
//TODO:Clase Alumnos es un modelo
require_once('../config/config.php');
class AlumnosModel{
    //TODO:Funcion para obtener todos los registros de la base de datos
    public function todos()
    {
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Alumno`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function uno($idAlumno){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Alumno` where idAlumno=$idAlumno ";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Insertar($Nombres, $Apellidos, $Direccion){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = " INSERT INTO `Alumno`(`Nombres`, `Apellidos`, `Direccion`) VALUES ('$Nombres','$Apellidos','$Direccion')";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function Actualizar($idAlumno,$Nombres, $Apellidos, $Direccion){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "UPDATE `Alumno` SET `Nombres`='$Nombres',`Apellidos`='$Apellidos',`Direccion`='$Direccion' WHERE idAlumno=$idAlumno";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function Eliminar($idAlumno){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Alumno` WHERE idAlumno=$idAlumno ";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
}