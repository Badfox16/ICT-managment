<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Hardware</title>
</head>

<body>
    <?php require '../Conexao/ConexaoBD.php';
    $listarHardwares = [];
    $query = $connection->query("SELECT * FROM Hardware_TABLE");

    $query->rowCount() > 0 ? $listarHardwares = $query->fetchAll(PDO::FETCH_ASSOC) : "";
    ?>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Estado</td>
            <td>Quantidade</td>
            <td>Dispositivos Ligados</td>
            <td>Dispositivos Suportados</td>
            <td>Atualizar</td>
        </tr>

        <?php foreach ($listarHardwares as $hardware) : ?>
            <tr>
                <td><?= $hardware["id_"] ?></td>
                <td><?= $hardware["nome_"] ?></td>
                <td><?= $hardware["estado_"] ?></td>
                <td><?= $hardware["quantidade_"] ?></td>
                <td><?= $hardware["dispLigados_"] ?></td>
                <td><?= $hardware["dispSuportados_"] ?></td>
                <td>
                    <a href="./HardwareAtualizar.php?equipamenteTK=<?= $hardware["id_"] ?>">Atualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>