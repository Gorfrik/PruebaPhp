<?php 

function addOperacion($buscarDni, $eleccion){
require("DatosConsulta.php");


$sql = "UPDATE `personas` SET `Operacion` = '$eleccion' WHERE `personas`.`Dni` = '$buscarDni'";


if ($conexion->query($sql) === TRUE) {
    echo "<h1 align='center'>Actualizacion completada</h1>";
} else {
    echo "Error: " . $sql . "<br>";
}

header("refresh:3;index.php");
$conexion->close();
}

function actualizar(){


    
}




?>