<!DOCTYPE html>
<html lang="es">

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Catálogo de novelas</title>
	<meta content="Marta Águeda Aznar García y Camila de Castro Olena Opayets" name="authors">
	<meta content="Listado de géneros" name="description">
	<meta content="Literatura comtemporánea, novelas , películas y poesías. " name="keywords">
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php include("comunes/header.php"); ?>
	<?php include("comunes/menu.php"); ?>
	<div id="margin">
		<section>
		<article>
			<h1>Novelas por género</h1>

			<?php
			include("config.php");

			if (!isset($_GET["id_genero"])) {

				// Esta parte visualiza un listado de generos
				echo "<p>Esta categoría tiene como propósito clasificar novelas por género, lo que entendemos conforme al significado común de la expresión «literatura de género», que es diferente al de la clasificación tradicional de los «géneros literarios» donde la novela sería un género por sí misma.
				Para que un texto sea considerado novela, entre otras características debe poseer dos esenciales: ser un texto de ficción y estar escrito en prosa.
				La novela es un género que no ha dejado de evolucionar desde sus primeros antecedentes en la antigua Grecia o China. Por tanto, veamos primero una lista de géneros clásicos según el contenido y los subgéneros que han ido surgiendo de los primeros, en ocasiones, al mezclarse con otros géneros.
				</p><img alt='Estanterías de una biblioteca' class='imagenCentro' src='images/novels/1.jpg'>";
				$consulta = "select * from generos";
				$resultado = mysqli_query($conexion, $consulta);

				echo "<ul>\n";
				while ($novela = mysqli_fetch_array($resultado)) {
					echo "<li>";
					echo "<a href=\"listado.php?id_genero=";
					echo $novela["id_genero"] . "\">";
					echo "Género " . $novela["nombre_genero"] . "</a>";

					// Obtiene el número de novelas de la categoría
					$consulta_numero_recetas = "SELECT COUNT(id_novela) FROM novelas WHERE id_genero=" . $novela["id_genero"];
					$resultado_numero_recetas = mysqli_query($conexion, $consulta_numero_recetas);
					$numero_recetas = mysqli_fetch_array($resultado_numero_recetas);
					echo " (" . $numero_recetas["COUNT(id_novela)"] . ")";
					echo "</li>\n";
				}
				echo "</ul>\n";
			} else {

				// Esta parte visualiza las novelas de la categoría previamente
				$consulta = "select * from generos where id_genero=" . $_GET["id_genero"];
				$resultado = mysqli_query($conexion, $consulta);
				while ($novela = mysqli_fetch_array($resultado)) {
					echo '<h2> Género ' . $novela["nombre_genero"] . '<h2>';
					echo "<img  class='imagesGenero' alt=\"Portada de el libro " . $novela["nombre_genero"] . "\" src=\"" . $novela["imagen"] . "\" />\n";
					echo '<h3>' . $novela["descripcion_genero"] . '<h3>';
					
				}

				$consulta = "select * from novelas where id_genero=" . $_GET["id_genero"];
				$resultado = mysqli_query($conexion, $consulta);
				echo "<ul>\n";
				while ($novela = mysqli_fetch_array($resultado)) {
					echo "<li>";
					echo "<a href=\"fichaNovela.php?id_novela=";
					echo $novela["id_novela"] . "\">";
					echo $novela["titulo"] . "</a>";
					echo "</li>\n";
				}
				echo "</ul>\n";
			}

			?>
		  </article>
		</section>
	</div>
	<div class="vacio3"></div>
	<?php include("comunes/footer.php"); ?>

</body>

</html>