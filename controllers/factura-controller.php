<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/factura.model.php');
error_reporting(0);
$factura = new Factura;

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $factura->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $idFactura = $_POST["idFactura"];
        $datos = array();
        $datos = $factura->uno($idFactura);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $Fecha = $_POST["Fecha"];
        $Sub_total = $_POST["Sub_total"];
        $Sub_total_iva = $_POST["Sub_total_iva"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $Clientes_idClientes = $_POST["Clientes_idClientes"];

        $datos = array();
        $datos = $factura->insertar($Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA,$Clientes_idClientes);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idFactura = $_POST["idFactura"];
        $Fecha = $_POST["Fecha"];
        $Sub_total = $_POST["Sub_total"];
        $Sub_total_iva = $_POST["Sub_total_iva"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $Clientes_idClientes = $_POST["Clientes_idClientes"];
        $datos = array();
        $datos = $factura->actualizar($idFactura, $Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA,$Clientes_idClientes);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idFactura = $_POST["idFactura"];
        $datos = array();
        $datos = $factura->eliminar($idFactura);
        echo json_encode($datos);
        break;
}
