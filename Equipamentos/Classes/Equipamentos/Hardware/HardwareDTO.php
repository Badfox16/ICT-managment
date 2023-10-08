<?php

class HardwareDTO {

    private $idHardware;
    private $idComputador;
    private $idImpressora;
    private $idSwitch;
    private $idAntenasPA;
    private $idProjetor;

    // Getter methods
    public function getIdHardware() {
        return $this->idHardware;
    }

    public function getIdComputador() {
        return $this->idComputador;
    }

    public function getIdImpressora() {
        return $this->idImpressora;
    }

    public function getIdSwitch() {
        return $this->idSwitch;
    }

    public function getIdAntenasPA() {
        return $this->idAntenasPA;
    }

    public function getIdProjetor() {
        return $this->idProjetor;
    }

    // Setter methods
    public function setIdHardware($idHardware) {
        $this->idHardware = $idHardware;
    }

    public function setIdComputador($idComputador) {
        $this->idComputador = $idComputador;
    }

    public function setIdImpressora($idImpressora) {
        $this->idImpressora = $idImpressora;
    }

    public function setIdSwitch($idSwitch) {
        $this->idSwitch = $idSwitch;
    }

    public function setIdAntenasPA($idAntenasPA) {
        $this->idAntenasPA = $idAntenasPA;
    }

    public function setIdProjetor($idProjetor) {
        $this->idProjetor = $idProjetor;
    }
}
