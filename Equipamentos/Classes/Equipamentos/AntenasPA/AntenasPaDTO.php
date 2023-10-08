<?php
class AntenasPaDTO
{

    private $id;
    private $descricao;
    private $marca;
    private $modelo;
    private $nrDeSerie;
    private $estado;
    private $localizacao;
    private $mac;
    private $ram;
    private $rom;
    private $observacoes;

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getNrDeSerie()
    {
        return $this->nrDeSerie;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    public function getMac()
    {
        return $this->mac;
    }

    public function getRam()
    {
        return $this->ram;
    }

    public function getRom()
    {
        return $this->rom;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    // Setter methods
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setNrDeSerie($nrDeSerie)
    {
        $this->nrDeSerie = $nrDeSerie;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }

    public function setMac($mac)
    {
        $this->mac = $mac;
    }

    public function setRam($ram)
    {
        $this->ram = $ram;
    }

    public function setRom($rom)
    {
        $this->rom = $rom;
    }

    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }
}
