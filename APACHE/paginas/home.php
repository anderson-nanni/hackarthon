<?php
	//verificar se a variável $pagina não existe
	if ( !isset ( $pagina ) ) exit;

?>
<style type="text/css">
		.altura{
			width: 100%;
			object-fit: cover;
		}
		.carousel-indicators li{
			width: 10px;
  			height: 10px;
			border-radius: 100%;
		}
		.fundoNeP{
			background-color: black;
    		padding: 10px 10px 5px 10px;
    		border-radius: 50%;
		}
	</style>
	<div id="carouselSite" class="carousel slide tamanho" data-ride="carousel">
		<ol class="carousel-indicators">
		    <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselSite" data-slide-to="1"></li>
		    <li data-target="#carouselSite" data-slide-to="2"></li>
		  </ol>
		<div class="carousel-inner tamanho">
		    <div class="carousel-item active">
		      <img src="./images/banner1.jpg" class="d-block w-100 altura" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="./images/banner2.jpg" class="d-block w-100 altura" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="./images/banner3.jpg" class="d-block w-100 altura" alt="...">
		    </div>
	 	</div>
	  	<a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
		    <div class="fundoNeP">
		    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    	<span class="sr-only">Anterior</span>
		    </div>
		    
	  	</a>
		<a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
	    	<div class="fundoNeP">
	    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    		<span class="sr-only">Próximo</span>
	    	</div>
	 	</a>
	</div>
<div class="container">
	<h2 class="pt-5 pb-2">Veiculos em Destaque:</h2>
	<div class="row">
		<?php
			$sql = "SELECT * FROM veiculo INNER JOIN marca ON veiculo.marca_id = marca.idmarca ORDER BY rand() LIMIT 8";
			$result = mysqli_query($con, $sql);

			while ( $dados = mysqli_fetch_array( $result ) ) {
				//separar
				$id = $dados["idveiculo"];
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

				//$extensao = pathinfo("./admin/java/hackathon/src/main/resources/static/images_upload/{$imagem}", PATHINFO_EXTENSION);
				
				echo "
					<div class=\"col-12 col-md-3 mb-3 text-center blocoTamanho\">
						<div class=\"blocoProduto border\">
							<div class=\"row-12 align-items-center blocoImagem\">
								<a href=\"index.php?pagina=produto&id={$id}\">
									<img src=\"./admin/java/hackathon/src/main/resources/static/images_upload/{$imagem}\" alt=\"{$veiculo}\" class=\"w-100\">
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
</div>