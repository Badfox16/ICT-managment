<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Gerente/GerenteDAO.php';
require_once 'Classes/Gerente/GerenteDTO.php';

$conexao = ConexaoBD::conectar();
$gerenteDAO = new GerenteDAO($conexao);
$id = filter_input(INPUT_GET, 'Id');
echo "ID recebido: $id";

try {
    $gerente = $gerenteDAO->buscarPorId($id);
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Gerente</title>
</head>
<body>
<h2>Remover Gerente</h2>

<form method="post" action="Controllers/testeRemover.php">
    <label for="id">ID do Gerente a Remover:</label>
    <input type="hidden" name="id" id="id" value="<?= $gerente['Id_Gerente']; ?>">
    <br> <br>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= $gerente['Nome']; ?>" required>
    <br><br>
    <label for="apelido">Apelido:</label>
    <input type="text" name="apelido" id="apelido" value="<?= $gerente['Apelido']; ?>" required>
    <br><br>
    <input type="submit" value="Remover">
</form>
</body>
</html>