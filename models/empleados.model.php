<?php
//TODO: Requerimientos 
require_once('../config/configJar.php');
class EmpleadoModel
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from empleado";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($codigo_empleado)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM empleado WHERE codigo_empleado = $codigo_empleado";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($codigo_empleado,$nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into empleado(codigo_empleado,nombre,apellido1,apellido2,extension,email,codigo_oficina,codigo_jefe,puesto) values ($codigo_empleado, '$nombre', '$apellido1', '$apellido2', '$extension', '$email', '$codigo_oficina', $codigo_jefe,  '$puesto')";
        
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($codigo_empleado, $nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "update empleado set nombre='$nombre',apellido1='$apellido1',apellido2='$apellido2',extension='$extension',email='$email',codigo_oficina='$codigo_oficina',codigo_jefe=$codigo_jefe,puesto='$puesto', where codigo_empleado= $codigo_empleado";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($codigo_empleado)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from empleado where codigo_empleado = $codigo_empleado";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
    public function ultimoRegistro (){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT codigo_empleado FROM empleado ORDER by codigo_empleado DESC LIMIT 1;";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function filtroOficina($codigo_oficina) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from empleado where codigo_oficina='$codigo_oficina'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function filtropuesto($codigo_oficina) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "select DISTINCT puesto from empleado where codigo_oficina='$codigo_oficina'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
}
