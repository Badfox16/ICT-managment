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
$arquivo = 'Relatorio_Software.pdf';

// Criamos uma tabela HTML com o formato da planilha para excel
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$tabela = '<table border="1">';
$tabela .= '<td colspan="2">RELATORIO </tr>';
$tabela .= '<tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>Id</b></td>';
$tabela .= '<td><b>Id Computador</b></td>';
$tabela .= '<td><b>Nome Software</b></td>';
$tabela .= '<td><b>Fabricante</b></td>';
$tabela .= '<td><b>Versao</b></td>';
$tabela .= '<td><b>Estado</b></td>';
$tabela .= '<td><b>Observacoes</b></td>';
$tabela .= '<td><b>Categoria</b></td>';
$tabela .= '<td><b>Dia da Instalacao</b></td>';
$tabela .= '<td><b>Prazo do Software</b></td>';
$tabela .= '<td><b>DiaExpiracao</b></td>';
$tabela .= '</tr>';

$sql = 'SELECT* FROM tbSoftware';
// Puxando dados do Banco de dados

$resultado = mysqli_query($conexao, $sql);

while($dados = mysqli_fetch_array($resultado))
{
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';	
$tabela .= '<tr>';
$tabela .= '<td>'.$dados['Id_Software'].'</td>';
$tabela .= '<td>'.$dados['Id_Computador'].'</td>';
$tabela .= '<td>'.$dados['NomeSoftware'].'</td>';
$tabela .= '<td>'.$dados['Fabricante'].'</td>';
$tabela .= '<td>'.$dados['Versao'].'</td>';
$tabela .= '<td>'.$dados['Estado'].'</td>';
$tabela .= '<td>'.$dados['Observacoes'].'</td>';
$tabela .= '<td>'.$dados['Categoria'].'</td>';
$tabela .= '<td>'.$dados['DiaInstalacao'].'</td>';
$tabela .= '<td>'.$dados['PrazoSoftware'].'</td>';
$tabela .= '<td>'.$dados['DiaExpiracao'].'</td>';
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