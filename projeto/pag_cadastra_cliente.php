<?php	

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Titulo</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta charset="UTF-8">
</head>

<head>
	<title>Cadastrar Cliente</title>
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
	
	

			
		<nav id="principal" class="row">
			
			<aside class="col-md-12">
				<div class="col-md-1">
				</div>
					
					<div class="col-md-10">
						<form action="insert_novo_cliente.php" method="POST" name="form_cadastro" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-2">
									<legend>info pessoal</legend>
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-6">
									<label>Nome completo:</label>
									<input type="text" name="nome" required="required" class="form-control">
									<label class="radio-inline"><input type="radio" name="sexo" value="masculino" checked>Masculino</label>
									<label class="radio-inline"><input type="radio" name="sexo" value="feminino">Feminino</label>
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-2">
									<label>CPF:</label>
									<input type="text" maxlength="11" name="cpf" placeholder="123456789" required="required" class="form-control">
								</div>
								<div class="col-md-2">
									<label>Apelido:</label>
									<input type="text" maxlength="11" name="apelido" required="required" class="form-control">
								</div>
								<div class="col-md-2">
									<label>Telefone:</label>
									<input type="text" maxlength="9" name="tel" required="required" class="form-control">
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-3">
									<label>Data de nascimento:</label>
									<input type="date" name="dt_nasc" placeholder="dd/mm/aaaa" required="required" class="form-control">
								</div>
								<div class="col-md-3">
									<label>Estado civil:</label>
									<select name="est_civil" class="form-control">
										<option value="solteiro">Solteiro (a)
										<option value="casado">Casado (a)
										<option value="viuvo">Viúvo (a)
										<option value="divorciado">Divorciado (a)										
									</select>
								</div>
							</div>	
							
							
							<div class="row form-group">
								<div class="col-md-3">
									<label>E-mail:</label>
									<div class="input-group"><span class="input-group-addon">@</span>
										<input type="email" id="email" name="email" required="required" class="form-control" onKeyUp="valida_email(0)" onBlur="valida_email(1)">
									</div>
								</div>
								<div class="col-md-3">
									<label>Confirme:</label>
									<input type="email" id="re_email" name="re_email" required="required" class="form-control" onKeyUp="valida_email(0)" onBlur="valida_email(1)">
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-3">
									<label>Senha:</label>
									<input type="password" id="senha" name="senha" required="required" class="form-control" onKeyUp="valida_senha(0)" onBlur="valida_senha(1)">
								</div>
								<div class="col-md-3">
									<label>Confirme:</label>
									<input type="password" id="re_senha" name="re_senha" required="required" class="form-control" onKeyUp="valida_senha(0)" onBlur="valida_senha(1)">
								</div>
							</div>
							
							
							
							
							
							
							<div class="row">
								<div class="col-md-2">
									<legend>info endereço</legend>
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-4">
									<label>Logradouro:</label>
									<input type="text" name="logradouro" required="required" class="form-control">
								</div>
								<div class="col-md-2">
									<label>CEP:</label>
									<input type="text" name="cep" maxleght="8" required="required" class="form-control">
								</div>
							</div>
					

							<div class="row form-group">
								<div class="col-md-1">
									<label>Nº:</label>
									<input type="text" name="num" maxleght="6" required="required" class="form-control">
								</div>
								<div class="col-md-3">
									<label>Complemento:</label>
									<input type="text" name="complem" class="form-control">
								</div>
								<div class="col-md-2">
										<label>Bairro:</label>
										<input type="text" name="bairro" required="required" class="form-control">
								</div>
							</div>
							

							<div class="row form-group">
								<div class="col-md-3">
									<label>Estado:</label>
									<select name="estado" class="form-control">
										<option value="AC">(AC) Acre
										<option value="AL">(AL) Alagoas
										<option value="AM">(AM) Amapá
										<option value="BA">(BA) Bahia
										<option value="CE">(CE) Ceará
										<option value="DF">(DF) Distrito Federal
										<option value="ES">(ES) Espírito Santo
										<option value="GO">(GO) Goiás
										<option value="MA">(MA) Maranhão
										<option value="MT">(MT) Mato Grosso
										<option value="MS">(MS) Mato Grosso do Sul
										<option value="MG">(MG) Minas Gerais
										<option value="PA">(PA) Pará
										<option value="PB">(PB) Paraíba
										<option value="PR">(PR) Paraná
										<option value="PE">(PE) Pernambuco
										<option value="PI">(PI) Piauí
										<option value="RJ">(RJ) Rio de Janeiro
										<option value="RN">(RN) Rio Grande do Norte
										<option value="RS">(RS) Rio Grande do Sul
										<option value="RO">(RO) Rondônia
										<option value="RR">(RR) Roraima
										<option value="SC">(SC) Santa Catarina
										<option value="SP">(SP) São Paulo
										<option value="SE">(SE) Sergipe
										<option value="TO">(TO) Tocantins									
									</select>
								</div>
								<div class="col-md-3">
									<label>Município:</label>
									<input type="text" name="municipio" required="required" class="form-control">
								</div>
							</div>
								
							<div class="row" style="margin-top: 45px;">
								<div class="col-md-3">
									<input type="submit" id="btn_submit" class="btn btn-success form-control">
								</div>
								<div class="col-md-3">
									<input type="reset" class="btn btn-danger form-control">
								</div>
							</div>
						</form>

					</div>
				<div class="col-md-1">
				</div>
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

<script type="text/javascript">
	
	
	function valida_email(tipo){
				
		if(tipo == 0){ //evento onkeyup
			if(document.getElementById('email').value == document.getElementById('re_email').value && document.getElementById('email').value != ""){
			
				document.getElementById('re_email').style.borderColor = "#66ff66";
				document.getElementById('email').style.borderColor = "#66ff66";	
			}else{
			
				document.getElementById('re_email').style.borderColor = "#DD2222";
				document.getElementById('email').style.borderColor = "#DD2222";
			}
		}
		if(tipo == 1){
			if(document.getElementById('email').value == document.getElementById('re_email').value && document.getElementById('email').value != ""){
			
				document.getElementById('re_email').style.borderColor = "#ccc";
				document.getElementById('email').style.borderColor = "#ccc";
				
			}
		}
	}

	function valida_senha(tipo){
				
		if(tipo == 0){ //evento onkeyup
			if(document.getElementById('senha').value == document.getElementById('re_senha').value && document.getElementById('senha').value != ""){
			
				document.getElementById('re_senha').style.borderColor = "#66ff66";
				document.getElementById('senha').style.borderColor = "#66ff66";	
			}else{
			
				document.getElementById('re_senha').style.borderColor = "#DD2222";
				document.getElementById('senha').style.borderColor = "#DD2222";
			}
		}
		if(tipo == 1){
			if(document.getElementById('senha').value == document.getElementById('re_senha').value && document.getElementById('senha').value != ""){
			
				document.getElementById('re_senha').style.borderColor = "#ccc";
				document.getElementById('senha').style.borderColor = "#ccc";
				
			}
		}
	}
			
</script>
</html>