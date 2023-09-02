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
    <title>Editar Admin</title>
</head>
<body>

<h2>Editar Administrador</h2>
    <form method="post" action="Controllers/AtualizarAdmin.php">
    <label for="id">ID do Admin a Atualizar:</label>
    <input type="hidden" name="id" id="id" value="<?= $Admin['Id_Admin']; ?>">
    <br> <br>
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" value="<?= $Admin['UsrLogin']; ?>" >
    <br><br>
    <label for="login">Senha:</label>
    <input type="text" name="senha" id="senha" value="<?= $Admin['Senha']; ?>" >
    <br><br>
    <input type="submit" value="Atualizar" >
    </form>
</body>
</html>
