<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/cliente.models.php");
error_reporting(0);

$cliente = new cliente;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $cliente->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_cliente = $_POST["codigo_cliente"];
        $datos = array();
        $datos = $cliente->uno($codigo_cliente);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_cliente = $_POST["codigo_cliente"];
        $nombre_cliente = $_POST["nombre_cliente"];
        $nombre_contacto = $_POST["nombre_contacto"];
        $apellido_contacto = $_POST["apellido_contacto"];
        $telefono = $_POST["telefono"];
        $fax = $_POST["fax"];
        $linea_direccion1 = $_POST["linea_direccion1"];
        $linea_direccion2 = $_POST["linea_direccion2"];
        $ciudad = $_POST["ciudad"];
        $region = $_POST["region"];
        $pais = $_POST["pais"];
        $codigo_postal = $_POST["codigo_postal"];
        $codigo_empleado_rep_ventas = $_POST["codigo_empleado_rep_ventas"];
        $limite_credito = $_POST["limite_credito"];

        $datos = array();
        $datos = $cliente->Insertar($codigo_cliente, $nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $codigo_cliente = $_POST["codigo_cliente"];
        $nombre_cliente = $_POST["nombre_cliente"];
        $nombre_contacto = $_POST["nombre_contacto"];
        $apellido_contacto = $_POST["apellido_contacto"];
        $telefono = $_POST["telefono"];
        $fax = $_POST["fax"];
        $linea_direccion1 = $_POST["linea_direccion1"];
        $linea_direccion2 = $_POST["linea_direccion2"];
        $ciudad = $_POST["ciudad"];
        $region = $_POST["region"];
        $pais = $_POST["pais"];
        $codigo_postal = $_POST["codigo_postal"];
        $codigo_empleado_rep_ventas = $_POST["codigo_empleado_rep_ventas"];
        $limite_credito = $_POST["limite_credito"];
        $datos = array();
        $datos = $cliente->Actualizar($codigo_cliente, $nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $codigo_cliente = $_POST["codigo_cliente"];
        $datos = array();
        $datos = $cliente->Eliminar($codigo_cliente);
        echo json_encode($datos);
        break;
}
