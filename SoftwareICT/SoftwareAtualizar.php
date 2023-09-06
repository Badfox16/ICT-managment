<?php require '../Conexao/ConexaoBD.php';
$id = $_GET["softwareTK"];
$software = [];
$stmt = $connection->prepare("SELECT * FROM Software_TABLE WHERE id_=:id;");
$stmt->bindValue(":id", $id);

$stmt->execute();

$stmt->rowCount() > 0 ? $software = $stmt->fetch(PDO::FETCH_ASSOC) : header("Location: ../");
?>

<form action="SoftwareExecutarAtualizar.php" method="POST">
    <input type="hidden" name="id" placeholder="Nome" required min="4" value="<?= $software["id_"] ?>" />
    <input type="text" name="nome" placeholder="Estado" required value="<?= $software["nome_"] ?>" />
    <input type="text" name="estado" placeholder="Estado" required value="<?= $software["estado_"] ?>" />
    <input type="number" name="quantidade" placeholder="Quantidade" required value="<?= $software["quantidade_"] ?>" />
    <input type="text" name="validade" placeholder="Validade" required value="<?= $software["validade_"] ?>" />
    <input type="text" name="versao" placeholder="Versao" required value="<?= $software["versao_"] ?>" />
    <button>sub</button>
</form>
<a href="./SoftwareApagar.php?softwareTK=<?= $software["id_"] ?>">
    <button>Apagar</button>
</a>