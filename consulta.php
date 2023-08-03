<style>
    table {

        border: 1px solid black;
        margin: auto;
        border-collapse: collapse;

        box-shadow: 5px 5px 5px;
    }

    td,
    th {
        border: 1px solid black;
    }

    th {
        background: linear-gradient(white, rgb(136, 136, 136));


    }

    tr:nth-child(odd) {
        background-color: rgb(200, 200, 200);
    }

    .cabecera {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .back {
        position: absolute;
        right: 28%;
    }

    .todo {
        display: flex;
        flex-direction: column;
        width: 80%;


    }
</style>

<?php

    function consultaPersona($buscar, $opcion)
    {

        require("DatosConsulta.php");
      
        switch ($opcion) {
            case "dni":case "nombre":case "operacion":case "notas":
                $consulta = "SELECT dni, nombre, apellido1, apellido2, operacion, notas FROM personas where $opcion like '%$buscar%'";
                break;
            case "matricula":
                $consulta = "SELECT dni, nombre, apellido1, apellido2, operacion, notas FROM personas NATURAL join matriculas where matricula like '%$buscar%'";
                break;
            case "conocidos":
                $consulta = "SELECT dni, nombre, apellido1, apellido2, operacion, notas FROM personas NATURAL join conocidos where dniconocido like '%$buscar%'";
                break;
            case "fecha":
                $consulta = "SELECT dni, nombre, apellido1, apellido2, operacion, notas FROM personas NATURAL join eventos where fecha like '%$buscar%'";
                break;
            case "direccion":
                $consulta = "SELECT dni, nombre, apellido1, apellido2, operacion, notas FROM personas NATURAL join direcciones where direccion like '%$buscar%'";
                break;
        }

        $resultado = mysqli_query($conexion, $consulta);


        echo "<div class='todo'><div class='cabecera'><h1>Pendejos</h1><a class='back' href='javascript:history.back()'> Volver Atrás</a></div>";
        echo "<table>";
        echo "<tr><th>Dni</th>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Operación</th>
        <th>Notas</th>
        <th>Teléfonos</th>
        <th>Matrículas</th>
        <th>Conocidos</th>
        <th>Vinculo del Conocidos</th>
        <th>Direcciones</th>
        <th colspan='3'>Eventos</th></tr>";

        while (($persona = mysqli_fetch_row($resultado)) == true) {

            echo "<tr><td>";
            echo $persona[0] . "</td><td>";
            echo $persona[1] . "</td><td>";
            echo $persona[2] . "</td><td>";
            echo $persona[3] . "</td><td>";
            echo $persona[4] . "</td><td>";
            echo $persona[5] . "</td><td>";

            $consulta2 = "SELECT telefono FROM telefonos WHERE dni ='$persona[0]'";
            $resultado2 = mysqli_query($conexion, $consulta2);

            while (($telefono = mysqli_fetch_row($resultado2)) == true) {
                echo $telefono[0] . "<br>";
            }
            echo "</td><td>";
            $consulta3 = "SELECT matricula FROM matriculas WHERE dni ='$persona[0]'";
            $resultado3 = mysqli_query($conexion, $consulta3);

            while (($matricula = mysqli_fetch_row($resultado3)) == true) {
                echo $matricula[0] . "<br>";
            }
            echo "</td><td>";
            $consulta4 = "SELECT dniconocido,vinculos FROM conocidos WHERE dni ='$persona[0]'";
            $resultado4 = mysqli_query($conexion, $consulta4);

            while (($conocido = mysqli_fetch_row($resultado4)) == true) {
                echo $conocido[0] . "</td><td>";
                echo $conocido[1];
            }
            echo "</td><td>";
            $consulta4 = "SELECT municipio,direccion FROM direcciones WHERE dni ='$persona[0]'";
            $resultado4 = mysqli_query($conexion, $consulta4);

            while (($direccion = mysqli_fetch_row($resultado4)) == true) {
                echo $direccion[0] . ", $direccion[1]<br>";
            }
            echo "</td><td>";
            $consulta5 = "SELECT fecha,lugar,nota FROM eventos WHERE dni ='$persona[0]'";
            $resultado5 = mysqli_query($conexion, $consulta5);

            while (($evento = mysqli_fetch_row($resultado5)) == true) {
                echo $evento[0] . "</td><td>";
                echo $evento[1] . "</td><td>";
                echo $evento[2];
            }
        }

        echo "</td></tr></table></div>";
    }

?>