<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/oficina.models.php");
error_reporting(0);

$oficina = new OficinasModel;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $oficina->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_oficina = $_POST["codigo_oficina"];
        $datos = array();
        $datos = $oficina->uno($codigo_oficina);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_oficina = $_POST["codigo_oficina"];
        $ciudad = $_POST["ciudad"];
        $pais = $_POST["pais"];
        $region = $_POST["region"];
        $codigo_postal = $_POST["codigo_postal"];
        $telefono = $_POST["telefono"];
        $linea_direccion1 = $_POST["linea_direccion1"];
        $linea_direccion2 = $_POST["linea_direccion2"];

        $datos = array();
        $datos = $oficina->Insertar($codigo_oficina, $ciudad, $pais, $region, $codigo_postal, $telefono, $linea_direccion1, $linea_direccion2);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $codigo_oficina = $_POST["codigo_oficina"];
        $ciudad = $_POST["ciudad"];
        $pais = $_POST["pais"];
        $region = $_POST["region"];
        $codigo_postal = $_POST["codigo_postal"];
        $telefono = $_POST["telefono"];
        $linea_direccion1 = $_POST["linea_direccion1"];
        $linea_direccion2 = $_POST["linea_direccion2"];
        $datos = array();
        $datos = $oficina->Actualizar($codigo_oficina, $ciudad, $pais, $region, $codigo_postal, $telefono, $linea_direccion1, $linea_direccion2);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $codigo_oficina = $_POST["codigo_oficina"];
        $datos = array();
        $datos = $oficina->Eliminar($codigo_oficina);
        echo json_encode($datos);
        break;
}
