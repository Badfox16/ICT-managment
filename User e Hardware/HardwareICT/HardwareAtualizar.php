<?php require "../Conexao/ConexaoBD.php";

$id = $_GET["equipamenteTK"];
$usuario = [];

if ($id) {
    $stmt = $connection->prepare("SELECT * FROM Hardware_TABLE WHERE id_ = :id");
    $stmt->bindValue(":id", $id);

    $stmt->execute();
    $stmt->rowCount() > 0 ? $usuario = $stmt->fetch(PDO::FETCH_ASSOC) : "Nenhum equipamento encontrado";
}
?>

<form action="./HardwareExecutarAtualizar.php" method="POST">
    <input type="hidden" name="usuarioId" value="<?= $usuario["id_"] ?>" />
    <input type="text" name="nome" placeholder="Nome" required value="<?= $usuario["nome_"] ?>" />
    <input type="text" name="estado" placeholder="Estado" required value="<?= $usuario["estado_"]; ?>" />
    <input type="text" name="quantidade" placeholder="Quantidade" required value="<?= $usuario["quantidade_"]; ?>" />
    <input type="text" name="Ligados" placeholder="Ligados" required value="<?= $usuario["dispLigados_"]; ?>" />
    <input type="text" name="Suportados" placeholder="suportados" required value="<?= $usuario["dispSuportados_"]; ?>" />
    <button>sub</button>
</form>
<a href="./HardwareApagar.php?equipamenteTK=<?= $usuario["id_"] ?>">
    <button>Apagar</button>
</a>