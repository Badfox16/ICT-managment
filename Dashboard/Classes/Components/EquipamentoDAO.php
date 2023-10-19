<?php

require_once 'EquipamentoDTO.php'; // Inclua o arquivo com a definição da classe EquipamentoDTO
require_once __DIR__ . '/../Database/ConexaoBD.php';

class EquipamentoDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
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

    public function countEquipamentoSala()
    {
        $sql = "SELECT tbSala.NomeSala, COUNT(tbEquipamento.Id_Equipamento) AS ContagemEquipamentos FROM tbSala
        LEFT JOIN tbEquipamento ON tbSala.Id_Sala = tbEquipamento.Localizacao GROUP BY tbSala.Id_Sala";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
