<?php require '../Conexao/ConexaoBD.php';

$id = $_POST["id"];
$nome = $_POST["nome"];
$password = $_POST["pass"];
$isAdmin = $_POST["isAdmin"];

$stmt = $connection->prepare("UPDATE Usuario_TABLE SET pass=:pass, isAdmin=:isAdmin, nome=:nome WHERE id=:id;");

$stmt->bindValue(":id", $id);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":pass", $password);
isset($isAdmin) ? $stmt->bindValue(":isAdmin", 1) : $stmt->bindValue(":isAdmin", 0);
$stmt->execute();

$stmt->rowCount() > 0 ? header("Location: ./UsuarioVer.php") : "";
