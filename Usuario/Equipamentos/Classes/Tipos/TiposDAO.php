<?php

require_once 'TiposDTO.php';
require_once __DIR__ .'/../../../../db/ConexaoDB.php';

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

    public function existeTipoComNome($nomeTipo)
    {
        $sql = "SELECT COUNT(*) FROM tbTipo WHERE Tipo = :nomeTipo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nomeTipo', $nomeTipo, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function existeTipoComNome2($novoTipo)
    {
        $sql = "SELECT COUNT(*) FROM tipos WHERE nome = :nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $novoTipo);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // Se count for maior que 0, significa que o tipo já existe
        return $count > 0;
    }


    // Na classe TiposDAO, adicione a função deletarTipoPorNome
    public function deletarTipoPorNome($nomeTipo)
    {
        $sql = "DELETE FROM tbTipo WHERE Tipo = :nomeTipo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nomeTipo', $nomeTipo, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
