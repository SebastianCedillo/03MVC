<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/kardex.model.php');
error_reporting(0);
$kardex = new Kardex;

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $kardex->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $idKardex = $_POST["idKardex"];
        $datos = array();
        $datos = $kardex->uno($idKardex);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $Estado = $_POST["Estado"];
        $Fecha_Transaccion = $_POST["Fecha_Transaccion"];
        $Cantidad = $_POST["Cantidad"];
        $Valor_Compra = $_POST["Valor_Compra"];
        $Valor_Venta = $_POST["Valor_Venta"];
        $Unidad_Medida_idUnidad_Medida = $_POST["Unidad_Medida_idUnidad_Medida"];
        $Unidad_Medida_idUnidad_Medida1 = $_POST["Unidad_Medida_idUnidad_Medida1"];
        $Unidad_Medida_idUnidad_Medida2 = $_POST["Unidad_Medida_idUnidad_Medida2"];
        $Valor_Ganacia = $_POST["Valor_Ganacia"];
        $IVA = $_POST["IVA"];
        $IVA_idIVA = $_POST["IVA_idIVA"];
        $Proveedores_idProveedores = $_POST["Proveedores_idProveedores"];
        $Productos_idProductos = $_POST["Productos_idProductos"];
        $Tipo_Transaccion = $_POST["Tipo_Transaccion"];
        
        $datos = array();
        $datos = $kardex->insertar($Estado, $Fecha_Transaccion, $Cantidad, $Valor_Compra, $Valor_Venta, $Unidad_Medida_idUnidad_Medida, $Unidad_Medida_idUnidad_Medida1, $Unidad_Medida_idUnidad_Medida2, $Valor_Ganacia, $IVA, $IVA_idIVA, $Proveedores_idProveedores, $Productos_idProductos, $Tipo_Transaccion);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idKardex = $_POST["idKardex"];
        $Estado = $_POST["Estado"];
        $Fecha_Transaccion = $_POST["Fecha_Transaccion"];
        $Cantidad = $_POST["Cantidad"];
        $Valor_Compra = $_POST["Valor_Compra"];
        $Valor_Venta = $_POST["Valor_Venta"];
        $Unidad_Medida_idUnidad_Medida = $_POST["Unidad_Medida_idUnidad_Medida"];
        $Unidad_Medida_idUnidad_Medida1 = $_POST["Unidad_Medida_idUnidad_Medida1"];
        $Unidad_Medida_idUnidad_Medida2 = $_POST["Unidad_Medida_idUnidad_Medida2"];
        $Valor_Ganacia = $_POST["Valor_Ganacia"];
        $IVA = $_POST["IVA"];
        $IVA_idIVA = $_POST["IVA_idIVA"];
        $Proveedores_idProveedores = $_POST["Proveedores_idProveedores"];
        $Productos_idProductos = $_POST["Productos_idProductos"];
        $Tipo_Transaccion = $_POST["Tipo_Transaccion"];

        $datos = array();
        $