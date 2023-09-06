<?php require "../Conexao/ConexaoBD.php";
$nome = $_POST["nome"];
$estado = $_POST["estado"];
$quantidade = $_POST["quantidade"];
$validade = $_POST["validade"];
$versao = $_POST["versao"];

$stmt = $connection->prepare("INSERT INTO Software_TABLE (nome_, estado_, quantidade_, validade_, versao_)
VALUES(:nome,:estado,:quantidade, :validade, :versao);");

$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":estado", $estado);
$stmt->bindValue(":quantidade", $quantidade);
$stmt->bindValue(":validade", $validade);
$stmt->bindValue(":versao", $versao);

$stmt->execute();

$stmt->rowCount() > 0 ? header("Location: SoftwareVer.php") : header("Location: ../");
