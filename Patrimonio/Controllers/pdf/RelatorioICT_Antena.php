<title>RELATORIO ICT_Computador</title>
<?php
require 'dompdf/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
// variáveis para conexão em LOCALHOST
$conexao = mysqli_connect('localhost:3306', 'root', 'Jeremias1', 'bdICT');

if (mysqli_connect_errno()) {
   echo "falha ao conectar: " . mysqli_connect_error();
   die();
}

// Nome do Arquivo do Excel que será gerado
$arquivo = 'Relatorio_Antena.pdf';

// Criamos uma tabela HTML com o formato da planilha para excel
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$tabela = '<table border="1">';
$tabela .= '<td colspan="2">RELATORIO </tr>';
$tabela .= '<tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>Id</b></td>';
$tabela .= '<td><b>Descrição</b></td>';
$tabela .= '<td><b>Marca</b></td>';
$tabela .= '<td><b>Modelo</b></td>';
$tabela .= '<td><b>Número de série</b></td>';
$tabela .= '<td><b>Estado</b></td>';
$tabela .= '<td><b>Localização</b></td>';
$tabela .= '<td><b>Endereço Mac</b></td>';
$tabela .= '<td><b>Observação</b></td>';
$tabela .= '</tr>';

$sql = 'SELECT* FROM tbAntenasPA';
// Puxando dados do Banco de dados

$resultado = mysqli_query($conexao, $sql);

while ($dados = mysqli_fetch_array($resultado)) {
   $tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
   $tabela .= '<tr>';
   $tabela .= '<td>' . $dados['Id_AntenasPA'] . '</td>';
   $tabela .= '<td>' . $dados['DescricaoAntena'] . '</td>';
   $tabela .= '<td>' . $dados['Marca'] . '</td>';
   $tabela .= '<td>' . $dados['Modelo'] . '</td>';
   $tabela .= '<td>' . $dados['NrDeSerie'] . '</td>';
   $tabela .= '<td>' . $dados['Estado'] . '</td>';
   $tabela .= '<td>' . $dados['Localizacao'] . '</td>';
   $tabela .= '<td>' . $dados['MAC'] . '</td>';
   $tabela .= '<td>' . $dados['Observacoes'] . '</td>';
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