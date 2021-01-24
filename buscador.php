<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Buscador</title>
    <meta content="Buscador de novelas de cocina" name="description">
    <meta content="Gastronomía Murciana, novelas de cocina" name="keywords">
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

    <?php include("comunes/header.php"); ?>
    <?php include("comunes/menu.php"); ?>
    <div id="margin">
    <article>
        <h1>Buscador</h1>

        <?php
        include("config.php");

        // Comprueba si la página se abre como resultado de haber pulsado el botón de enviar
        if (!isset($_REQUEST["accion"])) {

            // Si  no es así muestra el formulario de  búsqueda
        ?>


            <div class="search">
                <form action="buscador.php" method="post" target="_blank">

                    <label for="searcher">Buscador general</label>
                    <input name="searcher" id="searcher" type="search" name="busquedamusica" placeholder="Título">
                    <label for="select_genero">Género: </label>
                    <select id="select_genero" name="id_genero">
                        <option value="0">Cualquier género</option>
            <?php
            // Visualiza las opciones de la lista desplegable de categorias
            $consulta = "SELECT * FROM generos";
            $resultado = mysqli_query($conexion, $consulta);
            while ($genero = mysqli_fetch_array($resultado)) {
                echo "<option value=\"" . $genero["id_genero"] . "\">";
                echo $genero["nombre_genero"];
                echo '</option>\n';
            }
            ?>

            </select>
            <input type="submit" name="accion" value="Buscar" />
            </form>
            </div>

        <?php

            // En caso de que la página se abra como resultado de haber pulsado el botón de enviar muestra los resultados
        } else {
            $consulta = "SELECT * from novelas";

            if ($_POST["id_genero"] > 0 and $_POST["searcher"] == "") {
                $consulta = "SELECT * FROM novelas WHERE id_genero=" . $_POST["id_genero"];
            }

            if ($_POST["id_genero"] == 0 and $_POST["searcher"] <> "") {
                $consulta = "SELECT * FROM novelas WHERE titulo like '%" . $_POST["searcher"] . "%'";
            }

            if ($_POST["id_genero"] > 0 and $_POST["searcher"] <> "") {
                $consulta = "SELECT * FROM novelas WHERE id_genero=" . $_POST["id_genero"] . " and titulo like '%" . $_POST["searcher"] . "%'";
            }

            $resultado = mysqli_query($conexion, $consulta);
            echo "<p>Novelas recuperadas: " . mysqli_num_rows($resultado) . "</p>\n";
            echo "<ul>\n";
            while ($novela = mysqli_fetch_array($resultado)) {
                echo "<li>";
                echo "<a href=\"fichaNovela.php?id_novela=" . $novela["id_novela"] . "\">";
                echo $novela["titulo"] . "</a>";
                echo "</li>\n";
            }
            echo "</ul>\n";
        }

        ?>



    </article>
    </div>
    <?php include("comunes/footer.php"); ?>

</body>

</html>