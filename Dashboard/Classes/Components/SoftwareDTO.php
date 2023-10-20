<?php

class SoftwareDTO
{
    private $idSoftware;
    private $idEquipamento;
    private $nomeSoftware;
    private $fabricante;
    private $versao;
    private $estado;
    private $observacoes;
    private $diaInstalacao;
    private $diaExpiracao;

    // Construtor
    public function __construct($idSoftware, $idEquipamento, $nomeSoftware, $fabricante, $versao, $estado, $observacoes, $diaInstalacao, $diaExpiracao)
    {
        $this->idSoftware = $idSoftware;
        $this->idEquipamento = $idEquipamento;
        $this->nomeSoftware = $nomeSoftware;
        $this->fabricante = $fabricante;
        $this->versao = $versao;
        $this->estado = $estado;
        $this->observacoes = $observacoes;
        $this->diaInstalacao = $diaInstalacao;
        $this->diaExpiracao = $diaExpiracao;
    }

    // Métodos de acesso (Getters e Setters)
    public function getIdSoftware()
    {
        return $this->idSoftware;
    }

    public function setIdSoftware($idSoftware)
    {
        $this->idSoftware = $idSoftware;
    }

    public function getIdEquipamento()
    {
        return $this->idEquipamento;
    }

    public function setIdEquipamento($idEquipamento)
    {
        $this->idEquipamento = $idEquipamento;
    }

    public function getNomeSoftware()
    {
        return $this->nomeSoftware;
    }

    public function setNomeSoftware($nomeSoftware)
    {
        $this->nomeSoftware = $nomeSoftware;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
    }

    public function getVersao()
    {
        return $this->versao;
    }

    public function setVersao($versao)
    {
        $this->versao = $versao;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }

    public function getDiaInstalacao()
    {
        return $this->diaInstalacao;
    }

    public function setDiaInstalacao($diaInstalacao)
    {
        $this->diaInstalacao = $diaInstalacao;
    }

    public function getDiaExpiracao()
    {
        return $this->diaExpiracao;
    }

    public function setDiaExpiracao($diaExpiracao)
    {
        $this->diaExpiracao = $diaExpiracao;
    }
}
