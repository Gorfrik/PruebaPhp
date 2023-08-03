<?php
function TramitaBaja($dni)
    {

        require("DatosConsulta.php");

        $sql="delete from personas where dni='$dni'";

        if ($conexion->query($sql) === TRUE) {
            echo "<h1 align='center'>Suspechoso Liquidado</h1>";
        } else {
            echo "Error: " . $sql . "<br>";
        }
     
        header("refresh:3;index.php");
        $conexion->close();
    }

