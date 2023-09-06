<?php require "../Conexao/ConexaoBD.php";
$nome = $_POST["nome"];
$password = $_POST["password"];
$isAdmin = $_POST["isAdmin"];

$stmt = $connection->prepare("INSERT INTO Usuario_TABLE (nome,pass, isAdmin) VALUES(:nome, :pass,:isAdmin);");

$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":pass", $password);
isset($isAdmin) ? $stmt->bindValue(":isAdmin", 1) : $stmt->bindValue(":isAdmin", 0);

$stmt->execute();

$stmt->rowCount() > 0 ? header("Location: ./UsuarioVer.php") : "";
