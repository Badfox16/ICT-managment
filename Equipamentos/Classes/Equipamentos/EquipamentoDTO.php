<?php

class EquipamentoDTO
{
    private $idEquipamento;
    private $tipo; //se é computador,impressora etc {ID}
    private $marca;
    private $modelo;
    private $nrDeSerie;
    private $estado; //ativo ou inativo 
    private $localizacao;
    private $fornecedor;
    private $dataFornecimento;
    private $descricaoEquipamento;
    private $observacoes;

    private $nomeTipo;

    // Métodos de acesso (Getters e Setters)
    public function getIdEquipamento()
    {
        return $this->idEquipamento;
    }

    public function setIdEquipamento($idEquipamento)
    {
        $this->idEquipamento = $idEquipamento;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getNrDeSerie()
    {
        return $this->nrDeSerie;
    }

    public function setNrDeSerie($nrDeSerie)
    {
        $this->nrDeSerie = $nrDeSerie;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getDataFornecimento()
    {
        return $this->dataFornecimento;
    }

    public function setDataFornecimento($dataFornecimento)
    {
        $this->dataFornecimento = $dataFornecimento;
    }

    public function getDescricaoEquipamento()
    {
        return $this->descricaoEquipamento;
    }

    public function setDescricaoEquipamento($descricaoEquipamento)
    {
        $this->descricaoEquipamento = $descricaoEquipamento;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }

    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }

    public function setNomeTipo($nomeTipo)
    {
        $this->nomeTipo = $nomeTipo;
    }
    
}
