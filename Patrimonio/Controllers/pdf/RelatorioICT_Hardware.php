<title>RELATORIO ICT_Computador</title>
<?php
require 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
// variáveis para conexão em LOCALHOST
  $conexao = mysqli_connect('localhost', 'root', '', 'bdICT');
 
   if (mysqli_connect_errno()){
      echo "falha ao conectar: ". mysqli_connect_error();
   die();
   }

// Nome do Arquivo do Excel que será gerado
$arquivo = 'Relatorio_Hardware.pdf';

// Criamos uma tabela HTML com o formato da planilha para excel
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$tabela = '<table border="1">';
$tabela .= '<td colspan="2">RELATORIO </tr>';
$tabela .= '<tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>Id Hardeware</b></td>';
$tabela .= '<td><b>Id Computador</b></td>';
$tabela .= '<td><b>Id Impressora</b></td>';
$tabela .= '<td><b>Id Switch</b></td>';
$tabela .= '<td><b>Id_AntenasPA</b></td>';
$tabela .= '<td><b>Id_Projetor</b></td>';
$tabela .= '</tr>';

$sql = 'SELECT Id_Hardware,Id_Computador,Id_Impressora, Id_Switch,Id_AntenasPA, Id_Projetor FROM tbHardware';
// Puxando dados do Banco de dados

$resultado = mysqli_query($conexao, $sql);

while($dados = mysqli_fetch_array($resultado))
{
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';	
$tabela .= '<tr>';
$tabela .= '<td>'.$dados['Id_Hardware'].'</td>';
$tabela .= '<td>'.$dados['Id_Computador'].'</td>';
$tabela .= '<td>'.$dados['Id_Impressora'].'</td>';
$tabela .= '<td>'.$dados['Id_Switch'].'</td>';
$tabela .= '<td>'.$dados['Id_AntenasPA'].'</td>';
$tabela .= '<td>'.$dados['Id_Projetor'].'</td>';
$tabela .= '</tr>';
}

$tabela .= '</table>';

// Crie uma instância do Dompdf
$dompdf = new Dompdf();

// Carregue o HTML no Dompdf
$dompdf->loadHtml($tabela);

// Renderize o PDF
$dompdf->render();

// Defina o cabeçalho para PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $arquivo . '"');

// Saída do PDF para o navegador
echo $dompdf->output();

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>