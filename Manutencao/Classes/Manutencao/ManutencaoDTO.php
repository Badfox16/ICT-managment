<?php

class ManutencaoDTO
{

    private $id_manutencao;
    private $id_equipamento;
    private $titulo;
    private $descricao;

	/**
	 * @return mixed
	 */
	public function getId_manutencao() {
		return $this->id_manutencao;
	}
	
	/**
	 * @param mixed $id_manutencao 
	 * @return self
	 */
	public function setId_manutencao($id_manutencao): self {
		$this->id_manutencao = $id_manutencao;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getId_equipamento() {
		return $this->id_equipamento;
	}
	
	/**
	 * @param mixed $id_equipamento 
	 * @return self
	 */
	public function setId_equipamento($id_equipamento): self {
		$this->id_equipamento = $id_equipamento;
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
}
