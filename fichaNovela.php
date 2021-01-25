<?php
include("config.php");

// Recupera los datos de la novela al principio del documento para insertar el título de la misma en el <title> del documento
$consulta = "SELECT * FROM novelas WHERE id_novela=" . $_GET["id_novela"];
$resultado = mysqli_query($conexion, $consulta);
$novelaInfo = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title><?php echo $novela["titulo"]; ?></title>
	<meta content="novela de Gastronomía Murciana" name="description">
	<meta content="Gastronomía Murciana, novelas de cocina" name="keywords">
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php include("comunes/header.php"); ?>
	<?php include("comunes/menu.php"); ?>
	<div id="margin">
		<section>
			<article>

				<?php
				// Visualiza los datos básicos de la novela
				echo "<div class='imagen'>";
				echo "<h1>" . $novelaInfo["titulo"] . "</h1>\n";
				echo "<figure class=\"imagenreceta\">\n";
				echo "<img alt=\"Portada de el libro " . $novelaInfo["titulo"] . "\" src=\"" . $novelaInfo["imagen"] . "\" />\n";
				echo "<figcaption>" . $novelaInfo["titulo"] . "</figcaption>\n";
				echo "</figure>";
				echo "</div>";
				// Visualiza la categoría de la novela
				$consulta_categoria = "select * from generos where id_genero=" . $novelaInfo["id_genero"];
				$resultado_genero = mysqli_query($conexion, $consulta_categoria);
				$categoria = mysqli_fetch_array($resultado_genero);
				echo "<p><strong>Categoría:</strong> " . $categoria["nombre_genero"] . "</p>\n";
				echo "<p>" . nl2br($novelaInfo["descripcion"]) . "</p>\n";

				// Visualiza los ingredientes
				echo "<h2>Autor</h2>";
				$consulta_autor_nombre = "SELECT * FROM autores WHERE id_autor=" . $novelaInfo["id_autor"];
				$resultado_autor_nombre = mysqli_query($conexion, $consulta_autor_nombre);
				$autores = mysqli_fetch_array($resultado_autor_nombre);
				if ($autores["nombre"] == '') {
					$autores["nombre"] = "No disponible";
				}

				echo "<a href=\"fichaAutor.php?id_autor=";
				echo $autores["id_autor"] . "\">";
				echo  $autores["nombre"] . "</a>";



				?>

			</article>
		</section>
	</div>
	<?php include("comunes/footer.php"); ?>

</body>

</html>