<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
	<meta charset="iso-8859-1">
	<title>Navegador</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="navCss.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php
	header("Content-type: text/html; charset=ISO 8859-1", true);
	?>
	<div id="div-logo">
		<img src="../../imagens/logo.png" alt="">
	</div>
	<div id="left-nav">
		<nav>
			<ul id="nav-ul">
				<li class="nav-li"><a href="../Home/index.php" class="nav-a" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li class="nav-li"><a class="nav-a"><span class="glyphicon glyphicon-ok"></span> Férias</a></li>
				<li class="nav-li"><a class="nav-a"><span class="glyphicon glyphicon-remove"></span> Faltas</a></li>
				<li class="nav-li"><a class="nav-a"><span class="glyphicon glyphicon-question-sign"></span> Ajuda</a></li>
				<li class="nav-li"><a href="../Contacto/contacto.php" class="nav-a"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
			</ul>
		</nav>
	</div>

			<button type="button" id="id-logout-button" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-log-out"></span> Log out
			</button>
</body>
</html>
