<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/iva.model.php');
error_reporting(0);
$iva = new Iva;

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $iva->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $idIVA = $_POST["idIVA"];
        $datos = array();
        $datos = $iva->uno($idIVA);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $Valor = $_POST["Valor"];

        $datos = array();
        $datos = $iva->insertar($Detalle, $Estado, $Valor);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idIVA = $_POST["idIVA"];
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $Valor = $_POST["Valor"];
        $datos = array();
        $datos = $iva->actualizar($idIVA, $Detalle, $Estado, $Valor);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idIVA = $_POST["idIVA"];
        $datos = array();
        $datos = $iva->eliminar($idIVA);
        echo json_encode($datos);
        break;
}
