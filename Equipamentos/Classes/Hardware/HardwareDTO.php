<?php

class HardwareDTO
{
    private $idHardware;
    private $idEquipamento;

    // Construtor
    public function __construct($idHardware, $idEquipamento)
    {
        $this->idHardware = $idHardware;
        $this->idEquipamento = $idEquipamento;
    }

    // Métodos de acesso (Getters e Setters)
    public function getIdHardware()
    {
        return $this->idHardware;
    }

    public function setIdHardware($idHardware)
    {
        $this->idHardware = $idHardware;
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
