<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/pedido.models.php");
error_reporting(0);

$pedido = new pedido;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $pedido->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_pedido = $_POST["codigo_pedido"];
        $datos = array();
        $datos = $pedido->uno($codigo_pedido);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_pedido = $_POST["codigo_pedido"];
        $fecha_pedido = $_POST["fecha_pedido"];
        $fecha_esperada = $_POST["fecha_esperada"];
        $fecha_entrega = $_POST["fecha_entrega"];
        $estado = $_POST["estado"];
        $comentarios = $_POST["comentarios"];
        $codigo_cliente = $_POST["codigo_cliente"];

        $datos = array();
        $datos = $pedido->Insertar($codigo_pedido, $fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $codigo_pedido = $_POST["codigo_pedido"];
        $fecha_pedido = $_POST["fecha_pedido"];
        $fecha_esperada = $_POST["fecha_esperada"];
        $fecha_entrega = $_POST["fecha_entrega"];
        $estado = $_POST["estado"];
        $comentarios = $_POST["comentarios"];
        $codigo_cliente = $_POST["codigo_cliente"];
        $datos = array();
        $datos = $pedido->Actualizar($codigo_pedido, $fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $codigo_pedido = $_POST["codigo_pedido"];
        $datos = array();
        $datos = $pedido->Eliminar($codigo_pedido);
        echo json_encode($datos);
        break;
}
