<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Admin/AdminDAO.php';
require_once 'Classes/Admin/AdminDTO.php';

$conexao = ConexaoBD::conectar();
$AdminDAO = new AdminDAO($conexao);

$Admins = $AdminDAO->listarTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Administradores</title>
</head>
<body>

<h2>Admins</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>Senha</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($Admins as $Admin): ?>
        <tr>
            <td><?= $Admin['Id_Admin']; ?></td>
            <td><?= $Admin['UsrLogin']; ?></td>
            <td><?= $Admin['Senha']; ?></td>
            <td>
                <a href="EditarAdmin.php?Id=<?= $Admin['Id_Admin']; ?>">[Editar]</a>
                <a href="ApagarAdmin.php?Id=<?= $Admin['Id_Admin']; ?>">[Apagar]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
