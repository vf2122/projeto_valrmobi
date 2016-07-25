<?php	

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	
	<script type="text/javascript" src="js/jquery.2.0.js">
	</script>
	<script type="text/javascript" src="js/bootstrap.min.js">
	</script>
	
</head>

<body>

	<div class="container-fluid">
	
<!-- HEADER -->
	
	
		<header class="row">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-1">
							<a href="index.php" class="div_navbar navbar-brand">Principal</a>
						</div>
						<div class="col-md-2">
							<a href="pag_comprar.php" class="navbar-brand">comprar</a>
							<a href="pag_vender.php" class="navbar-brand">vender</a>
						</div>
						<?php 
								if (!isset($_SESSION['status_logado']) == true){
									echo '
										<div class="col-md-4" class="navbar-brand">
											
										</div>
										<div class="col-md-3" class="navbar-brand">
											
										</div>
											<div class="col-md-1">
											</div>
											<div class="col-md-1" class="navbar-brand">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="navbar-brand" id="aba_login">login <span class="caret"></span></span></a>
												<ul class="dropdown-menu" style=" padding-left: 5px; padding-right: 5px; margin-left: -80px;">
														<form action="func_login.php" method="post" class="form-group">
															<li><input type="text" name="login" placeholder="login" class="form-control input_login "></li>
															<li><input type="text" name="senha" placeholder="senha" class="form-control input_login "></li>
															<li><input type="submit" value="entrar" class="btn btn-primary btn-block form-control"></li>
														</form>
														<li class="divider"></li>
														<li><a href="pag_cadastra_cliente.php">inscreva-se</a></li>
												</ul>
											</div>
										</div>
									';
								}else{
									echo '
										<div class="col-md-7">
										</div>
										<div class="col-md-2">
											<a href="pag_comprar.php" class="navbar-brand">Bem vindo</a>
											<a href="func_sair.php" class="navbar-brand">sair</a>
										</div>
									';
								}
						?>

				</div>
			</nav>	
		</header>
	

		
<!-- ASIDE -->
	
	
		<nav class="row" id="principal_index">
			<a href="pag_comprar.php">
				<aside id="aside-esq" class="col-md-6">
				
					<h1 id="letreiro_1">Clique aqui e encontre a melhor forma de comprar seu automóvel</h1>
					
				</aside>
			</a>
		
			<a href="pag_vender.php">
				<aside id="aside-dir" class="col-md-6">
					<span>
						<h1  id="letreiro_2">Clique aqui e encontre a melhor forma de vender seu automóvel</h1>
					</span>
					<span>
						<h1  id="letreiro_2">Essa pagina só estará disponivel se fizer login</h1>
					</span>
				</aside>
			</a>
		</nav>
			
			
<!-- FOOTER -->
	
		
		<footer class="row">
			<div class="container-fluid">
				<div class="col-md-12">
					
				</div>
			</div>
		</footer>

				
	</div>

</body>

</html>