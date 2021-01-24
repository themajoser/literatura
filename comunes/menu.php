<?php
	$menu["index.php"] = "Inicio";
	$menu["listado.php"] = "Novelas por género";
	$menu["poesia.php"] = "Poesía";
	$menu["autores.php"] = "Autores";
	$menu["premiados.php"] = "Los más premiados";
    $menu["adaptaciones.php"] = "Adaptaciones"; 
    $menu["buscador.php"] = "Buscador";

	$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<nav>
<ul>
<?php
    foreach ($menu as $pagina=>$rotulo) {
        echo "<li";
        if ($pagina==$pagina_actual) {
            echo " class=\"current_page_item\"";
        }
        echo "><a href=\"$pagina\">$rotulo</a></li>\n";
    }
?>
</ul>
</nav>

