<?php

require_once 'ProjetorDTO.php';
require_once __DIR__ . '/../../Database/ConexaoBD.php';

class ProjetorDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(ProjetorDTO $Projetor)
    {
        $sql = "INSERT INTO tbProjetor (DescricaoProjetor, Marca, Modelo, NrDeSerie, Estado, Localizacao, Observacoes) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Projetor->getDescricao(), $Projetor->getMarca(), $Projetor->getModelo(), $Projetor->getNrDeSerie(), $Projetor->getEstado(), $Projetor->getLocalizacao(),  $Projetor->getObservacoes()]);
    }

    public function atualizar(ProjetorDTO $Projetor)
    {
        $sql = "UPDATE tbProjetor SET DescricaoProjetor = ?, Marca = ?, Modelo = ?, NrDeSerie = ?, Estado = ?, Localizacao = ?, Obersavacoes = ? WHERE Id_Projetor = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Projetor->getDescricao(), $Projetor->getMarca(), $Projetor->getModelo(), $Projetor->getNrDeSerie(), $Projetor->getEstado(), $Projetor->getLocalizacao(), $Projetor->getObservacoes(), $Projetor->getId()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbProjetor WHERE Id_Projetor = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbProjetor WHERE Id_Projetor = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbProjetor";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
