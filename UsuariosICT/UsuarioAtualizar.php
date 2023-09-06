<?php require '../Conexao/ConexaoBD.php';
$id = $_GET["usuarioTK"];
$usuario = [];
$stmt = $connection->prepare("SELECT * FROM Usuario_TABLE WHERE id=:id;");
$stmt->bindValue(":id", $id);

$stmt->execute();
$stmt->rowCount() > 0 ? $usuario = $stmt->fetch(PDO::FETCH_ASSOC) : "Nenhum Usuario encontrado";

?>
<form action="./UsuarioExecutarAtualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $usuario["id"] ?>" required />
    <input type="text" name="nome" value="<?= $usuario["nome"] ?>" required min="4" />
    <input type="text" name="pass" value="<?= $usuario["pass"] ?>" required min="4" />
    <label for="admin">isAdmin</label>
    <?= $usuario["isAdmin"] ? "<input type='checkbox' name='isAdmin' id='admin' checked/>" : "<input type='checkbox' name='isAdmin' id='admin' />"; ?>
    <button>sub</button>
</form>
<a href="./UsuarioApagar.php?usuarioTK=<?= $usuario["id"] ?>">
    <button>Apagar</button>
</a>