<?php require '../Conexao/ConexaoBD.php';
$id = $_GET["usuarioTK"];

$stmt = $connection->prepare("DELETE FROM Usuario_TABLE WHERE id =:id");
$stmt->bindValue(":id", $id);

$stmt->execute();

$stmt->rowCount() > 0 ?  header("Location: ./UsuarioVer.php") : "Usuário não removido";
