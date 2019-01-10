<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
	<meta charset="iso-8859-1">
	<title>Navegador</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style media="screen">
	#left-nav{
		position: fixed;
		z-index: 0;
		top: 0em;
		left: 0em;
		width: 15.5em;
		height: 100%;
		background-color: #f5f5f5;
	}
	@media only screen and (max-width: 768px){
		#left-nav{
			width: 4em;
		}
	}

	nav#left-nav, ul {
		text-decoration: none;
		list-style: none;
		margin: 0;
		padding: 0;
		margin-top: 8em;
	}

	nav#left-nav, ul li{
		border-radius: 0.1875em;
		transition: 0.8s ease-in-out;
		line-height: 1.5;
		margin-top: 0.8em;
		margin-left: auto;
		margin-right: auto;
		max-width: 100%;
		padding-top: 0.25em;
		padding-bottom: 0.25em;
	}
	nav#left-nav, ul li:hover{
		cursor: pointer;
		background-color: white;
		transition: 0.8s;
	}
	nav#left-nav, a{
		color: black;
		font-size: 15px;
		padding-left: 1.5em;
	}

	nav#left-nav, a:hover{
		text-decoration: none;
		color: black;
	}
	#div-logo{
		position: absolute;
		margin-left: 45%;
		margin-right: 55%;
		z-index: 1;
		background: white;
		margin-top: 2em;
		width: 184px;
		height: 43px;
	}
	#div-logo img{
		z-index: 1;

	}
	#id-logout-button{
		float: right;
		margin-top: 2em;
		margin-right: 2em;
		transition: 0.8s ease-in-out;
	}

	</style>
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
			<ul>
				<li id="href-Home"><a><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li id="href-Ferias"><a><span class="glyphicon glyphicon-ok"></span> Férias</a></li>
				<li id="href-Faltas"><a><span class="glyphicon glyphicon-remove"></span> Faltas</a></li>
				<li id="href-Ajudas"><a><span class="glyphicon glyphicon-question-sign"></span> Ajuda</a></li>
				<li id="href-Contacto"><a><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
			</ul>
		</nav>
	</div>

	<button type="button" id="id-logout-button" class="btn btn-default btn-sm">
		<span class="glyphicon glyphicon-log-out"></span> Log out
	</button>
	<script type="text/javascript">
	document.getElementById("id-logout-button").onclick = function () {
		location.href = "../../logout/logout.php";
	};
	document.getElementById("href-Home").onclick = function () {
		location.href = "../Home/index.php";
	};
	document.getElementById("href-Ferias").onclick = function () {
		location.href = "../Ferias/ferias.php";
	};
	document.getElementById("href-Faltas").onclick = function () {
		location.href = "../Faltas/faltas.php";
	};
	document.getElementById("href-Ajudas").onclick = function () {
		location.href = "#";
	};
	document.getElementById("href-Contacto").onclick = function () {
		location.href = "../Contacto/contacto.php";
	};
</script>
</body>
</html>
