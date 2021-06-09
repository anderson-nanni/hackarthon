<?php
	//verificar se a variável $pagina não existe
	if ( !isset ( $pagina ) ) exit;

?>
<h1>Veiculos em Destaque:</h1>
<div class="row">
	<?php
		$sql = "select * from veiculo inner join marca on veiculo.marca_id = marca.id order by rand() limit 8";
		$result = mysqli_query($con, $sql);

		while ( $dados = mysqli_fetch_array( $result ) ) {
			//separar
			$id = $dados["id"];
			$veiculo = $dados["modelo"];
			$marca = $dados["marca"];
			$imagem = $dados["fotoDestaque"];
			$valor = $dados["valor"];
			$tipo = $dados["tipo"];

			if ( empty ( $tipo ) ) {
				$valor = "R$ " . number_format($valor, 2, ",", ".");
			} else {
				$valor = "R$ " . number_format($valor, 2, ",", ".");
			}

			echo "<div class='col-12 col-md-4 text-center produtos'>
				<img src='images/{$imagem}.jpg' alt='{$veiculo}' class='w-100 h-60'>
				<h3>{$marca} - {$veiculo}</h3>
				<p>{$tipo}</p>
				<p class='valor'>{$valor}</p>
				<p>
					<a href='index.php?pagina=veiculo&id={$id}' class='btn btn-success btn-lg w-100 btn'>
					Detalhes
					</a>
				</p>
			</div>";

		}
	?>
</div>