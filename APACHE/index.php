<?php
  require "paginas/header.php";
?>
<main>
	<?php
		//recebe o valor da pagina (GET)
		$pagina = $_GET["pagina"] ?? "home";

		//$paginas = home -> paginas/home.php
		$pagina = "paginas/{$pagina}.php";

		//verificar se a página
		if ( file_exists($pagina) ) {
			//incluir a minha página
			include $pagina;
		} else {
			include "paginas/erro.php";
		}


	?>
</main>


<?php
    require "paginas/footer.php";
?>
