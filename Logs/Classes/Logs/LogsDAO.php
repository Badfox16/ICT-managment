<?php
require_once "../Database/ConexaoBD.php";
require_once "../Logs/LogsDTO.php";
class LogsDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbPatrimonio";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
