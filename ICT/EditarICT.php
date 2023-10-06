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

    <title>Editar ICT</title>
</head>

<body>

    <h2>Editar admin ICT</h2>
        <form method="post" action="./Controllers/Editar.php">
            <label for="id">ID do ICT a Atualizar:</label>
            <input type="hidden" name="id" id="id" value="<?= $ICT['Id_ICT']; ?>">
            <br> <br>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" value="<?= $ICT['UsrLogin']; ?>">
            <br><br>
            <label for="login">Senha:</label>
            <input type="text" name="senha" id="senha" value="<?= $ICT['Senha']; ?>">
            <br><br>
            <input type="submit" value="Atualizar">
        </form>
	
</body>

</html>