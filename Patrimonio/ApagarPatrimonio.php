<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Patrimonio/PatrimonioDAO.php';
require_once 'Classes/Patrimonio/PatrimonioDTO.php';

$conexao = ConexaoBD::conectar();
$PatrimonioDAO = new PatrimonioDAO($conexao);
$id = filter_input(INPUT_GET, 'Id');
echo "ID recebido: $id";

try {
    $Patrimonio = $PatrimonioDAO->buscarPorId($id);
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Patrimonio</title>
</head>
<body>
<h2>Remover Patrimonio</h2>

<form method="post" action="Controllers/Remover.php">
    <label for="id">ID do Gerente do Patrimonio a Remover:</label>
    <input type="hidden" name="id" id="id" value="<?= $Patrimonio['Id_Patrimonio']; ?>">
    <br> <br>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= $Patrimonio['Nome']; ?>" required>
    <br><br>
    <label for="apelido">Apelido:</label>
    <input type="text" name="apelido" id="apelido" value="<?= $Patrimonio['Apelido']; ?>" required>
    <br><br>
    <input type="submit" value="Remover">
</form>
</body>
</html>