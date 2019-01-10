<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO 8859-1">
	<title>HResource Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="LoginCss.css">
</head>
<body>
	<?php
	header("Content-type: text/html; charset=ISO 8859-1", true);

	?>
	<div id="div_central">
		<img src="../imagens/logo.png" alt="logotipo" id="logotipoCss">
		<form class="" action="login.php" method="post" id="form_login">
			<br />
			<label>Username</label>
			<br />
			<input type="text" class="form_input" name="GRH_number" value="201">
			<label>Password</label>
			<br />
			<input type="password" class="form_input" name="GRH_password" value="12345">
			<input type="submit" name="confirmar" value="Confirmar">
			<a href="#">Esqueceu a password?</a>
			<!--<input type="button" name="" value="Cancelar">-->
		</form>
	</div>
	<?php
	if (isset($_COOKIE['login_errado'])) {
	?>
	<div class="container">
		<div class="alert alert-danger" id="alerta-JS">
			<strong>Atenção!</strong> Os dados que inseriu estão errados!
		</div>
	</div>
	<?php
	}
	?>
	<div id="div_footer">
	</div>
	<script>
	$("#div_footer").load("footer.php");
	</script>
</body>
</html>
