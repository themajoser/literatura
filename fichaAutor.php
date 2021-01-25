<?php
	include("config.php");

	// Recupera los datos de la novela al principio del documento para insertar el título de la misma en el <title> del documento
	$consulta = "SELECT * FROM autores WHERE id_autor=".$_GET["id_autor"]; 
	$resultado = mysqli_query ($conexion, $consulta); 
	$autorInfo = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title><?php echo $autorInfo["nombre"]; ?></title>
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
		echo "<h1>".$autorInfo["nombre"]."</h1>\n";
		echo "<figure class=\"imagenreceta\">\n";
		echo "<img alt=\"Retrato de ".$autorInfo["nombre"]."\" src=\"".$autorInfo["imagen"]."\" />\n";
		echo "</figure>";
		echo "</div>";

		
		// Visualiza los ingredientes
		echo "<h2>Biografía</h2>";
        
		echo '<p>'.$autorInfo["biografia"].'</p>';

		echo "<h2>Obras y reconocimiento</h2>";
        
		echo '<p>'.$autorInfo["obras_reconocimiento"].'</p>';
        	
	?>

    </article>
	</section>
	</div>
    <?php include("comunes/footer.php"); ?>

  </body>
</html>
