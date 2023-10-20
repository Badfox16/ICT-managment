<?php

class ManutencaoDTO
{
    private $idManutencao;
    private $titulo;
    private $descricao;
    private $idEquipamento;

    // Construtor
    public function __construct($idManutencao, $titulo, $descricao, $idEquipamento)
    {
        $this->idManutencao = $idManutencao;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->idEquipamento = $idEquipamento;
    }

    // Métodos de acesso (Getters e Setters)
    public function getIdManutencao()
    {
        return $this->idManutencao;
    }

    public function setIdManutencao($idManutencao)
    {
        $this->idManutencao = $idManutencao;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getIdEquipamento()
    {
        return $this->idEquipamento;
    }

    public function setIdEquipamento($idEquipamento)
    {
        $this->idEquipamento = $idEquipamento;
    }
}
