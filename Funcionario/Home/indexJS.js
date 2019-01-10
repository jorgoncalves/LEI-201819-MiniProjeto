//http://craftpip.github.io/jquery-confirm/
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

function editar_DEmpresa(){
  jconfirm({
    theme: 'material',
    title: 'Edição dos Dados da Empresa!',
    content:
    '<div class="div-dados-form">'+
    '<label>Departamento</label>'+'<br>'+
    '<input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Derp_Designacao'];?>" readonly>'+'<br>'+
    '<label>Local Departamento</label>'+'<br>'+
    '<input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Derp_Local'];?>" readonly>'+'<br>'+
    '<label>Função no departamento</label>'+'<br>'+
    '<input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Funcao_Desigancao'];?>" readonly>'+'<br>'+
    '<label>Tipo de contrato</label>'+'<br>'+
    '<input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Contrato_Cat'];?>" readonly>'+'<br>'+
    '<label>Inicio de contrato</label>'+'<br>'+
    '<input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Contrato_DataInicio'];?>" readonly>'+'<br>'+
    '<label>Fim de Contrato</label>'+'<br>'+
    '<input type="text" name="" value="<?php echo $_SESSION['dadosEmpresaF']['Contrato_DataFim'];?>" readonly>'+
    '</div>',
    buttons: {
      Confirmar: function () {
        theme: 'Bootstrap',
        window.location.href = 'remover.php';
      },
      Cancelar: function () {

      },

    }
  });
};

function editar_Academica(){
  jconfirm({
    columnClass: 'medium',
    theme: 'material',
    title: 'Cuidado!',
    content:
    '<div class="conteudo-formacao">'+
    '<label>Curriculum</label>'+'<br>'+
    '<?php
    //variavel para percorrer as posições Titulo e Local
    $x=0;
    for ($i=0; $i < (count($_SESSION['curriculum'])/3); $i++) {
      //na posição 0 está o ID_Curriculum na 1 está a Titulo e na 2 o LocalForm; repete de 3 em 3 se tiver mais que uma titulo no curriculum.
      ?>'+
      '<label>Titulo</label>'+'<br>'+
      '<input type="text" name="" value="<?php $x++; echo $_SESSION['curriculum'][$x];?>" readonly>'+'<br>'+
      '<label>Local Formação</label>'+'<br>'+
      '<input type="text" name="" value="<?php $x++; echo $_SESSION['curriculum'][$x];?>" readonly>'+'<br>'+
      '<?php
      //again para saltar o proximo ID_Curriculum;
      $x++;
    }
    ?>'+
    '</div>'+
    '<div class="conteudo-formacao" style="float:right;">'+
    '<label>Formação Interna</label>'+'<br>'+
    '<?php
    //variavel para percorrer as posições Titulo e Local
    $y=0;
    for ($i=0; $i < (count($_SESSION['formacao'])/5); $i++) {
      //na posisção 0 está o ID_Formacao na 1 Titulo na 2 LocalForm 3 DataInicio 4 DataFim
      ?>'+
      '<label>Titulo</label>'+'<br>'+
      '<input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>'+'<br>'+
      '<label>Local Formação</label>'+'<br>'+
      '<input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>'+'<br>'+
      '<label>Data Inicio</label>'+'<br>'+
      '<input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>'+'<br>'+
      '<label>Data Fim</label>'+'<br>'+
      '<input type="text" name="" value="<?php $y++; echo $_SESSION['formacao'][$y];?>" readonly>'+'<br>'+
      '<?php
      //again para saltar o proximo ID_Curriculum;
      $y++;
    }
    ?>'+'<br />'+
    '</div>',
    buttons: {
      Confirmar: function () {
        theme: 'Bootstrap',
        window.location.href = 'remover.php';
      },
      Cancelar: function () {

      },

    }
  });
};
