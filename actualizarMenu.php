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
        form{
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        table{
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
            <th><label for="notas">Notas</label></th>
            </tr>
            <tr>
            <td><input type="text" name="dni" id="dni" size="10" value=' . $persona[0] . '></td>
            <td><input type="text" name="nombre" id="nombre" size="10" value=' . $persona[1] . '></td>
            <td><input type="text" name="apellido1" id="apellido1" size="10" value=' . $persona[2] . '></td>
            <td><input type="text" name="apellido2" id="apellido2" size="10" value=' . $persona[3] . '></td>
            <td><input type="text" name="operacion" id="operacion" size="10" value=' . $persona[4] . '></td>
            <td><input type="text" name="notas" id="notas"></td value=' . $persona[5] . '></td>
            </tr>
            </table>';
            
            echo '<table>
            <tr>
            <th><label for="direccion">Dirección 1</label></th>
            <th><label for="municipio">Municipio 1</label></th>
            </tr>';
            
            $consulta4 = "SELECT municipio,direccion FROM direcciones WHERE dni ='$persona[0]'";
            $resultado4 = mysqli_query($conexion, $consulta4);
            
            while (($direccion = mysqli_fetch_row($resultado4)) == true) {
                echo '<tr><td><input type="text" name="municipio" id="municipio" size="10" value=' . $direccion[0] . '></td>
                        <td><input type="text" name="direccion" id="direccion" size="10" value=' . $direccion[1] . '></td></tr>';
                        break;
                    }
                    echo '<table>
                    <tr>
                    <th><label for="matricula">Matrícula 1</label></th>
                    </tr>';
                    
                    $consulta3 = "SELECT matricula FROM matriculas WHERE dni ='$persona[0]'";
                    $resultado3 = mysqli_query($conexion, $consulta3);
                    
                    while (($matricula = mysqli_fetch_row($resultado3)) == true) {
                        echo '<tr><td><input type="text" name="matricula" id="matricula" size="10" value=' . $matricula[0].'></td></tr>';
                    }
                    
                    echo '</table><table>
                    <tr>
                    <th><label for="telefono">Teléfono 1</label></th>    
                    </tr>';
                    
                    $consulta2 = "SELECT telefono FROM telefonos WHERE dni ='$persona[0]'";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    
                    while (($telefono = mysqli_fetch_row($resultado2)) == true) {
                        echo '<tr><td><input type="text" name="telefono" id="telefono" size="10" value=' . $telefono[0] . '></td></tr>';
                    }
                    echo '</table><table>
                    <tr>
                        <th><label for="conocidos">Conocidos 1</label></th>
                        <th><label for="vinculo">Vinculo del Conocidos 1</label></th>
                    </tr>';
                    
                    $consulta4 = "SELECT dniconocido,vinculos FROM conocidos WHERE dni ='$persona[0]'";
                    $resultado4 = mysqli_query($conexion, $consulta4);
                    
                    while (($conocido = mysqli_fetch_row($resultado4)) == true) {
                         
                        echo'<tr><td><input type="text" name="conocidos" id="conocidos" size="10" value=' . $conocido[0] . '></td>
                        <td><input type="text" name="vinculo" id="vinculo" value=' . $conocido[1] . '></td></tr>';    
                    }
                    
                    
                    echo '</table>
                  
            <input  type="submit" name="alta" id="alta" value="Dar de alta">
        </form>';
        }
    }
    ?>


</body>

</html>