<?php 

session_start();

		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$conn = mysqli_connect('localhost', 'root', '' , 'bd_carros');
		$result = mysqli_query($conn, "SELECT * FROM tb_cliente WHERE email = '".$login."' AND senha = '".$senha."'");
		
		if(mysqli_num_rows($result) > 0){
			
			while($consulta = mysqli_fetch_array($resultados)){
				$array_cpf[] = $consulta['cpf'];
			}

			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['cpf'] = $array_cpf;
			$_SESSION['status_logado'] = true;
			
		}
		else{
			
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
			$_SESSION['status_logado'] = false;
		}
		
?>


<html>
 <head>
	<title></title>
	<title>teste2</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
	
	
<head>


<body onload='window.history.back();'>
	
</body>
</html>