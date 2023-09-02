<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Admin/AdminDAO.php';
require_once 'Classes/Admin/AdminDTO.php';

$conexao = ConexaoBD::conectar();
$AdminDAO = new AdminDAO($conexao);
$id = filter_input(INPUT_GET, 'Id');
echo "ID recebido: $id";

try {
    $Admin = $AdminDAO->buscarPorId($id);
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Admin</title>
</head>
<body>
<h2>Remover Admin</h2>

<form method="post" action="Controllers/RemoverAdmin.php">
    <label for="id">ID do Admin a Remover:</label>
    <input type="hidden" name="id" id="id" value="<?= $Admin['Id_Admin']; ?>">
    <br> <br>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= $Admin['UsrLogin']; ?>" required>
    <br><br>
    <label for="apelido">Senha:</label>
    <input type="text" name="apelido" id="apelido" value="<?= $Admin['Senha']; ?>" required>
    <br><br>
    <input type="submit" value="Remover">
</form>
</body>
</html>