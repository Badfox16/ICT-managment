<?php

require_once 'TiposDTO.php';
require_once __DIR__ . '/../Database/ConexaoBD.php';

class TiposDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserirTipo($tipo)
    {
        $sql = "INSERT INTO tbTipo (Tipo) VALUES (:tipo)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function listarTodos()
    {
        $sql = "SELECT * FROM tbTipo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $tipos = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tipo = new TiposDTO();
            $tipo->setIdTipo($resultado['Id_Tipo']);
            $tipo->setTipo($resultado['Tipo']);
            $tipos[] = $tipo;
        }

        return $tipos;
    }

    public function deletarTipo($idTipo)
    {
        $sql = "DELETE FROM tbTipo WHERE Id_Tipo = :idTipo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':idTipo', $idTipo, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function atualizarTipo($idTipo, $tipo)
    {
        $sql = "UPDATE tbTipo SET Tipo = :tipo WHERE Id_Tipo = :idTipo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':idTipo', $idTipo, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
