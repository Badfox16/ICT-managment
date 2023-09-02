<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require "../Conexao/ConexaoBD.php";
    $query = $connection->query("SELECT * FROM Usuario_TABLE");
    $listaUsuario = [];
    $query->rowCount() > 0 ? $listaUsuario = $query->fetchAll(PDO::FETCH_ASSOC) : "";
    ?>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Role</td>
            <td>Detalhe</td>
        </tr>
        <?php foreach ($listaUsuario as $usuarios) : ?>
            <tr>
                <td><?= $usuarios["id"] ?></td>
                <td><?= $usuarios["nome"] ?></td>
                <td><?= $usuarios["isAdmin"] ? "Admin" : "Usuário"; ?></td>
                <td>
                    <a href="./UsuarioAtualizar.php?usuarioTK=<?= $usuarios["id"] ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>