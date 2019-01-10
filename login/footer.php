<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="ISO 8859-1">
		<title></title>
		<style media="screen">
			#div_p_footer{
				position: fixed;
				display: block;
				bottom: 0px;
				left: 10em;
				right: 10em;
				border: 0.063em solid #ddd;
				border-bottom: 0;
				border-top-left-radius: 0.188em;
				border-top-right-radius: 0.188em;
			}
			#p_autores{
				padding-left: 10px;
				float: left;
			}
			#p_outros{
				float: right;
				padding-right: 10px;
			}
			#a_contactos{
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<?php
		header("Content-type: text/html; charset=ISO 8859-1", true);

		?>
		<div id="div_p_footer">
			<p id="p_autores">Jorge Gonçalves, Jorge Pinheiro</p>
			<p id="p_outros"><a id="a_contactos"href="#">Contactos</a></p>
		</div>
	</body>
</html>
