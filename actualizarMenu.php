<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos</title>
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

        form {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        table {
            position: relative;
        }
    </style>
</head>

<body>
    <?php
    function actualizar($buscarDni)
    {
        require("DatosConsulta.php");

        $consulta = "SELECT dni, nombre, apellido1, apellido2, operacion, notas FROM personas where dni ='$buscarDni'";


        $resultado = mysqli_query($conexion, $consulta);



        while (($persona = mysqli_fetch_row($resultado)) == true) {


            echo '<div class="cabecera">
            <h1>Actualizacion de Personal</h1><a class="back" href="javascript:history.back()"> Volver Atrás</a>
            </div>
            <form action="validaConsulta.php" method="get">
            <table>
                <tr>
                    <th><label for="dni">Dni</label></th>
                    <th><label for="nombre">Nombre</label></th>
                    <th><label for="apellido1">Apellido1</label></th>
                    <th><label for="apellido2">apellido2</label></th>
                    <th><label for="operacion">Operación</label></th>
                    <th><label for="notas">Notas Persona</label></th>
                </tr>
                <tr>
                    <td><input type="text" name="dni" id="dni" size="10" readonly  value=' . $persona[0] . '></td>
                    <td><input type="text" name="nombre" id="nombre" size="10" value=' . $persona[1] . '></td>
                    <td><input type="text" name="apellido1" id="apellido1" size="10" value=' . $persona[2] . '></td>
                    <td><input type="text" name="apellido2" id="apellido2" size="10" value=' . $persona[3] . '></td>
                    <td><input type="text" name="operacion" id="operacion" size="10" readonly value=' . $persona[4] . '></td>
                    <td><input type="text" name="notas" id="notas" size="10" value=' . $persona[5] . '></td>';

            echo '<table>
            <tr>
                <th><label for="municipio">Municipio</label></th>
                <th><label for="direccion">Dirección</label></th>
            </tr>';

            $consulta4 = "SELECT municipio,direccion FROM direcciones WHERE dni ='$persona[0]'";
            $resultado4 = mysqli_query($conexion, $consulta4);
            $direccion = mysqli_fetch_row($resultado4);
            do {
                echo '<tr><td><input type="text" name="municipio" id="municipio" size="10" value="';
                if (isset($direccion[0])) {
                    echo $direccion[0];
                }
                echo '"></td><td><input type="text" name="direccion" id="direccion" size="10" value="';
                if (isset($direccion[1])) {
                    echo $direccion[1];
                }
                echo '"></td></tr>';
            } while (($direccion = mysqli_fetch_row($resultado4)) == true);


            echo '<table>
                    <tr>
                    <th><label for="matricula">Matrícula</label></th>
                    </tr>';

            $consulta3 = "SELECT matricula FROM matriculas WHERE dni ='$persona[0]'";
            $resultado3 = mysqli_query($conexion, $consulta3);
            $matricula = mysqli_fetch_row($resultado3);
            do {
                echo '<tr><td><input type="text" name="matricula" id="matricula" size="10" value="';
                if (isset($matricula[0])) {
                    echo $matricula[0];
                }
                echo '"></td></tr>';
            } while (($matricula = mysqli_fetch_row($resultado3)) == true);


            echo '</table><table>
                    <tr>
                    <th><label for="telefono">Teléfono</label></th>    
                    </tr>';

            $consulta2 = "SELECT telefono FROM telefonos WHERE dni ='$persona[0]'";
            $resultado2 = mysqli_query($conexion, $consulta2);

            $telefono = mysqli_fetch_row($resultado2);
            do {
                echo '<tr><td><input type="text" name="telefono" id="telefono" size="10" value="';
                if (isset($telefono[0])) {
                    echo $telefono[0];
                }
                echo '"></td></tr>';
            } while (($telefono = mysqli_fetch_row($resultado2)) == true);

            echo '</table><table>
                    <tr>
                        <th><label for="conocidos">Conocidos</label></th>
                        <th><label for="vinculo">Vinculo del Conocidos</label></th>
                    </tr>';

            $consulta4 = "SELECT dniconocido,vinculos FROM conocidos WHERE dni ='$persona[0]'";
            $resultado4 = mysqli_query($conexion, $consulta4);
            $conocido = mysqli_fetch_row($resultado4);
            do {
                echo '<tr><td><input type="text" name="conocidos" id="conocidos" size="10" value="';
                if (isset($conocido[0])) {
                    echo $conocido[0];
                }
                echo '"></td><td><input type="text" name="vinculo" id="vinculo" value="';
                if (isset($conocido[1])) {
                    echo $conocido[1];
                }
                echo '"></td></tr>';
            } while (($conocido = mysqli_fetch_row($resultado4)) == true);




            echo '</table>
                  
            <input  type="submit" name="ActualizarGeneral" id="ActualizarGeneral" value="Actualizar">
        </form>';
        }
    }
    ?>


</body>

</html>