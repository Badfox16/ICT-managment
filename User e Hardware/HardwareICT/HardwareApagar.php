<?php require '../Conexao/ConexaoBD.php';
$id = $_GET["equipamenteTK"];

$stmt = $connection->prepare("DELETE FROM Hardware_TABLE WHERE id_=:id");
$stmt->bindValue(":id", $id);

$stmt->execute();
$stmt->rowCount() > 0 ? header("Location: ./HardwareVer.php") : "";
