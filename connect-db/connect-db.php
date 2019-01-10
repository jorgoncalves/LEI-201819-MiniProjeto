<?php

$servidor="localhost";
$utilizador="root";
$pass="#Qwerty3";
$bd="grh_2018";
$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);


if ($ligacao->connect_error){
  die("erro de conexão: ".$ligacao->connect_error);
}

?>
