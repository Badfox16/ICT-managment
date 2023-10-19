<?php

class EquipamentoDTO
{
    private $idEquipamento;
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

    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }

    public function setNomeTipo($nomeTipo)
    {
        $this->nomeTipo = $nomeTipo;
    }
}
