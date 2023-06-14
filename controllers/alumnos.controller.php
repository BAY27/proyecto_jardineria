<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/alumnos.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase alumnos
$Alumnos = new AlumnosModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Alumnos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idAlumno = $_POST['idAlumno'];
        $datos = array();
        $datos = $Alumnos->uno($idAlumno);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $Nombres = $_POST['Nombres'];
        $Apellidos = $_POST['Apellidos'];
        $Direccion = $_POST['Direccion'];
        $datos = array();
        $datos = $Alumnos->Insertar($Nombres, $Apellidos, $Direccion);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idAlumno = $_POST['idAlumno'];
        $Nombres = $_POST['Nombres'];
        $Apellidos = $_POST['Apellidos'];
        $Direccion = $_POST['Direccion'];
        $datos = array();
        $datos = $Alumnos->Actualizar($idAlumno, $Nombres, $Apellidos, $Direccion);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idAlumno = $_POST['idAlumno'];
        $datos = array();
        $datos = $Alumnos->Eliminar($idAlumno);
        echo json_encode($datos);
        break;
}
