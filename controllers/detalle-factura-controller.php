<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/detalle_factura.model.php');
error_reporting(0);
$detalle_factura = new Detalle_Factura;

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $detalle_factura->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $idDetalle_Factura = $_POST["idDetalle_Factura"];
        $datos = array();
        $datos = $detalle_factura->uno($idDetalle_Factura);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $Cantidad = $_POST["Cantidad"];
        $Factura_idFactura = $_POST["Factura_idFactura"];
        $Kardex_idKardex = $_POST["Kardex_idKardex"];
        $Precio_Unitario = $_POST["Precio_Unitario"];
        $Sub_Total_item = $_POST["Sub_Total_item"];

        $datos = array();
        $datos = $detalle_factura->insertar($Cantidad, $Factura_idFactura, $Kardex_idKardex, $Precio_Unitario, $Sub_Total_item);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idDetalle_Factura = $_POST["idDetalle_Factura"];
        $Cantidad = $_POST["Cantidad"];
        $Factura_idFactura = $_POST["Factura_idFactura"];
        $Kardex_idKardex = $_POST["Kardex_idKardex"];
        $Precio_Unitario = $_POST["Precio_Unitario"];
        $Sub_Total_item = $_POST["Sub_Total_item"];
        $datos = array();
        $datos = $detalle_factura->actualizar($idDetalle_Factura, $Cantidad, $Factura_idFactura, $Kardex_idKardex, $Precio_Unitario, $Sub_Total_item);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idDetalle_Factura = $_POST["idDetalle_Factura"];
        $datos = array();
        $datos = $detalle_factura->eliminar($idDetalle_Factura);
        echo json_encode($datos);
        break;
}
