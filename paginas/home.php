<?php
	//verificar se a variável $pagina não existe
	if ( !isset ( $pagina ) ) exit;

?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<h1>Veiculos em Destaque:</h1>
<div class="row">
	<?php
		$sql = "SELECT * FROM veiculo INNER JOIN marca ON veiculo.marca_id = marca.id ORDER BY rand() LIMIT 8";
		$result = mysqli_query($con, $sql);

		while ( $dados = mysqli_fetch_array( $result ) ) {
			//separar
			$id = $dados["id"];
			$veiculo = $dados["modelo"];
			$marca = $dados["marca"];
			$imagem = $dados["fotodestaque"];
			$valor = $dados["valor"];
			$tipo = $dados["tipo"];
			$anof = $dados["anofabricacao"];
			$anom = $dados["anomodelo"];

			if ( empty ( $tipo ) ) {
				$valor = "R$ " . number_format($valor, 2, ",", ".");
			} else {
				$valor = "R$ " . number_format($valor, 2, ",", ".");
			}

			$extensao = pathinfo('produtos/{$imagem}', PATHINFO_EXTENSION);
			
			echo "
				<div class=\"col-12 col-md-3 mb-3 text-center blocoTamanho\">
					<div class=\"blocoProduto border\">
						<div class=\"row-12 align-items-center blocoImagem\">
							<a href=\"index.php?pagina=produto&id={$id}\">
								<img src=\"produtos/{$imagem}{$extensao}\" alt=\"{$veiculo}\" class=\"w-100\">
							</a>
						</div>
						<div class=\"pl-3 pr-3 row-12\">
							<h4 class=\"tamanhoTituloProduto\">{$marca} - {$veiculo}</h4>
						</div>
						<p class=\"pl-3 pr-3\">{$tipo} - {$anof}/{$anom}</p>
						<div class=\"row-12 pl-3 pr-3 tamanhoPreco\">
							<p class=\"valor\">{$valor}</p>
						</div>		
						<div class=\"row-12 pl-3 pr-3 align-items-end tamanhoBotaoDetalhes\">
							
							<p>
								<a href=\"index.php?pagina=produto&id={$id}\" class=\"btn btn-lg w-100 detalhes\">Detalhes
								</a>
							</p>
						</div>													
					</div>
				</div>
					
			";

		}
	?>
</div>