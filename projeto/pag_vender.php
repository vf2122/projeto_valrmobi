<?php	

session_start();

	if(!isset($_SESSION['status_logado']) == true ){
		
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
			
		header('location:index.php');
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vender</title>
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
<div>
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
	
	

			
		<nav id="principal" class="row">
			
			<aside id="form_vender" class="col-md-4">
				<form action="insert_novo_anuncio.php" method="POST" enctype="multipart/form-data">
					
					<div class="row form-group">
						<div class="col-md-5">
							<label for="marca">marca:</label>
							<select name="marca"  required="required" class="form-control">
								<option value="Astron Martin">Astron Martin
								<option value="Audi">Audi
								<option value="BMW">BMW
								<option value="Chery">Chery
								<option value="ChevroletGM">Chevrolet/GM
								<option value="Chrysler">Chrysler
								<option value="Citroen">Citroën
								<option value="Ferrari">Ferrari
								<option value="Fiat">Fiat
								<option value="Ford">Ford
								<option value="Honda">Honda
								<option value="Jac Motors">Jac Motors
								<option value="Jeep">Jeep
								<option value="Land Rover">Land Rover
								<option value="Lexus">Lexus
								<option value="Mercedes-Benz">Mercedes-Benz
								<option value="Mitsubishi">Mitsubishi
								<option value="Nissan">Nissan
								<option value="Peugeot">Peugeot
								<option value="Renault">Renault
								<option value="Toyota">Toyota
								<option value="Volkswagen">Volkswagen
								<option value="Volvo">Volvo
							</select>
						</div>
						<div class="col-md-5">
							<label for="modelo">modelo:</label>
							<input type="text" name="modelo"  required="required" class="form-control">
						</div>
					</div>
					
					
					<div class="row form-group">
						<div class="col-md-5">
							<label>ano:</label>
							<input type="text" size="1" maxlength="4" name="ano" required="required" class="form-control">
						</div>
						<div class="col-md-5">
							<label>cor:</label>
								<select name="cor"  required="required" class="form-control">
									<option value="Amarelo">Amarelo
									<option value="Azul">Azul
									<option value="Branco">Branco
									<option value="Bege">Bege
									<option value="Prata">Prata
									<option value="Dourado">Dourado
									<option value="Marrom">Marrom
									<option value="Preto">Preto
									<option value="Verde">Verde
									<option value="vermelho">vermelho
									<option value="outros">outros
								</select>
							</div>
					</div>
					
					<div class="row form-group">
						<div class="col-md-3">
							<label>km:</label>
							<input type="text" size="3" maxlength="6" name="km" required="required" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="preco">preço:</label>
							<input type="text" size="5" maxlength="6" name="preco"  required="required" class="form-control" >
						</div>
					
						<div class="col-md-4">
							<label>cambio</label>
							<select name="combustivel" required="required" class="form-control">
								<option value="manual">manual
								<option value="automatico">automático
							</select>
						</div>
					</div>
					
					
					<div class="row form-group">
						<div class="col-md-4">
							<label>portas:</label>
							<select name="portas" required="required" class="form-control">
								<option value="2">2
								<option value="3">3
								<option value="4">4
								<option value="5">5
							</select>
						</div>
						
							
							<div class="col-md-2"></div>
						<div class="col-md-4">
							<label>final da placa:</label>
							<select name="placa" required="required" class="form-control">
								<option value="0">0
								<option value="1">1
								<option value="2">2
								<option value="3">3
								<option value="4">4
								<option value="5">5
								<option value="6">6
								<option value="7">7
								<option value="8">8
								<option value="9">9
							</select>
						</div>						
					</div>
					
					
					<div class="row form-group">
						<div class="col-md-5">
							<label>combustível:</label>
							<select name="combustivel" required="required" class="form-control">
								<option value="alcool">álcool
								<option value="gasolina">gasolina
								<option value="flex">flex
								<option value="gas">gás
							</select>
						</div>
						<div class="col-md-5">
							<label>negócio:</label>
							<select name="negocio" required="required" class="form-control">
								<option value="venda">venda</option>
								<option value="troca/venda">troca/venda</option>
							</select>
						</div>
					</div>						
						
					
					
					<div class="row form-group">
						<div class="col-md-10">
							<label>descrição:</label>
							<textarea  id="area_texo" name="descricao" rows="10" cols="50" placeholder="digite os opcionais..." class="form-control"></textarea>
						</div>
					</div>	
					
					
					<input type="file" name="img1">
					<input type="file" name="img2">
					<input type="file" name="img3">
					<input type="file" name="img4">
					
					
					<input type="submit" class="btn btn-primary" name="send" value="enviar">
					<input type="reset" class="btn" class="" name="clear" value="limpar">
					
			
				</form>
			</aside>
			<aside class="col-md-8">
				<img id="imagem-negoc" src="img/negocio.png">
			</aside>
		</nav>		

		
 		
	<!-- FOOTER -->

		
		<footer class="row">
			<div class="container-fluid">
				<div class="col-md-12">
					
				</div>
			</div>
		</footer>
	
		
	</div>
</div>
</body>

</html>