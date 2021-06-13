	<footer class="page-footer">
		<div class="containter centralizarR">
			<div class="row row-12 tamanhoRodape justify-content-md-center"> 
				    <div class="col-12 col col-md-3 text-center">
				      <a class="logo" href="index.php">
				        <img src="images/logo_hackarthon.png" alt="Logo Hackarton">
				    </a>
				    </div>
				    <div class="col-12 col col-md-3 text-center">
				      <p class="text-center pt-3">
						<strong>Projeto Hackaton:</strong>
						<p class="text-center">Hackarton - Site de Carros</p>
					</p>
				    </div>
				    <div class="col-12 col col-md-3">
						<nav class="nav flex-column text-left pt-2 centralizarR">
							<ul class="navbar-nav mr-auto">
					          <li class="nav-item">
					            <a class="nav-link" href="index.php">Início</a>
					          </li>
					          <li class="nav-item">
					            <a class="nav-link" href="index.php?pagina=sobre">Sobre a Empresa</a>
					          </li>
					          <?php
					            //comando sql para selecionar as categorias
					            $sql = "SELECT tipo FROM veiculo group by tipo order by tipo";
					            //executar esse sql
					            $result = mysqli_query($con, $sql);
					            //recuperar os dados por linha
					            while ($dados = mysqli_fetch_array($result)) {
					              //separar os resultados
					              $tipo = $dados["tipo"];
					              $tipo = ucwords($tipo);
					              /*text-uppercase*/
					              echo "<li class=\"nav-item\">
					                  <a class=\"nav-link\" href=\"index.php?pagina=tipo\">{$tipo}</a>
					                </li>";
					            }
					          ?>
					        </ul>
						</nav>
				    </div>
				  </div>
				</div>			
			</div>
				<hr>
			<div class="row-12 mb-4 mt-4">
				<p class="text-center">Todas as imagens dos produtos exibidos neste Site são meramente ilustrativas e não definem com precisão o tamanho e cor real dos ceiculos.</p>	
			</div>
			<hr class="separador">		
		</div>
		<div class="desenvolvedor pb-1 mb-0 w-100">
			<p class="text-center mb-0">
					
			</p>
			<p class="text-center mt-0">
				<span>Copyright © 2021</span> - Desenvolvido por: <br><strong>Andrey Diógenes Lima da Silva - RA: 11207</strong> - <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5544984365263"></a><i class="fab fa-whatsapp"></i> (44) 9 8436-5263
				<strong>/</strong>
				<strong>Anderson Matheus Adati Nanni - RA: 11205</strong> - <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5544984365263"></a><i class="fab fa-whatsapp"></i> (44) 9 9137-0290
			</p>		
		</div>
	</footer>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="js/popper.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/lightbox.js"></script>
  	<script type="text/javascript" src="js/parsley.min.js"></script>
</body>
</html>