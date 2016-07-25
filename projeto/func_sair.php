<?php

session_start();

			
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
			unset ($_SESSION['status_logado']);
			
			
?>

<html>
<head>

</head>
<body onload='window.history.back();'>
</body>
</html>