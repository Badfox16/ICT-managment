<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Patrimonio/PatrimonioDAO.php';
require_once 'Classes/Patrimonio/PatrimonioDTO.php';

$conexao = ConexaoBD::conectar();
$PatrimonioDAO = new PatrimonioDAO($conexao);

$Patrimonios = $PatrimonioDAO->listarTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Patrimonios</title>
</head>
<body>

<h2>Patrimonios</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Apelido</th>
        <th>Contacto</th>
        <th>Login</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($Patrimonios as $Patrimonio): ?>
        <tr>
            <td><?= $Patrimonio['Id_Patrimonio']; ?></td>
            <td><?= $Patrimonio['Nome']; ?></td>
            <td><?= $Patrimonio['Apelido']; ?></td>
            <td><?= $Patrimonio['Contacto']; ?></td>
            <td><?= $Patrimonio['UsrLogin']; ?></td>
            <td>
                <a href="EditarPatrimonio.php?Id=<?= $Patrimonio['Id_Patrimonio']; ?>">[Editar]</a>
                <a href="ApagarPatrimonio.php?Id=<?= $Patrimonio['Id_Patrimonio']; ?>">[Apagar]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
