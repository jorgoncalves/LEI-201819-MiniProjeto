<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

  <link rel="stylesheet" href="indexCss.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="indexCssMedia.css?v=<?php echo time(); ?>">

  <title>Home</title>
</head>
<body>
  <?php
  header("Content-type: text/html; charset=ISO 8859-1", true);
  SESSION_START();
  if ((!isset($_SESSION['user_number'])) AND (!isset($_SESSION['user_password']))){
    header('Location: ../../login/index.php');
  }
  include '../../connect-db/connect-db.php';
  ?>
  <div id="div_nav"></div>
  <script>
  $("#div_nav").load("../../nav/nav-plus-css.php");
  </script>

  <div id="div-conteudo-home">
    <form class="form-conteudo" action="index.html" method="post">
      <div class="div-header">
        <label class="descricao-form">Dados Pessoais</label>
        <a href="#" onclick="editar_Pessoais()" class="float-right">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>
      </div>
      <div class="div-dados-form">
        <label>Seu numero de funcionario</label>
        <br>
        <input type="text" name="" value="<?php echo $_SESSION["funcionario"]['ID_Funcionario'];?>" readonly>
        <br>
        <label>Nome</label>
        <br>
        <input type="text" name="" value="<?php echo $_SESSION["funcionario"]['Nome'];?>" readonly>
        <br>
        <label>Data Nascimento</label>
        <br>
        <input type="text" name="" value="<?php echo $_SESSION['funcionario']['DataNascimento'];?>" readonly>
        <br>
        <label>Número de contacto</label>
        <br>
        <input type="text" name="" value="<?php echo $_SESSION['funcionario']['Contacto'];?>" readonly>
        <br>
        <label>Email</label>
        <br>
        <input type="text" name="" value="<?php echo $_SESSION['funcionario']['Email'];?>" readonly>
      </div>
    </form>

    <form class="form-conteudo float-right" action="index.html" method="post">
      <div class="div-header">
        <label class="descricao-form">Dados Empresa</label>
        <!--<a href="#" onclick="" class="float-right">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>-->
    </div>
    <div class="div-dados-form">
      <label>Departamento</label>
      <br>
      <input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Derp_Designacao'];?>" readonly>
      <br>
      <label>Local Departamento</label>
      <br>
      <input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Derp_Local'];?>" readonly>
      <br>
      <label>Função no departamento</label>
      <br>
      <input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Funcao_Desigancao'];?>" readonly>
      <br>
      <label>Tipo de contrato</label>
      <br>
      <input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Contrato_Cat'];?>" readonly>
      <br>
      <label>Inicio de contrato</label>
      <br>
      <input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Contrato_DataInicio'];?>" readonly>
      <br>
      <label>Fim de Contrato</label>
      <br>
        <input type="text" name="" value="<?php if($_SESSION['dadosEmpresaF']['Contrato_DataFim'] != NULL ){echo $_SESSION['dadosEmpresaF']['Contrato_DataFim'];}else{echo "Sem termo";}?>" readonly>
    </div>
  </form>
  <form class="form-conteudo" action="index.html" method="post">
    <div class="div-header">
      <label class="descricao-form">Formação Académica</label>
      <a href="#" onclick="editar_Academica()" class="float-right">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>
    </div>
    <div class="div-dados-form">
      <div class="conteudo-formacao">
        <label class="div-header-sub">Curriculum</label>
        <br>
        <?php
        //variavel para percorrer as posições Titulo e Local
        $x=0;
        for ($i=0; $i < (count($_SESSION['curriculum'])/3); $i++) {
          //na posição 0 está o ID_Curriculum na 1 está a Titulo e na 2 o LocalForm; repete de 3 em 3 se tiver mais que uma titulo no curriculum.
          ?>
          <label>Título</label>
          <br>
          <input type="text" name="" value="<?php $x++; echo $_SESSION['curriculum'][$x];?>" readonly>
          <br>
          <label>Local Formação</label>
          <br>
          <input type="text" name="" value="<?php $x++; echo $_SESSION['curriculum'][$x];?>" readonly>
          <br>
          <?php
          //again para saltar o proximo ID_Curriculum;
          $x++;
        }
        ?>
      </div>
      <div class="conteudo-formacao" style="float:right;">
        <label class="div-header-sub">Formação Interna</label>
        <br>
        <?php
        //variavel para percorrer as posições Titulo e Local
        $y=0;
        for ($i=0; $i < (count($_SESSION['formacao'])/5); $i++) {
          //na posisção 0 está o ID_Formacao na 1 Titulo na 2 LocalForm 3 DataInicio 4 DataFim
          ?>
          <label>Titulo</label>
          <br>
          <input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>
          <br>
          <label>Local Formação</label>
          <br>
          <input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>
          <br>
          <label>Data Inicio</label>
          <br>
          <input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>
          <br>
          <label>Data Fim</label>
          <br>
          <input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>
          <br>
          <?php
          //again para saltar o proximo ID_Curriculum;
          $y++;
        }
        ?>
      </div>
    </div>
  </form>
  <form class="form-conteudo float-right" action="index.html" method="post">
    <div class="div-header">
      <label class="descricao-form">Vencimento</label>
    </div>
    <div class="div-dados-form">
      <?php
      if ($_SESSION['vencimento'] == NULL){
        ?>
        <a>Ainda não tem nenhum vencimento.</a>
        <?php
      }else{
        foreach ($_SESSION['vencimento'] as $key => $value) {
          ?>
          <a class="meses" href="../Vencimento/pdf-vencimento.php?mes=<?php echo escolher_mes($value);?>&ano=<?php echo escolher_ano($value);?>" target="_blank"><?php escolher_mes($value); echo " - ";escolher_ano($value)?></a>
          <br />
          <?php
        }
      }
      ?>
    </div>
  </form>
