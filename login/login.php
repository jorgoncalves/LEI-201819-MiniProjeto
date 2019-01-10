<?php
header("Content-type: text/html; charset=ISO 8859-1", true);
include '../connect-db/connect-db.php';
$usernumberGRH = $_POST['GRH_number'];
$userpassGRH = $_POST['GRH_password'];
$userpassGRH = md5($userpassGRH);
//https://stackoverflow.com/questions/1972100/getting-the-first-character-of-a-string-with-str0
$check_if_AdminRH = $usernumberGRH[0];
//separar o primeiro caracter
$loginAdminRH = substr($usernumberGRH,1);
$sql_select_AdminRH = "SELECT ID_AdminRH,password FROM Administrador_RH WHERE ID_AdminRH = '$loginAdminRH' and password = '$userpassGRH'";
echo " Primeiro caracter: ".$check_if_AdminRH."<br />";


$resultadoAdminRH = $ligacao->query($sql_select_AdminRH) or die($ligacao->error);
$registoAdmin = $resultadoAdminRH->fetch_array(MYSQLI_ASSOC);
echo "Select AdminRH: ".$sql_select_AdminRH."<br />"."RegistoAdmin[0]: ".$registoAdmin['ID_AdminRH']."<br />"."RegistoAdmin['1']: ".$registoAdmin['password'];
//verificação do primeiro caracter
if ($check_if_AdminRH == 'a' AND $registoAdmin['ID_AdminRH']==$loginAdminRH AND $registoAdmin['password']==$userpassGRH){
  SESSION_START();
  $_SESSION['admin_number'] = $registoAdmin['ID_AdminRH'];
  $_SESSION['admin_password'] = $registoAdmin['password'];
  header("Location: ../AdminRH/dadosAdmin.php");
}else{
  $sql_select = "SELECT ID_Funcionario, Nome, password FROM funcionario WHERE ID_Funcionario = '$usernumberGRH' AND password = '$userpassGRH'";
  echo "Select Funcionario: ".$sql_select."<br>";
  $resultado = $ligacao->query($sql_select) or die($ligacao->error);
  //por causa da busca ser por primary key, sem está condição fica "preso" nesta janela caso o numero seja diferente
  if ($resultado->num_rows==0){
    echo "Não existe!";
    setcookie("login_errado", "1", time() + 5,"/");
    header ('Location: index.php');
  }
  $registo = $resultado->fetch_array(MYSQLI_ASSOC);
    //sem esta condição fica "preso" nesta janela se ao introduzir tiver letras.
    if($registo['ID_Funcionario'] != $usernumberGRH OR $registo['password'] != $userpassGRH){
      setcookie("login_errado", "1", time() + 5,"/");
      header ('Location: index.php');
    }
    //extra security primeiro verificar se existe só depois redirecionar para outra para criar SESSIONS!
    if ($registo['ID_Funcionario'] == $usernumberGRH AND $registo['password'] == $userpassGRH){
      SESSION_START();
      $_SESSION['user_number']=$registo['ID_Funcionario'];
      $_SESSION['user_password']=$registo['password'];
      //echo $_SESSION['user_number']."<br>".$_SESSION['user_password'];

      header('Location: ../Funcionario/dadosFuncionario.php');
    }
}
?>
