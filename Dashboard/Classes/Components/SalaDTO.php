<?php

class SalaDTO {


    private $id;
    private $nomeSala;
    private $id_edificio;

 


   

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
	public function getNomeSala() {
		return $this->nomeSala;
	}
	
	/**
	 * @param mixed $nomeSala 
	 * @return self
	 */
	public function setNomeSala($nomeSala): self {
		$this->nomeSala = $nomeSala;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getId_edificio() {
		return $this->id_edificio;
	}
	
	/**
	 * @param mixed $id_edificio 
	 * @return self
	 */
	public function setId_edificio($id_edificio): self {
		$this->id_edificio = $id_edificio;
		return $this;
	}
}