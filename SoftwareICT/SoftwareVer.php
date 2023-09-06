<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require '../Conexao/ConexaoBD.php';
    $query = $connection->query("SELECT * FROM Software_TABLE;");
    $listarSoftware = [];
    $query->rowCount() > 0 ? $listarSoftware = $query->fetchAll(PDO::FETCH_ASSOC) : header("Location: ../");
    ?>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Estado</td>
            <td>Quantidade</td>
            <td>Validade</td>
            <td>Versao</td>
            <td>Detalhes</td>
        </tr>
        <?php foreach ($listarSoftware as $verSoftware) : ?>
            <tr>
                <td><?= $verSoftware["id_"] ?></td>
                <td><?= $verSoftware["nome_"] ?></td>
                <td><?= $verSoftware["estado_"] ?></td>
                <td><?= $verSoftware["quantidade_"] ?></td>
                <td><?= $verSoftware["validade_"] ?></td>
                <td><?= $verSoftware["versao_"] ?></td>
                <td>
                    <a href="./SoftwareAtualizar.php?softwareTK=<?= $verSoftware["id_"] ?>">
                        Editar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>