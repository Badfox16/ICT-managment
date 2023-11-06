<?php
require_once 'ManutencaoDTO.php';
require_once __DIR__ .'/../../../../db/ConexaoDB.php';

class ManutencaoDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }


    public function inserir(ManutencaoDTO $manutencao)
    {
        $sql = "INSERT INTO tbManutencao (Titulo, Descricao, Id_Equipamento) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$manutencao->getTitulo(), $manutencao->getDescricao(), $manutencao->getIdEquipamento()]);
    }

    public function atualizar(ManutencaoDTO $manutencao)
    {
        $sql = "UPDATE tbManutencao SET Titulo = ?, Descricao = ?, Id_Equipamento = ? WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$manutencao->getTitulo(), $manutencao->getDescricao(), $manutencao->getIdEquipamento(), $manutencao->getIdManutencao()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbManutencao WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbManutencao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $manutencoes = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $manutencao = new ManutencaoDTO($resultado['Id_Manutencao'], $resultado['Titulo'], $resultado['Descricao'], $resultado['Id_Equipamento']);
            $manutencoes[] = $manutencao;
        }

        return $manutencoes;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbManutencao WHERE Id_Manutencao = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new ManutencaoDTO($resultado['Id_Manutencao'], $resultado['Titulo'], $resultado['Descricao'], $resultado['Id_Equipamento']);
        } else {
            return null;
        }
    }
}
