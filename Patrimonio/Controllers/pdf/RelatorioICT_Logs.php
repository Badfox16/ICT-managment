<title>RELATORIO de Equipamentos ICT</title>
<?php
require 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Variáveis para conexão em LOCALHOST
$conexao = mysqli_connect('localhost', 'root', '', 'bdICT');

if (mysqli_connect_errno()) {
    echo "Falha ao conectar: " . mysqli_connect_error();
    die();
}

// Nome do Arquivo do PDF que será gerado
$arquivo = 'Relatorio_LOGs.pdf';

// Inicializa a tabela HTML
$tabela = '<table border="1">
    <tr>
        <td colspan="4"><b>RELATORIO de LOGs</b></td>
    </tr>
    <tr><center>
        <td><b>Id</b></td>
        <td><b>Usuário</b></td>
        <td><b>Atividade</b></td>
        <td><b>Hora</b></td>
    </tr>
';

$sql = 'SELECT * FROM tbLogs';

// Puxando dados do Banco de dados
$resultado = mysqli_query($conexao, $sql);

while ($dados = mysqli_fetch_array($resultado)) {
    // Adicione cada linha de dados à tabela dentro do loop
    $tabela .= '
    <tr>
        <td>' . $dados['Id_logs'] . '</td>
        <td>' . $dados['Usuario'] . '</td>
        <td>' . $dados['Atividade'] . '</td>
        <td>' . $dados['Hora'] . '</td>
    </tr>
';
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