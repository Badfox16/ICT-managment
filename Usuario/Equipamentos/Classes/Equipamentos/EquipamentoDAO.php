<?php

require_once 'EquipamentoDTO.php'; // Inclua o arquivo com a definição da classe EquipamentoDTO
require_once __DIR__ .'/../../../../db/ConexaoDB.php';

class EquipamentoDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(EquipamentoDTO $equipamento)
    {
        $sql = "INSERT INTO tbEquipamento (Tipo, Marca, Modelo, NrDeSerie, Estado, Localizacao, Fornecedor, DataFornecimento, DescricaoEquipamento, Observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$equipamento->getTipo(), $equipamento->getMarca(), $equipamento->getModelo(), $equipamento->getNrDeSerie(), $equipamento->getEstado(), $equipamento->getLocalizacao(), $equipamento->getFornecedor(), $equipamento->getDataFornecimento(), $equipamento->getDescricaoEquipamento(), $equipamento->getObservacoes()]);
    }

    public function atualizar(EquipamentoDTO $equipamento)
    {
        $sql = "UPDATE tbEquipamento SET Tipo = ?, Marca = ?, Modelo = ?, NrDeSerie = ?, Estado = ?, Localizacao = ?, Fornecedor = ?, DataFornecimento = ?, DescricaoEquipamento = ?, Observacoes = ? WHERE Id_Equipamento = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$equipamento->getTipo(), $equipamento->getMarca(), $equipamento->getModelo(), $equipamento->getNrDeSerie(), $equipamento->getEstado(), $equipamento->getLocalizacao(), $equipamento->getFornecedor(), $equipamento->getDataFornecimento(), $equipamento->getDescricaoEquipamento(), $equipamento->getObservacoes(), $equipamento->getIdEquipamento()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbEquipamento WHERE Id_Equipamento = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT 
        e.Id_Equipamento, 
        t.Tipo, 
        e.Marca, 
        e.Modelo, 
        e.NrDeSerie, 
        e.Estado, 
        s.NomeSala as Localizacao, 
        e.Fornecedor, 
        e.DataFornecimento, 
        e.DescricaoEquipamento, 
        e.Observacoes
    FROM 
        tbEquipamento e
    JOIN 
        tbTipo t ON e.Tipo = t.Id_Tipo
    JOIN 
        tbSala s ON e.Localizacao = s.Id_Sala WHERE e.Id_Equipamento = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function listarTodos()
    {
        $sql = "SELECT 
        e.Id_Equipamento, 
        t.Tipo, 
        e.Marca, 
        e.Modelo, 
        e.NrDeSerie, 
        e.Estado, 
        s.NomeSala as Localizacao, 
        e.Fornecedor, 
        e.DataFornecimento, 
        e.DescricaoEquipamento, 
        e.Observacoes
    FROM 
        tbEquipamento e
    JOIN 
        tbTipo t ON e.Tipo = t.Id_Tipo
    JOIN 
        tbSala s ON e.Localizacao = s.Id_Sala
    ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $equipamentos = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Criando um novo objeto EquipamentoDTO com os atributos básicos
            $equipamento = new EquipamentoDTO();
            $equipamento->setIdEquipamento($resultado['Id_Equipamento']);
            $equipamento->setTipo($resultado['Tipo']); // Tipo agora é o nome do tipo
            $equipamento->setMarca($resultado['Marca']);
            $equipamento->setModelo($resultado['Modelo']);
            $equipamento->setNrDeSerie($resultado['NrDeSerie']);
            $equipamento->setEstado($resultado['Estado']);
            $equipamento->setLocalizacao($resultado['Localizacao']);
            $equipamento->setFornecedor($resultado['Fornecedor']);
            $equipamento->setDataFornecimento($resultado['DataFornecimento']);
            $equipamento->setDescricaoEquipamento($resultado['DescricaoEquipamento']);
            $equipamento->setObservacoes($resultado['Observacoes']);

            // Adicionando o objeto ao array
            $equipamentos[] = $equipamento;
        }

        return $equipamentos;
    }
}
