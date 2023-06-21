<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/detalle_pedido.models.php");
error_reporting(0);

$detalle_pedido = new detalle_pedido;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $detalle_pedido->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_pedido = $_POST["codigo_pedido"];
        $codigo_producto = $_POST["codigo_producto"];
        $datos = array();
        $datos = $detalle_pedido->uno($codigo_pedido, $codigo_producto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_pedido = $_POST["codigo_pedido"];
        $codigo_producto = $_POST["codigo_producto"];
        $cantidad = $_POST["cantidad"];
        $precio_unidad = $_POST["precio_unidad"];
        $numero_linea = $_POST["numero_linea"];

        $datos = array();
        $datos = $detalle_pedido->Insertar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $codigo_pedido = $_POST["codigo_pedido"];
        $codigo_producto = $_POST["codigo_producto"];
        $cantidad = $_POST["cantidad"];
        $precio_unidad = $_POST["precio_unidad"];
        $numero_linea = $_POST["numero_linea"];
        $datos = array();
        $datos = $detalle_pedido->Actualizar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $codigo_pedido = $_POST["codigo_pedido"];
        $codigo_producto = $_POST["codigo_producto"];
        $datos = array();
        $datos = $detalle_pedido->Eliminar($codigo_pedido,$codigo_producto);
        echo json_encode($datos);
        break;
}
