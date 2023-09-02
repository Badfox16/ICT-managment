<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Gerente/GerenteDAO.php';
require_once 'Classes/Gerente/GerenteDTO.php';

$conexao = ConexaoBD::conectar();
$gerenteDAO = new GerenteDAO($conexao);

$gerentes = $gerenteDAO->listarTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Gerentes</title>
</head>
<body>

<h2>Gerentes</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Apelido</th>
        <th>Contacto</th>
        <th>Login</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($gerentes as $gerente): ?>
        <tr>
            <td><?= $gerente['Id_Gerente']; ?></td>
            <td><?= $gerente['Nome']; ?></td>
            <td><?= $gerente['Apelido']; ?></td>
            <td><?= $gerente['Contacto']; ?></td>
            <td><?= $gerente['UsrLogin']; ?></td>
            <td>
                <a href="EditarGerente.php?Id=<?= $gerente['Id_Gerente']; ?>">[Editar]</a>
                <a href="ApagarGerente.php?Id=<?= $gerente['Id_Gerente']; ?>">[Apagar]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
