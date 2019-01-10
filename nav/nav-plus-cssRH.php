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
		left: 15.5em;
		z-index: -1;
		background: white;
		width: calc(100% - 15.5em);
		height: 3.8em;
		background-color: white;
	}
	#div-logo img{
		margin-top: 0.7em;
		margin-left: calc(50% - 5.75em);
		z-index: 2;
	}
	#id-logout-button{
		float: right;
		z-index: 2;
		margin-top: 2em;
		margin-right: 2em;
		transition: 0.8s ease-in-out;
	}
	#id-iniciado-como{
		position: absolute;
		left: 1.5em;
		bottom: 1.5em;
	}
	#id-iniciado-como li:hover{
		background-color: #f5f5f5;
		cursor: default;
	}
	@media only screen and (max-device-width: 768px), only screen and (max-width: 768px){
		#left-nav a{
			padding: 0;
		}
		div#div-logo{
			position: absolute;
			left: 6em;
			background: white;
			width: calc(100% - 6em);
			height: 3.8em;
			background-color: white;
		}
		div#div-logo img{
			margin-top: 0.7em;
			margin-left: calc(50% - 5.75em);
			z-index: 2;
		}
		#left-nav{
			width: 6em;
			text-align: left;
		}
		#id-iniciado-como{
			display: none;
		}
	}
	</style>
</head>
<body>
	<?php
	header("Content-type: text/html; charset=ISO 8859-1", true);
	?>
	<button type="button" id="id-logout-button" class="btn btn-default btn-sm">
		<span class="glyphicon glyphicon-log-out"></span> Log out
	</button>
	<div id="div-logo">
		<img src="../../imagens/logo.png" alt="">
	</div>
	<div id="left-nav">
		<nav>
			<ul>
				<li id="href-Home"><a><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li id="href-Pedidos"><a><span class="glyphicon glyphicon-ok"></span> Pedidos</a></li>
				<li id="href-Ajudas"><a><span class="glyphicon glyphicon-question-sign"></span> Ajuda</a></li>
				<li id="href-Contacto"><a><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
			</ul>
		</nav>
		<ul id="id-iniciado-como">
			<li>Iniciado como:</li>
			<li>Admnistrador RH</li>
		</ul>
	</div>

	<script type="text/javascript">
	document.getElementById("id-logout-button").onclick = function () {
		location.href = "../../logout/logout.php";
	};
	document.getElementById("href-Home").onclick = function () {
		location.href = "../HomeRH/index.php";
	};
	document.getElementById("href-Pedidos").onclick = function () {
		location.href = "../PedidosRH/PedidosRH.php";
	};
	document.getElementById("href-Ajudas").onclick = function () {
		location.href = "../AjudaRH/AjudaRH.php";
	};
	document.getElementById("href-Contacto").onclick = function () {
		location.href = "../ContactoRH/contacto.php";
	};
</script>
</body>
</html>
