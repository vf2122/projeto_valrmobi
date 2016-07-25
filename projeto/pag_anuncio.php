<?php

session_start();

?>

<?php
	
	$cod = $_GET['id'];
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "bd_carros";
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
	
	$query = "SELECT * FROM tb_carro WHERE cod = ";
	$query2 = $query . $cod;
	
	$resultados = mysqli_query($conn, $query2);
	while($consulta = mysqli_fetch_array($resultados)){
		$array_cod[] = $consulta['cod'];
		$array_modelo[] = $consulta['modelo'];
		$array_ano[] = $consulta['ano'];
		$array_imagem1[] = $consulta['imagem1'];
		$array_imagem2[] = $consulta['imagem2'];
		$array_imagem3[] = $consulta['imagem3'];
		$array_imagem4[] = $consulta['imagem4'];
		$array_preco[] = $consulta['preco'];
		$array_km[] = $consulta['km'];
		$array_marca[] = $consulta['marca'];
		$array_cor[] = $consulta['cor'];
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Anuncio</title>
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
			<div class="container-fluid">
				<aside class="row" class="col-md-12">
				
					<div class="col-md-2"></div>
					<div class="col-md-8" id="borda_info_anuncio">
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-4" >
								<h2><?php echo  $array_marca[0]." - ".$array_modelo[0]; ?></h2>
							</div>	
						</div>
					
						<div class="row">
							<div class="col-md-2" >
							</div>
							<div class="col-md-4" >
								<p><?php echo "ano: ". $array_ano[0] ?></p>
							</div>	
						</div>
					
					
						<div class="row">
							<div class="col-md-2">
								<div class="col-md-2">
								</div>
								<div class="col-md-5" >
									<a href="#"  onClick="troca_imagem('mini_1')"><div id="mini_1" class="miniatura" style="background-image: url('img/<?php echo $array_imagem1[0]; ?>');">
									</div></a>
									<a href="#"  onClick="troca_imagem('mini_2')"><div id="mini_2" class="miniatura" style="background-image: url('img/<?php echo $array_imagem2[0]; ?>');">
									</div></a>
									<a href="#"  onClick="troca_imagem('mini_3')"><div id="mini_3" class="miniatura" style="background-image: url('img/<?php echo $array_imagem3[0]; ?>');">
									</div></a>
									<a href="#"  onClick="troca_imagem('mini_4')"><div id="mini_4" class="miniatura" style="background-image: url('img/<?php echo $array_imagem4[0]; ?>');">
									</div></a>
								</div>
							</div>
							<div class="col-md-6" >
								<div id="img_anuncio" style="background-image: url(img/<?php echo $array_imagem1[0]; ?>)"></div>
							</div>
							<div class="col-md-3" id="borda_info_anuncio">
								<h4>cod: <?php echo $array_cod[0]; ?></h4>
								<h4>Cor: <?php echo  $array_cor[0] ?></h4>
								<h4>KM: <?php echo  $array_km[0] ?></h4>
								<h4>Preço: <?php echo  $array_preco[0].",00" ?></h4>
							</div>
						</div>
					
						<div class="row">
								
						</div>
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-4" >
								<h3>vendedor - contato: </h3>
							</div>
						</div>
					</div>	
				</aside>
			</div>	
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

<script>
	
	function troca_imagem(id){
		
		var imagem_princ = "'" + document.getElementById("img_anuncio").style.backgroundImage + "'";
		var imagem_mini = document.getElementById(id).style.backgroundImage;
		
		
		document.getElementById("img_anuncio").style.backgroundImage = imagem_mini;
		
	}
	
</script>
</html>