<?php
require_once "../Database/ConexaoBD.php";
require_once "../Logs/LogsDTO.php";
class LogsDAO
{
    public function listarTodos()
    {
        $sql = "SELECT * FROM logs";
        $resultado = ConexaoBD::conectar()->query($sql);
        $logs = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $logs;
    }
}
