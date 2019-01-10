<?php
require '../../../../../../fpdf/fpdf.php';
include_once '../../connect-db/connect-db.php';

session_start();
if (((!isset($_SESSION['user_number'])) AND (!isset($_SESSION['user_password'])))){
  header('Location: ../../login/index.php');
}

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

class PDF extends FPDF{

  protected $col = 0; // Current column
  protected $y0;      // Ordinate of column start

  function Header (){
    // Logo
    $this->Image('../../imagens/logo.png',10,6);
    // Arial bold 15
    $this->SetFont('Arial','B',14.5);
    //Cell ( width, height, text, border, end line, [align], fill, link)
    $this->Cell(189,10,'Gestão de Recursos Humanos',0,1,'C');//End line
    // Line break
    $this->Ln(10);
    //set font Arial, bold, 14pt
    $this->SetFont('Arial','B',14);
    //Cell ( width, height, text, border, end line, [align], fill, link)
    //Cabeçalho
    $this->SetFont('Arial','',12);
    $this->Cell(63,6,'Nome: '.$_SESSION["funcionario"]["Nome"],0,0,'L');
    $this->Cell(63,6,'Mês vencimento: '.$_GET['mes'],0,0,'L');
    $this->Cell(63,6,'Gerado a: '.date("j-m-Y"),0,1,'L');//End line
    $this->Cell(63,6,'Número: '.$_SESSION["funcionario"]["ID_Funcionario"],0,1,'L');//End line
  }
  function Footer(){
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'-{nb}',0,0,'C');
  }
}

function escolher_mes($mes_numerico){
    switch ($mes_numerico) {
      case 'Janeiro':
      $numero = '01';
      return $numero = '01';
      break;
      case 'Fevereiro':
      $numero = '02';
      return $numero;
      break;
      case 'Março':
      $numero = 03;
      return $numero;
      break;
      case 'Abril':
      $numero = 04;
      return $numero;
      break;
      case 'Maio':
      $numero = 05;
      return $numero;
      break;
      case 'Junho':
      $numero = 06;
      return $numero;
      break;
      case 'Julho':
      $numero = 07;
      return $numero;
      break;
      case 'Agosto':
      $numero = '08';
      return $numero;
      break;
      case 'Setembro':
      $numero = '09';
      return $numero;
      break;
      case 'Outobro':
      $numero = 10;
      return $numero;
      break;
      case 'Novembro':
      $numero = 11;
      return $numero;
      break;
      case 'Dezembro':
      $numero = 12;
      return $numero;
      break;
      default:

      break;
    }
  }

$mes = $_GET['mes'];
$ano = $_GET['ano'];
$numero_mes = escolher_mes($mes);
$array_entrada = array();
$array_saida = array();
$sql_ID = $_SESSION['funcionario']['ID_Funcionario'];

$select_assiduidade = "SELECT ID_Assiduidade, HoraEntrada, HoraSaida FROM assiduidade WHERE ID_Funcionario = '$sql_ID'";
$resultado_db = $ligacao->query($select_assiduidade) or die ($ligacao->error);
while ($registo = $resultado_db->fetch_assoc()) {
  array_push($array_entrada, $registo['HoraEntrada']);
  array_push($array_saida, $registo['HoraSaida']);
}

$select_vencimento = "SELECT ID_Vencimento, SalarioFinal FROM vencimento WHERE ID_Funcionario = $sql_ID AND DataVencimento BETWEEN '$ano-$numero_mes-01' and '$ano-$numero_mes-31'";
$resultado_db_vencimento = $ligacao->query($select_vencimento) or die ($ligacao->error);
$registo_vencimento = $resultado_db_vencimento->fetch_array(MYSQLI_ASSOC);

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln(10);
$pdf->Cell(60,6,$mes,0,1);
$pdf->SetFont('Arial','',10);
$y=31;
for ($i=1; $i <= $y ; $i++) {
  //Cell ( width, height, text, border, end line, [align], fill, link)
  $pdf->Cell(6,5,$i,1,0,'C');
}
$pdf->Ln(12);
$pdf->Cell(186,0,'',1,1);
//Cell ( width, height, text, border, end line, [align], fill, link)
$pdf->Cell(60,12,'Salario Base',0,0,'L');
$pdf->Cell(60,12,$registo_vencimento['SalarioFinal'] . '$',0,1,'L');
//Ln -> Line break (height), By default, the value equals the height of the last printed cell.
$pdf-> Output();
?>
