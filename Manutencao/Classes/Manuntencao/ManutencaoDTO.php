<?php

class ManutencaoDTO {


    private $idManutencao;
    private $titulo;
    private $descricao;
    private $idComputador;
    private $idImpressora;
    private $idSwitch;
    private $idAntenasPA;
    private $idProjetor;

    



	/**
	 * @return mixed
	 */
	public function getIdManutencao() {
		return $this->idManutencao;
	}
	
	/**
	 * @param mixed $idManutencao 
	 * @return self
	 */
	public function setIdManutencao($idManutencao): self {
		$this->idManutencao = $idManutencao;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 * @param mixed $titulo 
	 * @return self
	 */
	public function setTitulo($titulo): self {
		$this->titulo = $titulo;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDescricao() {
		return $this->descricao;
	}
	
	/**
	 * @param mixed $descricao 
	 * @return self
	 */
	public function setDescricao($descricao): self {
		$this->descricao = $descricao;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdComputador() {
		return $this->idComputador;
	}
	
	/**
	 * @param mixed $idComputador 
	 * @return self
	 */
	public function setIdComputador($idComputador): self {
		$this->idComputador = $idComputador;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdImpressora() {
		return $this->idImpressora;
	}
	
	/**
	 * @param mixed $idImpressora 
	 * @return self
	 */
	public function setIdImpressora($idImpressora): self {
		$this->idImpressora = $idImpressora;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdSwitch() {
		return $this->idSwitch;
	}
	
	/**
	 * @param mixed $idSwitch 
	 * @return self
	 */
	public function setIdSwitch($idSwitch): self {
		$this->idSwitch = $idSwitch;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdAntenasPA() {
		return $this->idAntenasPA;
	}
	
	/**
	 * @param mixed $idAntenasPA 
	 * @return self
	 */
	public function setIdAntenasPA($idAntenasPA): self {
		$this->idAntenasPA = $idAntenasPA;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdProjetor() {
		return $this->idProjetor;
	}
	
	/**
	 * @param mixed $idProjetor 
	 * @return self
	 */
	public function setIdProjetor($idProjetor): self {
		$this->idProjetor = $idProjetor;
		return $this;
	}
}