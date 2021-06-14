<div class="container">
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

	$sql = "SELECT * FROM veiculo INNER JOIN tipov ON veiculo.tipo = tipov.tipov INNER JOIN marca ON veiculo.marca_id = marca.idmarca INNER JOIN cor ON veiculo.cor_id = cor.idcor WHERE veiculo.idveiculo = ".(int)$id;


	$result = mysqli_query($con, $sql);

	//print_r ( $dados );
	while ( $dados = mysqli_fetch_array( $result ) ) {
		//recuperar os dados do banco
		$id = $dados["idveiculo"];
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

	$extensao = pathinfo('../admin/java/hackathon/src/main/resources/static/images_upload/{$imagem}', PATHINFO_EXTENSION);
?>
<div class="row mt-5 justify-content-md-center">
	<div class="col-12 col-md-5 blocoTamanho blocoProduto mr-3 colunaImagem">
		<a href="admin/java/hackathon/src/main/resources/static/images_upload/<?=$imagem?><?=$extensao?>" data-lightbox="produto" title="<?=$veiculo?>">
			<img src="admin/java/hackathon/src/main/resources/static/images_upload/<?=$imagem?><?=$extensao?>" alt="{$veiculo}" class="w-100">
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
<?php
}
?>
</div>