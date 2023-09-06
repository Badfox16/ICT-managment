<?php require '../Conexao/ConexaoBD.php';

$id = $_GET["softwareTK"];

$stmt = $connection->prepare("DELETE FROM Software_TABLE WHERE id_=:id");

$stmt->bindValue(":id", $id);
$stmt->execute();

$stmt->rowCount() > 0 ? header("Location: ./SoftwareVer.php") : header("Location: ../");
