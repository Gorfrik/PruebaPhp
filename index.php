<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>

</head>

<body>
    <h1>Buscando a Memo</h1>
    <a href="alta.html">Dar de alta</a>
    <a href="baja.html">Dar de baja</a>
    <a href="actualizar.html">Actualizar</a>
    <form action="validaConsulta.php" method="get">
        <table width="15%" align="center">
            <tr>
                <td><select name="opcion" id="opcion">
                        <option value="dni">Dni</option>
                        <option value="nombre">Nombre</option>
                        <option value="direccion">Dirección</option>
                        <option value="matricula">Matricula</option>
                        <option value="fecha">Fecha evento</option>
                        <option value="conocidos">Amigos</option>
                        <option value="operacion">Operación</option>
                        <option value="notas">Notas</option>
                    </select></td>
                <td>
                    <input type="text" name="busqueda" id="busqueda">
                </td>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Buscar"></td>
            </tr>
        </table>
    </form>
    <h2 align="center">Asignar operación</h2>
    <form action="validaConsulta.php" method="get">
        <table width="15%" align="center">
            <tr>
                <td></td>
                <td><label for="dni"></label>Dni</td>
            </tr>
            <tr>
                <td><select name="eleccion" id="eleccion">
                        <?php
                        include("DatosConsulta.php");
                        $consulta = "select codoperacion from operaciones";
                        $resultado = mysqli_query($conexion, $consulta);
                        while (($operacion = mysqli_fetch_row($resultado)) == true) {
                            echo "<option value='$operacion[0]'>$operacion[0]</option>";
                        }
                        ?>
                    </select></td>
                <td>
                    <input type="text" name="dni" id="dni">
                </td>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="enviarOp" id="enviarOp" value="Buscar"></td>
            </tr>
        </table>
    </form>






</body>

</html>