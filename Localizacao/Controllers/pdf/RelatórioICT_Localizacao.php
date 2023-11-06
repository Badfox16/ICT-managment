<title>RELATORIO LOCALIZACAO</title>
<?php
require 'dompdf/vendor/autoload.php';
require_once __DIR__ . '/../../../db/ConexaoDB.php';

use Dompdf\Dompdf;

$connection = new ConexaoBD();
$conexao = mysqli_connect($connection->getHost(), $connection->getUsername(), $connection->getPassword(), $connection->getDbName());

if (mysqli_connect_errno()) {
    echo "falha ao conectar: " . mysqli_connect_error();
    die();
}

// Nome do Arquivo do Excel que será gerado
$arquivo = 'Relatorio_Localizacao.pdf';

// Criamos uma tabela HTML com o formato da planilha para excel
// Criamos uma tabela HTML com o formato da planilha para excel
$tabela .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$tabela = '<table style="border: 1px solid black; border-collapse: collapse; width: 100%;">';
$tabela .= '<tr>';
$tabela .= '<th colspan="2" style="border: 1px solid black; background-color: #f2f2f2; padding: 8px;"><b>MEMBROS DO PATRIMONIO</b></th>';
$tabela .= '</tr>';
$tabela .= '<tr style="border: 1px solid black; background-color: #f2f2f2;">';
$tabela .= '<th style="border: 1px solid black; padding: 8px;"><b>Nome da Sala</b></th>';
$tabela .= '<th style="border: 1px solid black; padding: 8px;"><b>Nome do Edifício</b></th>';
$tabela .= '</tr>';

// Puxando dados do Banco de dados
$sql = 'SELECT * FROM tbSala AS sala JOIN tbEdificio AS edificio ON edificio.Id_Edificio = sala.Id_Edificio;';

$resultado = mysqli_query($conexao, $sql);

while ($dados = mysqli_fetch_array($resultado)) {
    $tabela .= '<tr>';
    $tabela .= '<td style="border: 1px solid black; padding: 8px;">' . $dados["NomeSala"] . '</td>';
    $tabela .= '<td style="border: 1px solid black; padding: 8px;">' . $dados["NomeEdificio"] . '</td>';
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