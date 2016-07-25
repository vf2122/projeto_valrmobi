<?php	

session_start();
include("func_conectar_bd.php");

?>


<?php 
	
	$query = "SELECT * FROM tb_carro ORDER BY cod DESC";
	
	if(isset($_GET['select'])){
		$query = $_GET['select'];
	}
	
	$resultados = mysqli_query($conn, $query);
	while($consulta = mysqli_fetch_array($resultados)){
		$array_id[] = $consulta['cod'];
		$array_modelo[] = $consulta['modelo'];
		$array_ano[] = $consulta['ano'];
		$array_img[] = $consulta['imagem1'];
		$array_preco[] = $consulta['preco'];
		$array_km[] = $consulta['km'];	
	}

		
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Comprar</title>
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
			<div class="row"> 
				<div class="col-md-5	">
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<input type="text" id="input_cod" placeholder="digite o cod" class="form-control">
						<span class="input-group-btn"><button class="btn btn-secundary" onClick="buscar();">buscar</button></span>
					</div>
				</div>
				<div class="col-md-4">
					<label>Ordem: </label>
					<select id="select" onChange="troca_orderm()">
						<option> </option>
						<option value="SELECT * FROM `tb_carro` ORDER BY cod DESC">Recentes </option>
						<option value="SELECT * FROM `tb_carro` ORDER BY preco">Menor preço </option> 
						<option value="SELECT * FROM `tb_carro` ORDER BY preco DESC">Maior preço </option>
						<option value="SELECT * FROM `tb_carro` ORDER BY km">Menor km </option>
						<option value="SELECT * FROM `tb_carro` ORDER BY km DESC">Maior km </option>
					</select>
				</div>
			</div>
			<aside class="row">
				<div class="col-md-2">
				</div>
				
				<div class="col-md-8">
		
		<!-- LINHAS -->			
					<div class="row">
					<?php 
						
						
						$cont = 0;
						while($cont < 30){
						
							if(isset($array_id[$cont])){
							
								echo '
							
								<div class="col-md-3">
									<legend>'.$array_modelo[$cont]. ' -  '.$array_ano[$cont]. ' </legend>
									<p>cod: ' .$array_id[$cont]. ' - estado<p/>
									<a href="pag_anuncio.php?id=' .$array_id[$cont]. '">
										<img src="img/' .$array_img[$cont]. '" class="imagem-comprar"> </img>
									</a>
									<p>R$ '.$array_preco[$cont].',00</p><p>' .$array_km[$cont]. ' km</p>
							
								</div> '; 
						
								$cont++;	
							}else{
								$cont++;	
							}
						}
					?>	
					
					</div>
				</div>
				
				<div class="col-md-2">
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
	
	function troca_orderm(){
		
		var valor = document.getElementById('select').value;
		window.location = '?select=' + valor; 
	}
	
	function buscar(){
		
		if(document.getElementById('input_cod').value != ""){
			var link = "pag_anuncio.php?id=";
			link += document.getElementById('input_cod').value;
		}
		
		location.href = link;
		
	}
</script>
</html>