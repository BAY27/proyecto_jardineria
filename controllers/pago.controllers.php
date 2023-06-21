<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/pago.models.php");
error_reporting(0);

$pago = new PagosModel;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $pago->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_cliente = $_POST["codigo_cliente"];
        $id_transaccion = $_POST["id_transaccion"];

        $datos = array();
        $datos = $pago->uno($codigo_cliente,$id_transaccion);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_cliente = $_POST["codigo_cliente"];
        $forma_pago = $_POST["forma_pago"];
        $id_transaccion = $_POST["id_transaccion"];
        $fecha_pago = $_POST["fecha_pago"];
        $total = $_POST["total"];

        $datos = array();
        $datos = $pago->Insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
   
    case 'eliminar':
        $codigo_cliente = $_POST["codigo_cliente"];
        $datos = array();
        $datos = $pago->Eliminar($codigo_cliente);
        echo json_encode($datos);
        break;
}
