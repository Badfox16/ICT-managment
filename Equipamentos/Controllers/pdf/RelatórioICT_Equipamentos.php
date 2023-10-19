<title>RELATORIO ICT</title>
<?php
require 'dompdf/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
// variáveis para conexão em LOCALHOST
$conexao = mysqli_connect('localhost:3306', 'root', 'pedrinho2003', 'bdICT');

if (mysqli_connect_errno()) {
   echo "falha ao conectar: " . mysqli_connect_error();
   die();
}

// Nome do Arquivo do Excel que será gerado

$tipoEquipamentos = $_POST["tipoEquipamentos"];
$dataInicio = $_POST["dataInicio"];
$dataFinal = $_POST["dataFinal"];
$opcoesEstado = $_POST["opcoesEstado"];

$arquivo = 'Relatorio_Equipamentos.pdf';

$tabela = '<table border="1" style="border-collapse: collapse; width: 100%; margin-right:5rem;">';
$tabela .= '<tr>';
$tabela .= '<th colspan="10" style="background-color: #f2f2f2; padding: 6px;"><b>RELATORIO</b></th>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<th style="padding-left: 5px;"><b>Id</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Tipo</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Marca</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Modelo</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Estado</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Localização</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Fornecedor</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Data da aquisição</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Descrição do equipamento</b></th>';
$tabela .= '<th style="padding-left: 5px;"><b>Observações</b></th>';
$tabela .= '</tr>';

if ($dataInicio > date("Y-m-d H:i:s")) {
   echo "<h1>Error: a data inserida é inválida!<h1>";
} else {
   // Puxando dados do Banco de dados
   if ($tipoEquipamentos == "todosEquipamentos" && $opcoesEstado == "todos") {
      $sql = "SELECT e.*, t.Tipo FROM tbEquipamento e JOIN tbTipo t ON e.Tipo = t.Id_Tipo WHERE DataFornecimento BETWEEN '$dataInicio' AND '$dataFinal'";
   } else if ($tipoEquipamentos != "todosEquipamentos" && $opcoesEstado == "todos") {
      $sql = "SELECT e.*, t.Tipo FROM tbEquipamento e JOIN tbTipo t ON e.Tipo = t.Id_Tipo WHERE DataFornecimento BETWEEN '$dataInicio' AND '$dataFinal' AND t.Tipo='$tipoEquipamentos'";
   } else if ($tipoEquipamentos == "todosEquipamentos" && $opcoesEstado != "todos") {
      $sql = "SELECT e.*, t.Tipo FROM tbEquipamento e JOIN tbTipo t ON e.Tipo = t.Id_Tipo WHERE DataFornecimento BETWEEN '$dataInicio' AND '$dataFinal' AND Estado='$opcoesEstado'";
   } else {
      $sql = "SELECT e.*, t.Tipo FROM tbEquipamento e JOIN tbTipo t ON e.Tipo = t.Id_Tipo WHERE DataFornecimento BETWEEN '$dataInicio' AND '$dataFinal' AND t.Tipo='$tipoEquipamentos'AND Estado='$opcoesEstado'";
   }
}
$resultado = mysqli_query($conexao, $sql);

while ($dados = mysqli_fetch_array($resultado)) {
   $tabela .= '<tr>';
   $tabela .= '<td>' . $dados['Id_Equipamento'] . '</td>';
   $tabela .= '<td>' . $dados['Tipo'] . '</td>';
   $tabela .= '<td>' . $dados['Marca'] . '</td>';
   $tabela .= '<td>' . $dados['Modelo'] . '</td>';
   $tabela .= '<td>' . $dados['Estado'] . '</td>';
   $tabela .= '<td>' . $dados['Localizacao'] . '</td>';
   $tabela .= '<td>' . $dados['Fornecedor'] . '</td>';
   $tabela .= '<td>' . $dados['DataFornecimento'] . '</td>';
   $tabela .= '<td>' . $dados['DescricaoEquipamento'] . '</td>';
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