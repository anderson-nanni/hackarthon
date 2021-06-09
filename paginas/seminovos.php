<?php
	//verificar se a variável $pagina não existe
	if ( !isset ( $pagina ) ) exit;

?>
<h1>Veiculos Seminovos:</h1>
<div class="row">
	<?php
		$sql = "select * from veiculo v inner join marca on v.marca_id = marca.id where v.tipo = 'seminovo'  order by rand() limit 8";
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

			echo "<div class='col-12 col-md-4 text-center'>
				<img src='images/{$imagem}.jpg' alt='{$veiculo}' class='w-100'>
				<h2>{$marca} - {$veiculo}</h2>
				<p class='valor'>{$valor}</p>
				<p>
					<a href='index.php?pagina=veiculo&id={$id}' class='btn btn-success btn-lg w-100'>
					Detalhes
					</a>
				</p>
			</div>";

		}
	?>
</div>