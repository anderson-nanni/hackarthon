<?php
	//verificar se a variável $pagina não existe
	if ( !isset ( $pagina ) ) exit;

	//print_r ( $_GET );

	//recuperacao do id
	//trim retira espaços em branco
	$id = trim( $_GET["id"] ?? "" );

	$id = (int)$id;

	//var_dump($id);
	//recuperar o produto com o id
	$sql = "SELECT * FROM veiculo INNER JOIN tipov ON veiculo.tipo = tipov.tipo INNER JOIN marca ON veiculo.marca_id = marca.id INNER JOIN cor ON veiculo.cor_id = cor.id WHERE tipov.id = ".(int)$id;
	$result = mysqli_query($con, $sql);
	$dados  = mysqli_fetch_array($result);

	//print_r ( $dados );

	//recuperar os dados do banco
	$id = $dados["id"];
	$veiculo = $dados["modelo"];
	$marca = $dados["marca"];
	$imagem = $dados["fotodestaque"];
	$valor = $dados["valor"];
	$tipo = $dados["tipo"];
	$anof = $dados["anofabricacao"];
	$anom = $dados["anomodelo"];
	$opc = $dados["opcionais"];
	$cor = $dados["cor"];

	if ( empty ( $tipo ) ) {
		$valor = "R$ " . number_format($valor, 2, ",", ".");
	} else {
		$valor = "R$ " . number_format($valor, 2, ",", ".");
	}

	$extensao = pathinfo('produtos/{$imagem}', PATHINFO_EXTENSION);
?>
<div class="row mt-5 justify-content-md-center">
	<div class="col-12 col-md-5 blocoTamanho blocoProduto mr-3 colunaImagem">
		<a href="produtos/<?=$imagem?><?=$extensao?>" data-lightbox="produto" title="<?=$veiculo?>">
			<img src="produtos/<?=$imagem?><?=$extensao?>" alt="{$veiculo}" class="w-100">
		</a>
	</div>

	<div class="col-12 col-md-6 blocoProduto p-4">
		<h2><?=$marca?> - <?=$veiculo?></h2>
		<p class="pl-1 pr-1 pb-0 mb-0"><b>Tipo:</b> <?=$tipo?></p>
		<p class="pl-1 pr-1 pb-0 mb-0">
			<span class="pr-2"><b>Marca:</b> <?=$marca?></span>
			<span class="pr-2"><b>Cor:</b> <?=$cor?></span>
		</p>
		<p class="pl-1 pr-1 pb-0 mb-0">
			<span class="pr-2"><b>Ano de Fabricação:</b> <?=$anof?></span>
			<span class="pr-2"><b>Ano do Modelo:</b> <?=$anom?></span>
		</p>
		
		<br>
		<p class='valor pl-1 pr-1'><?=$valor?></p>

		<br>

		<h3 class="">Opcionais do Produto:</h3>
		<?=nl2br($opc);?>
	</div>
</div>
