<?php
function personaAlta($dni, $nombre, $apellido1, $apellido2,$direccion,$telefono,$matricula)
    {

        require("DatosConsulta.php");


        $sql = "INSERT INTO personas (dni, nombre, apellido1, apellido2)
    	VALUES ('$dni','$nombre','$apellido1','$apellido2')";
        $sql2 = "INSERT INTO direcciones (dni, direccion)
    	VALUES ('$dni','$direccion')";
        $sql3 = "INSERT INTO telefonos (dni, telefono)
    	VALUES ('$dni','$telefono')";
        $sql4 = "INSERT INTO matriculas (dni, matricula)
    	VALUES ('$dni','$matricula')";


        if ($conexion->query($sql) === TRUE) {
            echo "<h1 align='center'>persona</h1>";
        } else {
            echo "Error: " . $sql . "<br>";
        }
        if ($conexion->query($sql2) === TRUE) {
            echo "<h1 align='center'>direcion</h1>";
        } else {
            echo "Error: " . $sql2 . "<br>";
        }
        if ($conexion->query($sql3) === TRUE) {
            echo "<h1 align='center'>telefono</h1>";
        } else {
            echo "Error: " . $sql3 . "<br>";
        }
        if ($conexion->query($sql4) === TRUE) {
            echo "<h1 align='center'>matricula</h1>";
        } else {
            echo "Error: " . $sql4 . "<br>";
        }
        header("refresh:3;index.php");
        $conexion->close();
    }

