<?php

	
	$nome = strtolower($_POST['nome']);
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$apelido = strtolower($_POST['apelido']);
	$tel = $_POST['tel'];
	$dt_nasc = $_POST['dt_nasc'];
	$est_civil = $_POST['est_civil'];
	$email = strtolower($_POST['email']);
	$senha = $_POST['senha'];
	$logradouro = strtolower($_POST['logradouro']);
	$cep = $_POST['cep'];
	$num = $_POST['num'];
	$complem = strtolower($_POST['complem']);
	$bairro = strtolower($_POST['bairro']);	
	$estado = $_POST['estado'];
	$municipio = strtolower($_POST['municipio']);
	
	
	$conn = mysqli_connect('localhost', 'root', '', 'bd_carros');
	
	$query = "INSERT INTO tb_cliente 
			(nome, sexo, cpf, apelido, tel, dt_nasc, estado_civil, email, senha, end_logradouro, end_cep, end_num, end_compl, end_bairro, end_estado, end_municipio) 
	VALUES ('$nome' , '$sexo' , '$cpf' , '$apelido' , '$tel' , '$dt_nasc' , '$est_civil' , '$email' , '$senha' , '$logradouro' , '$cep' , '$num' , '$complem' , '$bairro' , '$estado' , '$municipio')";
	
	mysqli_query($conn, $query);
	
	header("location:index.php");

?>