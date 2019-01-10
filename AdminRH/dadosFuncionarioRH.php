<?php
header("Content-type: text/html; charset=ISO 8859-1", true);

SESSION_START();
if (isset($_POST['procura-LS'])){
$user_ID = $_POST['procura-LS'];
//substr(variavel, inicio, comprimento)
$user_ID = substr($user_ID, 0, 3);
$_SESSION['userID'] = $user_ID;
}
$user_ID = $_SESSION['userID'];
echo "User_ID: ".$user_ID;
include '../connect-db/connect-db.php';
$sql_select_funcionario = "SELECT funcionario.ID_Funcionario, funcionario.ID_Chefe, funcionario.ID_Departamento, funcionario.Nome, funcionario.DataNascimento, funcionario.Contacto, funcionario.Email, funcionario.password,
departamento.ID_Departamento, departamento.Designacao as DesignacaoDerp, departamento.Local_D as LocalDerp,
funcao.Designacao as DesignacaoFuncao,
contrato.Categoria as CategoriaContrato, contrato.DataInicio as DataInicioContrato, contrato.DataFim as DataFimContrato, contrato.ID_Contrato
FROM funcionario
LEFT JOIN departamento
on funcionario.ID_Departamento = departamento.ID_Departamento
LEFT JOIN funcao
on funcionario.ID_Funcionario = funcao.ID_Funcionario
LEFT JOIN contrato
on funcionario.ID_Funcionario = contrato.ID_Funcionario
WHERE funcionario.ID_Funcionario = '$user_ID'";
//SELECT * FROM funcionario LEFT JOIN departamento on funcionario.ID_Departamento = departamento.ID_Departamento where funcionario.ID_Funcionario=201

$resultado_db_funcionario = $ligacao->query($sql_select_funcionario) or die ($ligacao->error);
$array_funcionario = array();
$array_dadosEmpresaF = array();
while ($registo = $resultado_db_funcionario->fetch_assoc()) {
  //fazer uma query para verificar se o admin existe
  /*if ($user_ID != $registo['ID_Funcionario'] AND $user_password != $registo['password']){
    header('Location: ../login/login.php');
  }*/
  $array_funcionario['ID_Funcionario']=$registo['ID_Funcionario'];
  $array_funcionario['ID_Chefe']=$registo['ID_Chefe'];
  $array_funcionario['ID_Departamento']=$registo['ID_Departamento'];
  $array_funcionario['Nome']=$registo['Nome'];
  $array_funcionario['DataNascimento']=$registo['DataNascimento'];
  $array_funcionario['Contacto']=$registo['Contacto'];
  $array_funcionario['Email']=$registo['Email'];
  $array_funcionario['password']=$registo['password'];
  echo "<pre>";
  print_r($array_funcionario);
  echo "<pre>";
  echo "<br>Array Funcionario: ".(count($array_funcionario)/8);
  $_SESSION['funcionario'] = $array_funcionario;
  //setcookie?! eliminar ao fim de algum tempo? confirmar!

  $array_dadosEmpresaF['Derp_Designacao']=$registo['ID_Departamento']. " - " .$registo['DesignacaoDerp'];
  $array_dadosEmpresaF['Derp_Local']=$registo['LocalDerp'];
  $array_dadosEmpresaF['Funcao_Desigancao']=$registo['DesignacaoFuncao'];
  $array_dadosEmpresaF['Contrato_ID']=$registo['ID_Contrato'];
  $array_dadosEmpresaF['Contrato_Cat']=$registo['CategoriaContrato'];
  $array_dadosEmpresaF['Contrato_DataInicio']=$registo['DataInicioContrato'];
  $array_dadosEmpresaF['Contrato_DataFim']=$registo['DataFimContrato'];
  echo "<pre>";
  print_r($array_dadosEmpresaF);
  echo "<pre>";
  echo "<br>Array Dados Empresa: ".(count($array_dadosEmpresaF)/7);
  $_SESSION['dadosEmpresaF'] = $array_dadosEmpresaF;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_select_funcionario_curriculum = "SELECT * FROM curriculum WHERE ID_Funcionario = '$user_ID'";
$resultado_db_funcionario_curriculum = $ligacao->query($sql_select_funcionario_curriculum) or die ($ligacao->error);

$array_curriculum = array();
while ($registo = $resultado_db_funcionario_curriculum->fetch_assoc()) {
  array_push($array_curriculum, $registo['ID_Curriculum'], $registo['Titulo'], $registo['LocalForm']);
}
//na primeira posição está o ID_Curriculum para futuro update?
echo "<pre>";
print_r($array_curriculum);
echo "<pre>";
echo "<br>Array Curriculum: ".(count($array_curriculum)/3);
$_SESSION['curriculum'] = $array_curriculum;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_select_funcionario_formacao = "SELECT * FROM formacao WHERE ID_Funcionario = '$user_ID'";
$resultado_db_funcionario_formacao = $ligacao->query($sql_select_funcionario_formacao) or die ($ligacao->error);

$array_formacao = array();
while ($registo = $resultado_db_funcionario_formacao->fetch_assoc()) {
  array_push($array_formacao, $registo['ID_Formacao'], $registo['Titulo'], $registo['LocalForm'], $registo['DataInicio'], $registo['DataFim']);
}
//na primeira posição está o ID_Curriculum para futuro update?
$_SESSION['formacao'] = $array_formacao;
echo "<pre>";
print_r($array_formacao);
echo "<pre>";
echo "<br>Array Formação: ".(count($array_formacao)/5);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_select_mes_vencimento = "SELECT ID_Vencimento,DataVencimento FROM vencimento WHERE ID_Funcionario = '$user_ID'";
$resultado_db_vencimento = $ligacao->query($sql_select_mes_vencimento) or die ($ligacao->error);

$array_vencimento = array();
while ($registo_vencimento = $resultado_db_vencimento->fetch_assoc()) {
  array_push($array_vencimento,$registo_vencimento['DataVencimento']);
}
//na primeira posição está o ID_Curriculum para futuro update?
echo "<pre>";
print_r($array_vencimento);
echo "<pre>";
echo "<br>Array Vencimento: ".(count($array_vencimento));
$_SESSION['vencimento'] = $array_vencimento;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_select_hora_contrato = "SELECT ID_Contrato, F_H_entrada, F_H_saida FROM contrato WHERE ID_Funcionario = '$user_ID'";
$resultado_db_hora_contrato = $ligacao->query($sql_select_hora_contrato) or die ($ligacao->error);

$array_hora_contrato = array();
while ($registo_hora_contrato = $resultado_db_hora_contrato->fetch_assoc()) {
  $array_hora_contrato['ID_Contrato']=$registo_hora_contrato['ID_Contrato'];
  $array_hora_contrato['F_H_entrada']=$registo_hora_contrato['F_H_entrada'];
  $array_hora_contrato['F_H_saida']=$registo_hora_contrato['F_H_saida'];
}
//na primeira posição está o ID_Curriculum para futuro update?
echo "<pre>";
print_r($array_hora_contrato);
echo "<pre>";
echo "<br>Array Hora Contrato: ".(count($array_hora_contrato));
$_SESSION['hora_contrato'] = $array_hora_contrato;
setcookie("procuraFeita", "1", time() + 5,"/");
Header('Location: HomeRH/index.php');

?>
