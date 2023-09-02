<?php require "../Conexao/ConexaoBD.php";
$nome = $_POST["nome"];
$estado = $_POST["estado"];
$quantidade = $_POST["quantidade"];
$dispLigados = $_POST["dispLigados"];
$dispSuportados = $_POST["dispSuportados"];

if ($quantidade >= $dispLigados && $quantidade >= $dispSuportados) {
    $stmt = $connection->prepare("INSERT INTO PHP_DB.Hardware_TABLE
(nome_, estado_, quantidade_, dispLigados_, dispSuportados_)
VALUES(:nome, :estado, :quantidade, :dispLigados, :dispSuportados);");

    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":estado", $estado);
    $stmt->bindValue(":quantidade", $quantidade);
    $stmt->bindValue(":dispLigados", $dispLigados);
    $stmt->bindValue(":dispSuportados", $dispSuportados);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "
        <script>
            alert('Equipamento registrado');
        </script>
    ";
        header("Location: ./HardwareVer.php");
    }
} elseif ($quantidade < $dispLigados || $quantidade < $dispSuportados) {
    echo "
    <script>
        alert('Quantidade não pode ser inferior aos dispositivos ligados ou suportados');
    </script>";
    header("Location: ../index.html");
} elseif ($dispLigados > $dispSuportados) {
    echo "
    <script>
        alert('Os dispositivos suportados não podem ser inferires aos ligados');
    </script>";
    header("Location: ../index.html");
}