</div>
<script type="text/javascript">
function editar_Pessoais(){
  jconfirm({
    theme: 'material',
    columnClass: 'medium',
    title: 'Edição de dados Pessoais!',
    content:
    '<form method="GET">'+
    '<div class="div-dados-form">'+
    '<label>Nome</label>'+'<br>'+
    '<input type="text" id="update_ID_Funcionario" value=\"<?php echo $_SESSION["funcionario"]["ID_Funcionario"]; ?>\" readonly>'+'<br>'+
    '<label>Nome</label>'+'<br>'+
    '<input type="text" id="update_Nome" value=\"<?php echo $_SESSION["funcionario"]["Nome"]; ?>\">'+'<br>'+
    '<label>Data Nascimento</label>'+'<br>'+
    '<input type="text" id="update_DataNascimento" value=\"<?php echo $_SESSION["funcionario"]["DataNascimento"]; ?>\" />'+'<br>'+
    '<label>Número de contacto</label>'+'<br>'+
    '<input type="text" id="update_Contacto" value=\"<?php echo $_SESSION["funcionario"]["Contacto"];?>\">'+'<br>'+
    '<label>Email</label>'+'<br>'+
    '<input type=\'text\' id="update_Email" value=\"<?php echo $_SESSION["funcionario"]["Email"];?>\">'+
    '</div>'+
    '</form>',
    buttons: {
      Confirmar: function () {
        var update_ID_FuncionarioJS = this.$content.find('input#update_ID_Funcionario').val();
        var update_NomeJS = this.$content.find('input#update_Nome').val();
        var update_DataNascimentoJS = this.$content.find('input#update_DataNascimento').val();
        var update_ContactoJS = this.$content.find('input#update_Contacto').val();
        var update_EmailJS = this.$content.find('input#update_Email').val();
        window.location.href = 'update/updateDadosPessoais.php?ID_Funcionario='+update_ID_FuncionarioJS+'&Nome='+update_NomeJS+'&DataNascimento='+update_DataNascimentoJS+'&Contacto='+update_ContactoJS+'&Email='+update_EmailJS;
      },
      Cancelar: function () {

      },
    }
  });
};
function editar_Academica(){
  jconfirm({
    theme: 'material',
    columnClass: 'medium',
    title: 'Edição de dados do Curriculum!',
    content:
    '<form method="GET">'+
    '<div class="div-dados-form">'+
    '<label>Curriculum</label>'+'<br>'+
    '<?php
    //variavel para percorrer as posições Titulo e Local
    $x=0;
    for ($i=0; $i < (count($_SESSION['curriculum'])/3); $i++) {
      //na posição 0 está o ID_Curriculum na 1 está a Titulo e na 2 o LocalForm; repete de 3 em 3 se tiver mais que uma titulo no curriculum.
      ?>'+
      '<label>Título</label>'+'<br>'+
      '<input type="text" id="update_Titulo" name="" value="<?php $x++; echo $_SESSION['curriculum'][$x];?>">'+'<br>'+
      '<label>Local Formação</label>'+'<br>'+
      '<input type="text" id="update_Local"name="" value="<?php $x++; echo $_SESSION['curriculum'][$x];?>">'+'<br>'+
      '<?php
      //again para saltar o proximo ID_Curriculum;
      $x++;
    }
    ?>'+'<br />'+'<label id="label-adicionar" onclick="adicionar_titulo()">Adicionar novo Título</label>'+'</div>'+
    '</form>',
    buttons: {
      Confirmar: function () {
        var updateTituloJS = this.$content.find('input#update_Titulo').val();
        var updateLocalJS = this.$content.find('input#update_Local').val();
        window.location.href = 'update/updateCurriculum.php/Titulo='+updateTituloJS+'&Local='+updateLocalJS;
      },
      Cancelar: function () {

      },

    }
  });
};
function adicionar_titulo(){
  jconfirm({
    theme: 'material',
    columnClass: 'medium',
    title: 'Introdução de novo Título!',
    content:
    '<form method="GET">'+
    '<div class="div-dados-form">'+
    '<label>Título</label>'+'<br>'+
    '<input type="text" id="insert_Titulo">'+'<br>'+
    '<label>Local Formação</label>'+'<br>'+
    '<input type="text" id="insert_Local">'+'<br>',
    buttons: {
      Confirmar: function () {
        var insert_TituloJS = this.$content.find('input#insert_Titulo').val();
        var insert_LocalJS = this.$content.find('input#insert_Local').val();
        window.location.href = 'insert/insertCurriculum.php?ID_Funcionario='+<?php echo $_SESSION["funcionario"]["ID_Funcionario"]; ?>+'&Titulo='+insert_TituloJS+'&Local='+insert_LocalJS;
      },
      Cancelar: function () {

      },

    }
  });
};
</script>
<?php
function escolher_ano($ano){
  //começa em 0 e tem o lenght de 4
  $ano_numero = substr($ano,0,4);
  echo "$ano_numero";
}

function escolher_mes($mes_numerico){
  $mes_n = $mes_numerico[5].$mes_numerico[6];
  switch ($mes_n) {
    case '01':
    echo "Janeiro";
    break;
    case '02':
    echo "Fevereiro";
    break;
    case '03':
    echo "Março";
    break;
    case '04':
    echo "Abril";
    break;
    case '05':
    echo "Maio";
    break;
    case '06':
    echo "Junho";
    break;
    case '07':
    echo "Julho";
    break;
    case '08':
    echo "Agosto";
    break;
    case '09':
    echo "Setembro";
    break;
    case '10':
    echo "Outobro";
    break;
    case '11':
    echo "Novembro";
    break;
    case '12':
    echo "Dezembro";
    break;
    default:
    // code...
    break;
  }
}

?>
</body>
</html>
