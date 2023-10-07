<?php

class PatrimonioDTO {


    private $id;
    private $nome;
    private $apelido;
    private $contacto;
    private $email;
    private $usrLogin;
    private $estado;
    private $senha;
 


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
	public function getNome() {
		return $this->nome;
	}
	
	/**
	 * @param mixed $nome 
	 * @return self
	 */
	public function setNome($nome): self {
		$this->nome = $nome;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getApelido() {
		return $this->apelido;
	}
	
	/**
	 * @param mixed $apelido 
	 * @return self
	 */
	public function setApelido($apelido): self {
		$this->apelido = $apelido;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getContacto() {
		return $this->contacto;
	}
	
	/**
	 * @param mixed $contacto 
	 * @return self
	 */
	public function setContacto($contacto): self {
		$this->contacto = $contacto;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getUsrLogin() {
		return $this->usrLogin;
	}
	
	/**
	 * @param mixed $usrLogin 
	 * @return self
	 */
	public function setUsrLogin($usrLogin): self {
		$this->usrLogin = $usrLogin;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}
	
	/**
	 * @param mixed $estado 
	 * @return self
	 */
	public function setEstado($estado): self {
		$this->estado = $estado;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getSenha() {
		return $this->senha;
	}
	
	/**
	 * @param mixed $senha 
	 * @return self
	 */
	public function setSenha($senha): self {
		$this->senha = $senha;
		return $this;
	}
}