

<?php
//busqueda persona
if (isset($_GET["enviando"])) {

    $buscar = $_GET["busqueda"];

    $opcion = $_GET["opcion"];

    require("consulta.php");
    consultaPersona($buscar, $opcion);
}
//actualizar operacion
if (isset($_GET["enviarOp"])) {

    $buscarDni = $_GET["dni"];

    $eleccion = $_GET["eleccion"];

    require("actualizar.php");
    addOperacion($buscarDni, $eleccion);
}
//actualizar datos generales
if (isset($_GET["enviarAc"])) {

    $buscarAc = $_GET["dniAc"];

    require("actualizarMenu.php");
    actualizar($buscarAc);
}
if (isset($_GET["ActualizarGeneral"])) {

    $dni = $_GET["dni"];
    $nombre = $_GET["nombre"];
    $apellido1 = $_GET["apellido1"];
    $apellido2 = $_GET["apellido2"];
    $notas = $_GET["notas"];
    $municipio = $_GET["municipio"];
    $direccion = $_GET["direccion"];
    $matricula = $_GET["matricula"];
    $telefono = $_GET["telefono"];
    $conocidos = $_GET["conocidos"];
    $vinculo = $_GET["vinculo"];

    require("actualizar.php");
    actualizar($dni,$nombre,$apellido1,$apellido2,$notas,$municipio,$direccion,$matricula,$telefono,$conocidos,$vinculo);
}
//alta general
if (isset($_GET["alta"])) {

    $dni = $_GET["dni"];
    $nombre = $_GET["nombre"];
    $apellido1 = $_GET["apellido1"];
    $apellido2 = $_GET["apellido2"];
    $direccion = $_GET["direccion"];
    $telefono = $_GET["telefono"];
    $matricula = $_GET["matricula"];



    require("alta.php");
    personaAlta($dni, $nombre, $apellido1, $apellido2, $direccion, $telefono, $matricula);
}

if (isset($_GET["baja"])) {

    $dni = $_GET["busqueda"];


    require("baja.php");
    TramitaBaja($dni);
}
?>