<?php require '../Conexao/ConexaoBD.php';
$id = $_POST["id"];
$nome = $_POST["nome"];
$estado = $_POST["estado"];
$quantidade = $_POST["quantidade"];
$validade = $_POST["validade"];
$versao = $_POST["versao"];

$stmt = $connection->prepare("UPDATE Software_TABLE SET nome_=:nome, estado_=:estado, quantidade_=:quantidade, validade_=:validade, versao_=:versao WHERE id_=:id;");

$stmt->bindValue(":id", $id);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":estado", $estado);
$stmt->bindValue(":quantidade", $quantidade);
$stmt->bindValue(":validade", $validade);
$stmt->bindValue(":versao", $versao);

$stmt->execute();

$stmt->rowCount() > 0 ? header("Location: ./SoftwareVer.php") : header("Location: ../");
