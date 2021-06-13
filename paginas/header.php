<?php 
  session_start(); //iniciando uma sessão

  //incluir o arquivo de conexao com o banco
  require "config/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Hackarton</title>

  <!-- METAS -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- FIM METAS -->

  <!-- LINKS E CSS -->

  <!-- FAV ICON -->
  <link rel="icon" href="images/favicon_hackarthon.png" type="image/x-icon" />
  <!-- FIM FAV ICON -->

  <!-- BOOTSTRAP -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- FIM BOOTSTRAP -->

  <!-- FONT AWESOME -->
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
  <!-- FIM FONT AWESOME -->

  <!-- ARQUIVOS ESTILO -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- FIM ARQUIVOS ESTILO -->

  <!-- LIGHTBOX -->
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <!-- FIM LIGHTBOX -->

  <!-- SWEET ALERT -->
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <!-- FIM SWEET ALERT -->

  <!-- LINKS E CSS -->
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg mr-5 ml-5">
      <a class="navbar-brand logo" href="index.php">
        <img src="images/logo_hackarthon.png" alt="Logo Hackarton">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-auto mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=sobre">Sobre a Empresa</a>
          </li>
          <?php
            //comando sql para selecionar as categorias
            $sql = "SELECT * FROM tipov";
            //executar esse sql
            $result = mysqli_query($con, $sql);
            //recuperar os dados por linha
            while ($dados = mysqli_fetch_array($result)) {
              //separar os resultados
              $id = $dados["id"];
              $tipo = $dados["tipo"];
              $tipo = ucwords($tipo);
              /*text-uppercase*/
              echo "<li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"index.php?pagina=paginaTipo&id={$id}\">{$tipo}</a>
                </li>";
            }
          ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" name="formBusca" action="index.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Digite para buscar..." aria-label="Busque" name="busca">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </nav>
</header>