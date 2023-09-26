<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/ICT/ICTDAO.php';
require_once 'Classes/ICT/ICTDTO.php';

$conexao = ConexaoBD::conectar();
$ICTDAO = new ICTDAO($conexao);
$id = filter_input(INPUT_GET, 'Id');
echo "ID recebido: $id";

try {
    $ICT = $ICTDAO->buscarPorId($id);
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar ICT</title>
</head>
<body>
<h2>Remover ICT</h2>

<form method="post" action="./Controllers/Apagar.php">
    <label for="id">ID do ICT a Remover:</label>
    <input type="hidden" name="id" id="id" value="<?= $ICT['Id_ICT']; ?>">
    <br> <br>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= $ICT['UsrLogin']; ?>" required>
    <br><br>
    <label for="apelido">Senha:</label>
    <input type="text" name="apelido" id="apelido" value="<?= $ICT['Senha']; ?>" required>
    <br><br>
    <input type="submit" value="Remover">
</form>
</body>
</html>