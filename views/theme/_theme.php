<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?= asset("/style.min.css"); ?>"/>
	<link rel="icon" type="image/png" href="<?= asset("/images/favicon.png"); ?>"/>

	<title>Desafio BRED | <?=$title?></title>
	
</head>

<body>

	<div class="ajax_load">
		<div class="ajax_load_box">
			<div class="ajax_load_box_circle"></div>
			<div class="ajax_load_box_title">Aguarde, carrengando...</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand" href="<?=site()?>"><img src="<?=asset("/images/logo.svg");?>" alt="Desafio BREDI"></a>
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdownProduto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
					<div class="dropdown-menu" aria-labelledby="dropdownProduto">
						<a class="dropdown-item" href="<?=site()?>/cadastro">Cadastro de Produto</a>
						<a class="dropdown-item" href="<?=site()?>/produtos">Lista de Produtos</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdownCategoria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
						<div class="dropdown-menu" aria-labelledby="dropdownCategoria">
							<a class="dropdown-item" href="#">Cadastro de Categoria</a>
							<a class="dropdown-item" href="#">Lista de Categorias</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container" style="margin-top: 20px">

            <?= $v->section("content"); ?>

			</div>

			<script src="<?= asset("/script.min.js"); ?>"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

			<?= $v->section("scripts"); ?>

		</body>
		</html>