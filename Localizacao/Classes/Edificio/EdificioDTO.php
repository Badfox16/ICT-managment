<?php

class EdificioDTO {

	private $id;
	private $nomeEdificio;

   

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNomeEdificio() {
		return $this->nomeEdificio;
	}
	
	/**
	 * @param mixed $nomeEdificio 
	 * @return self
	 */
	public function setNomeEdificio($nomeEdificio): self {
		$this->nomeEdificio = $nomeEdificio;
		return $this;
	}
}