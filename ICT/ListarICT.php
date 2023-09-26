<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/ICT/ICTDAO.php';
require_once 'Classes/ICT/ICTDTO.php';

$conexao = ConexaoBD::conectar();
$ICTDAO = new ICTDAO($conexao);

$ICTs = $ICTDAO->listarTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver ICTistradores</title>
</head>
<body>

<h2>ICTs</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>Senha</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($ICTs as $ICT): ?>
        <tr>
            <td><?= $ICT['Id_ICT']; ?></td>
            <td><?= $ICT['UsrLogin']; ?></td>
            <td><?= $ICT['Senha']; ?></td>
            <td>
                <a href="EditarICT.php?Id=<?= $ICT['Id_ICT']; ?>">[Editar]</a>
                <a href="ApagarICT.php?Id=<?= $ICT['Id_ICT']; ?>">[Apagar]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
