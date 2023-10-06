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
    <title>Editar Patrimonio</title>
</head>

<body>

    <h2>Editar Patrimonio</h2>
    <form method="post" action="Controllers/Editar.php">
        <label for="id">ID do Patrimonio a Atualizar:</label>
        <input type="hidden" name="id" id="id" value="<?= $Patrimonio['Id_Patrimonio']; ?>">
        <br> <br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= $Patrimonio['Nome']; ?>" required>
        <br><br>
        <label for="apelido">Apelido:</label>
        <input type="text" name="apelido" id="apelido" value="<?= $Patrimonio['Apelido']; ?>" required>
        <br><br>
        <label for="contacto">Contacto:</label>
        <input type="text" name="contacto" id="contacto" value="<?= $Patrimonio['Contacto']; ?>" required>
        <br><br>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" value="<?= $Patrimonio['UsrLogin']; ?>">
        <br><br>
        <input type="submit" value="Editar">
    </form>
</body>

</html>