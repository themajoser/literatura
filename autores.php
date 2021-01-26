<!DOCTYPE html>
<html>

<head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Listado de autores</title>
        <meta content="Listado de autores" name="description">
        <meta content="Literatura comtemporánea, novelas , películas y poesías. " name="keywords">
        <link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

        <?php include("comunes/header.php"); ?>
        <?php include("comunes/menu.php");
        include("config.php"); ?>
        
        <div id="margin">
                <section>
                        <h1>AUTORES</h1>
                        <article>

                                <p>La literatura española ha dado en toda su historia plumas muy importantes. Actualmente, pese a la crisis que durante unos años ha vivido el sector editorial y ante los bajos índices de lectura que tiene nuestro país, los escritores actuales siguen progresando.
                                        Aunque bien es cierto que los escritores españoles de la actualidad tienen la difícil misión de mantener vigente la tradición de nombres como Cervantes, Lope de Vega, Quevedo, Bécquer, Garcilaso, Lorca, Pérez Galdós y otros tantos.
                                        Algunos de estos autores más leídos en la actualidad y que arrasan en ventas son:

                                </p>
                                <?php
                                // Visualiza las opciones de la lista desplegable de categorias
                                $consulta = "SELECT * FROM autores";
                                $resultado = mysqli_query($conexion, $consulta);
                                echo "<lu>";
                                while ($autor = mysqli_fetch_array($resultado)) {
                                        echo "<li>";
                                        echo "<a href=\"fichaAutor.php?id_autor=";
					echo $autor["id_autor"] . "\">";
					echo  $autor["nombre"] . "</a>";
                                        echo "</li>";
                                }
                                echo "</li>";
                                ?>

                        </article>


                </section>

        </div>
        <div class="vacio"></div>
        <?php include("comunes/footer.php"); ?>

</body>

</html>