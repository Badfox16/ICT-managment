<?php
require_once __DIR__ . '/../Log/LogsDTO.php';
require_once __DIR__ . '/../../../db/ConexaoDB.php';


class LogsDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbLogs";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
