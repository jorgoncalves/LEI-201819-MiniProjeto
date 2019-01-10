<?php
header("Content-type: text/html; charset=ISO 8859-1", true);

SESSION_START();
$user_ID = $_SESSION['user_number'];
$user_password = $_SESSION['user_password'];
echo 'Dados Login: <br>'.$user_ID.'<br>'.$user_password.'<br>';

include '../connect-db/connect-db.php';
$sql_select_funcionario = "SELECT funcionario.ID_Funcionario, funcionario.ID_Chefe, funcionario.ID_Departamento, funcionario.Nome, funcionario.DataNascimento, funcionario.Contacto, funcionario.Email, funcionario.password,
departamento.Designacao as DesignacaoDerp, departamento.Local_D as LocalDerp,
funcao.Designacao as DesignacaoFuncao,
contrato.Categoria as CategoriaContrato, contrato.DataInicio as DataInicioContrato, contrato.DataFim as DataFimContrato
FROM funcionario
LEFT JOIN departamento
on funcionario.ID_Departamento = departamento.ID_Departamento
LEFT JOIN funcao
on funcionario.ID_Funcionario = funcao.ID_Funcionario
LEFT JOIN contrato
on funcionario.ID_Funcionario = contrato.ID_Funcionario
WHERE funcionario.ID_Funcionario = '$user_ID' AND funcionario.password = '$user_password'";
//SELECT * FROM funcionario LEFT JOIN departamento on funcionario.ID_Departamento = departamento.ID_Departamento where funcionario.ID_Funcionario=201

$resultado_db_funcionario = $ligacao->query($sql_select_funcionario) or die ($ligacao->error);

while ($registo = $resultado_db_funcionario->fetch_assoc()) {
  if ($user_ID != $registo['ID_Funcionario'] AND $user_password != $registo['password']){
    header('Location: ../login/login.php');
  }
  $array_funcionario = array();
  array_push($array_funcionario,
  $registo['ID_Funcionario'], $registo['ID_Chefe'], $registo['ID_Departamento'], $registo['Nome'],
  $registo['DataNascimento'], $registo['Contacto'], $registo['Email'], $registo['password']);
  echo "<pre>";
  print_r($array_funcionario);
  echo "<pre>";
  echo "<br>Array Funcionario: ".(count($array_funcionario)/8);
  //setcookie?! eliminar ao fim de algum tempo? confirmar!
  $_SESSION['logged_in_ID'] = $registo['ID_Funcionario'];
  $_SESSION['logged_in_ChefeF'] = $registo['ID_Chefe'];
  $_SESSION['logged_in_Departamento'] = $registo['ID_Departamento'];
  $_SESSION['logged_in_Nome'] = $registo['Nome'];
  $_SESSION['logged_in_DataNascimento'] = $registo['DataNascimento'];
  $_SESSION['logged_in_Contacto'] = $registo['Contacto'];
  $_SESSION['logged_in_Email'] = $registo['Email'];
  $_SESSION['logged_in_password'] = $registo['password'];
  $_SESSION['logged_in_Designacao_Derp'] = $registo['DesignacaoDerp'];
  $_SESSION['logged_in_Local_Derp'] = $registo['LocalDerp'];
  $_SESSION['logged_in_Designacao_Funcao'] = $registo['DesignacaoFuncao'];
  $_SESSION['logged_in_Categoria_Contrato'] = $registo['CategoriaContrato'];
  $_SESSION['logged_in_Data_Inicio_Contrato'] = $registo['DataInicioContrato'];
  $_SESSION['logged_in_Data_Fim_Contrato'] = $registo['DataFimContrato'];
  echo "<br>Dados Funcionario:<br>".$registo['ID_Funcionario']."<br>".$registo['Nome']."<br>".$registo['ID_Departamento'].'<br>';
  echo "<br>Dados Departamento:<br>".$registo['DesignacaoDerp']."<br>".$registo['LocalDerp']."<br>";
  echo "<br>Dados Função: <br>".$registo['DesignacaoFuncao']."<br>";
  echo "<br>Dados Contrato: <br>".$registo['CategoriaContrato'].'<br>'.$registo['DataInicioContrato'].'<br>'.$registo['DataFimContrato'].'<br>';
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_select_funcionario_curriculum = "SELECT * FROM curriculum WHERE ID_Funcionario = '$user_ID'";
$resultado_db_funcionario_curriculum = $ligacao->query($sql_select_funcionario_curriculum) or die ($ligacao->error);

$array_curriculum = array();
while ($registo = $resultado_db_funcionario_curriculum->fetch_assoc()) {
  echo "<br>Dados Curriculum:<br>".$registo['ID_Curriculum'].'<br>'.$registo['Titulo'].'<br>'.$registo['LocalForm'].'<br>';
  array_push($array_curriculum, $registo['ID_Curriculum'], $registo['Titulo'], $registo['LocalForm']);
  /*echo "<br>Dados Curriculum:<br>".$array_curriculum[0][0].
                            '<br>'.$array_curriculum[0][1].
                            '<br>'.$array_curriculum[0][2].'<br>';*/
}
//na primeira posição está o ID_Curriculum para futuro update?
$_SESSION['curriculum'] = $array_curriculum;
echo "<pre>";
print_r($array_curriculum);
echo "<pre>";
echo "<br>Array Curriculum: ".(count($array_curriculum)/3);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_select_funcionario_formacao = "SELECT * FROM formacao WHERE ID_Funcionario = '$user_ID'";
$resultado_db_funcionario_formacao = $ligacao->query($sql_select_funcionario_formacao) or die ($ligacao->error);

$array_formacao = array();
while ($registo = $resultado_db_funcionario_formacao->fetch_assoc()) {
  echo "<br>Dados Formação:<br>".$registo['ID_Formacao'].'<br>'.$registo['Titulo'].'<br>'.$registo['LocalForm'].'<br>';
  array_push($array_formacao, $registo['ID_Formacao'], $registo['Titulo'], $registo['LocalForm'], $registo['DataInicio'], $registo['DataFim']);
}
//na primeira posição está o ID_Curriculum para futuro update?
$_SESSION['formacao'] = $array_formacao;
echo "<pre>";
print_r($array_formacao);
echo "<pre>";
echo "<br>Array Curriculum: ".(count($array_formacao)/5);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//header('Location: Home/index.php');

?>
