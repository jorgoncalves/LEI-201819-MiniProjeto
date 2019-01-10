<?php
header("Content-type: text/html; charset=ISO 8859-1", true);
include '../connect-db/connect-db.php';
$usernumberGRH = $_POST['GRH_number'];
$userpassGRH = $_POST['GRH_password'];

//https://stackoverflow.com/questions/1972100/getting-the-first-character-of-a-string-with-str0
$check_if_AdminRH = $usernumberGRH[0];
//separar o primeiro caracter
$loginAdminRH = substr($usernumberGRH,1);
$sql_select_AdminRH = "SELECT ID_AdminRH FROM Administrador_RH WHERE ID_AdminRH = '$loginAdminRH'";
echo " Primeiro caracter: ".$check_if_AdminRH."<br />";

//esta a dar bug se fizer login com a201
//verificação do primeiro caracter
if ($check_if_AdminRH == 'a'){
  echo "Select AdminRH: ".$sql_select_AdminRH."<br />";
  $resultadoAdminRH = $ligacao->query($sql_select_AdminRH) or die($ligacao->error);
  while ( $registoAdmin = $resultadoAdminRH->fetch_assoc()) {
    if ($registoAdmin['ID_AdminRH']==$loginAdminRH)
    echo "certo<br />";
    header("Location: ../AdminRH/HomeRH/index.php");
  }
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
  while ($registo = $resultado->fetch_assoc()) {
    SESSION_START();
    //sem esta condição fica "preso" nesta janela se ao introduzir tiver letras.
    if($registo['ID_Funcionario'] != $usernumberGRH OR $registo['password'] != $userpassGRH){
      setcookie("login_errado", "1", time() + 5,"/");
      header ('Location: index.php');
    }
    //extra security primeiro verificar se existe só depois redirecionar para outra para criar SESSIONS!
    if ($registo['ID_Funcionario'] == $usernumberGRH AND $registo['password'] == $userpassGRH){
      $_SESSION['user_number']=$registo['ID_Funcionario'];
      $_SESSION['user_password']=$registo['password'];
      //echo $_SESSION['user_number']."<br>".$_SESSION['user_password'];

      header('Location: ../Funcionario/dadosFuncionario.php');
    }
  }
}
?>
