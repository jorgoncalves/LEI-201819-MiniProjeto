
<?php
header("Content-type: text/html; charset=ISO 8859-1", true);
include '../../connect-db/connect-db.php';
SESSION_START();
if ((!isset($_SESSION['user_number'])) AND (!isset($_SESSION['user_password']))){
  header('Location: ../../login/index.php');
}

if (isset($_SESSION['defini_E_S'])){

  $update_ID_Assi = $_SESSION['defini_E_S'];
  echo "ID_Assi= ".$update_ID_Assi."<br />";
  $data_hora_s = date("Y-m-d H:i:s");
  $sql_update="UPDATE assiduidade SET  HoraSaida='$data_hora_s' WHERE ID_Assiduidade='$update_ID_Assi'";

  if ($ligacao->query($sql_update) === TRUE) {
    echo "<br />"."Sucess!!";
    unset($_SESSION['defini_E_S']);
    header("Location: ../dadosFuncionario.php");
  } else {
    echo "Erro SQL: ".$sql_update."<br>Erro ligação: ".$ligacao->error;
  }
}else {
  $user_ID = $_SESSION['user_number'];
  $data_hora = date("Y-m-d H:i:s");
  $sql_update_assi = "INSERT INTO assiduidade SET ID_Funcionario='$user_ID', HoraEntrada = '$data_hora'";
  echo $sql_update_assi.'<br />';
  if ($ligacao->query($sql_update_assi) === TRUE){


    $sql_select = "SELECT ID_Assiduidade FROM assiduidade WHERE ID_Funcionario='$user_ID' AND HoraEntrada =  '$data_hora'";
    $resultado = $ligacao->query($sql_select) or die($ligacao->error);
    $registo = $resultado->fetch_array(MYSQLI_ASSOC);

    echo '<br />'.$sql_select.'<br />'.$registo['ID_Assiduidade'].'<br />s';
    $_SESSION['defini_E_S'] = $registo['ID_Assiduidade'];
    echo "Novo registro introduzido!";
    header('Location: ../dadosFuncionario.php');
  }else{
    echo "Erro: ".$sql_update_assi."<br>".$ligacao->error;
  }
}
?>
