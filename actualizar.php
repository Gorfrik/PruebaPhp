<?php

function addOperacion($buscarDni, $eleccion)
{
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

function actualizar($dni, $nombre, $apellido1, $apellido2, $notas, $municipio, $direccion, $matricula, $telefono, $conocidos, $vinculo)
{
    require("DatosConsulta.php");
    $sql = "UPDATE personas SET nombre = '$nombre' WHERE personas.Dni = '$dni'";
    $sql2 = "UPDATE personas SET apellido1 = '$apellido1' WHERE personas.Dni = '$dni'";
    $sql3 = "UPDATE personas SET apellido2 = '$apellido2' WHERE personas.Dni = '$dni'";
    $sql5 = "UPDATE personas SET notas = '$notas' WHERE personas.Dni = '$dni'";
    $sql61 = "SELECT municipio from direcciones where Dni = '$dni'";
    $resultado = mysqli_query($conexion, $sql61);
    $consulta = mysqli_fetch_row($resultado);
    if (isset($consulta[0]) == false) {
        $sql6="INSERT into  direcciones (dni,municipio) VALUES ('$dni','$municipio');";
    } else {
        $sql6 = "UPDATE direcciones SET municipio = '$municipio' WHERE direcciones.Dni = '$dni'";
    }
    $sql7 = "UPDATE direcciones SET direccion = '$direccion' WHERE direcciones.Dni = '$dni'";
    $sql8 = "UPDATE matriculas SET matricula = '$matricula' WHERE matriculas.Dni = '$dni'";
    $sql9 = "UPDATE telefonos SET telefono = '$telefono' WHERE telefonos.Dni = '$dni'";
    $sql10 = "UPDATE conocidos SET dniconocido = '$conocidos' WHERE conocidos.Dni = '$dni'";
    $sql11 = "UPDATE conocidos SET vinculos = '$vinculo' WHERE conocidos.Dni = '$dni'";

    if ($conexion->query($sql) === TRUE) {
        echo "<h2 align='center'>nombre actualizado</h2>";
    } else {
        echo "Error: " . $sql . "<br>";
    }
    if ($conexion->query($sql2) === TRUE) {
        echo "<h2 align='center'>apellido1 actualizado</h2>";
    } else {
        echo "Error: " . $sql2 . "<br>";
    }
    if ($conexion->query($sql3) === TRUE) {
        echo "<h2 align='center'>apellido2 actualizado</h2>";
    } else {
        echo "Error: " . $sql3 . "<br>";
    }
    if ($conexion->query($sql5) === TRUE) {
        echo "<h2 align='center'>notas actualizado</h2>";
    } else {
        echo "Error: " . $sql5 . "<br>";
    }
    if ($conexion->query($sql6) === TRUE) {
        echo "<h2 align='center'>municipio actualizado</h2>";
    } else {
        echo "Error: " . $sql6 . "<br>";
    }
    if ($conexion->query($sql7) === TRUE) {
        echo "<h2 align='center'>direccion actualizado</h2>";
    } else {
        echo "Error: " . $sql7 . "<br>";
    }
    if ($conexion->query($sql8) === TRUE) {
        echo "<h2 align='center'>matricula actualizado</h2>";
    } else {
        echo "Error: " . $sql8 . "<br>";
    }
    if ($conexion->query($sql9) === TRUE) {
        echo "<h2 align='center'>telefono actualizado</h2>";
    } else {
        echo "Error: " . $sql9 . "<br>";
    }
    if ($conexion->query($sql10) === TRUE) {
        echo "<h2 align='center'>conocidos actualizado</h2>";
    } else {
        echo "Error: " . $sql10 . "<br>";
    }
    if ($conexion->query($sql11) === TRUE) {
        echo "<h2 align='center'>vinculo actualizado</h2>";
    } else {
        echo "Error: " . $sql11 . "<br>";
    }


    //header("refresh:3;index.php");
    $conexion->close();
}
