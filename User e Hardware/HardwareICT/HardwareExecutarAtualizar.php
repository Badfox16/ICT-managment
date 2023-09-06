<?php require '../Conexao/ConexaoBD.php';


$id = $_POST["usuarioId"];
$nome = $_POST["nome"];
$estado = $_POST["estado"];
$quantidade = $_POST["quantidade"];
$dispLigado = $_POST["Ligados"];
$dispSuportados = $_POST["Suportados"];

$stmt = $connection->prepare("UPDATE Hardware_TABLE SET nome_=:nome, estado_=:estado, quantidade_=:quantidade, dispLigados_=:dispLigados, dispSuportados_=:dispSuportados WHERE id_=:id;");


$stmt->bindValue(":id", $id);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":estado", $estado);
$stmt->bindValue(":quantidade", $quantidade);
$stmt->bindValue(":dispLigados", $dispLigado);
$stmt->bindValue(":dispSuportados", $dispSuportados);

$stmt->execute();

$stmt->rowCount() > 0 ? header("Location: ./HardwareVer.php") : "";
