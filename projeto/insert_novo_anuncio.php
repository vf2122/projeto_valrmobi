<?php

session_start();

?>

<?php

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$ano = $_POST['ano'];
	$cor = $_POST['cor'];
	$km = $_POST['km'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$negocio = $_POST['negocio'];
	$cpf = $_SESSION['cpf'];	

	if(isset($_FILES['img1'])){
		
		$extensao = strtolower(substr($_FILES['img1']['name'],-4));
		$novo_nome1 = $modelo."_".$cor."_1".$extensao;
		$diretorio = "img/";
		move_uploaded_file($_FILES['img1']['tmp_name'], $diretorio.$novo_nome1);
		
	}
	
		if(isset($_FILES['img2'])){
		
		$extensao = strtolower(substr($_FILES['img1']['name'],-4));
		$novo_nome2 = $modelo."_".$cor."_2".$extensao;
		$diretorio = "img/";
		move_uploaded_file($_FILES['img2']['tmp_name'], $diretorio.$novo_nome2);
		
	}

		if(isset($_FILES['img3'])){
		
		$extensao = strtolower(substr($_FILES['img1']['name'],-4));
		$novo_nome3 = $modelo."_".$cor."_3".$extensao;
		$diretorio = "img/";
		move_uploaded_file($_FILES['img3']['tmp_name'], $diretorio.$novo_nome3);
		
	}
	
		if(isset($_FILES['img4'])){
		
		$extensao = strtolower(substr($_FILES['img1']['name'],-4));
		$novo_nome4 = $modelo."_".$cor."_4".$extensao;
		$diretorio = "img/";
		move_uploaded_file($_FILES['img4']['tmp_name'], $diretorio.$novo_nome4);
		
	}
	
	$conn = mysqli_connect('localhost', 'root', '', 'bd_carros');
	
	$sql = "INSERT INTO tb_carro(FK_cliente, tipo, marca, modelo, ano, cor, km, descricao, preco, imagem1, imagem2, imagem3, imagem4) 
	VALUES ( '$cpf' , '$negocio' , '$marca' , '$modelo' , '$ano' , '$cor' , '$km' , '$descricao' , '$preco', '$novo_nome1', '$novo_nome2', '$novo_nome3', '$novo_nome4')";
	
	mysqli_query($conn, $sql);
	
	header("vender.php");
	
?>
	