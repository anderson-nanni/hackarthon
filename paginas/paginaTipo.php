<?php
	//verificar se a variável $pagina não existe
	if ( !isset ( $pagina ) ) exit;
	$id = $_GET['id'] ?? '';

	$sql = "SELECT tipo FROM tipov WHERE id = ".(int)$id." limit 1";
	$result = mysqli_query($con, $sql);
	$dados = mysqli_fetch_array( $result );
?>
<h2 class="mt-5">Categoria: <?=$dados['tipo']?></h2>

<div class="row mt-3">
	<?php
		//selecionar 6 produtos - rand -> sorteio - limit limitar o nr de resultado
		$sql = "SELECT * FROM veiculo INNER JOIN tipov ON veiculo.tipo = tipov.tipo INNER JOIN marca ON veiculo.marca_id = marca.id WHERE tipov.id = ".(int)$id;
		//$sql = "SELECT * FROM veiculo WHERE tipo = ".(int)$id;
		/*$sql = "select * from produto where categoria_id = ".(int)$id;*/
		//executar o sql
		$result = mysqli_query($con, $sql);

		//separar os dados por linha
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

			//se tiver promo - valor = valor da promo
			//senao valor = valor do produto

			//se a promo esta vazio - valor = valor do produto
			if ( empty ( $promo ) ) {
				//1499.99 -> 1.499,99
				$valor = "R$ " . number_format($valor, 2, ",", ".");
				$de = "";
			} else {
				//valor normal
				$de = "R$ " . number_format($valor, 2, ",", ".");
				//valor promocional
				$valor = "R$ " . number_format($promo, 2, ",", ".");
			}

			$extensao = pathinfo('produtos/{$imagem}', PATHINFO_EXTENSION);
			?>

			<?php

			echo "<div class=\"col-12 col-md-3 mb-3 text-center blocoTamanho\">
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