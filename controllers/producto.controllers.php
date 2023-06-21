<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/producto.models.php");
error_reporting(0);

$producto = new productosModel;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $producto->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $codigo_producto = $_POST["codigo_producto"];
        $datos = array();
        $datos = $producto->uno($codigo_producto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $codigo_producto = $_POST["codigo_producto"];
        $nombre = $_POST["nombre"];
        $gama = $_POST["gama"];
        $dimensiones = $_POST["dimensiones"];
        $proveedor = $_POST["proveedor"];
        $descripcion = $_POST["descripcion"];
        $cantidad_en_stock = $_POST["cantidad_en_stock"];
        $precio_venta = $_POST["precio_venta"];
        $precio_proveedor = $_POST["precio_proveedor"];

        $datos = array();
        $datos = $producto->Insertar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $codigo_producto = $_POST["codigo_producto"];
        $nombre = $_POST["nombre"];
        $gama = $_POST["gama"];
        $dimensiones = $_POST["dimensiones"];
        $proveedor = $_POST["proveedor"];
        $descripcion = $_POST["descripcion"];
        $cantidad_en_stock = $_POST["cantidad_en_stock"];
        $precio_venta = $_POST["precio_venta"];
        $precio_proveedor = $_POST["precio_proveedor"];
        $datos = array();
        $datos = $producto->Actualizar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $codigo_producto = $_POST["codigo_producto"];
        $datos = array();
        $datos = $producto->Eliminar($codigo_producto);
        echo json_encode($datos);
        break;
}
