<?php

class ICTDTO {


    private $id;
    private $usrLogin;

    private $email;
    private $estado;
    private $senha;
 


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setUsrLogin($usrLogin){
        $this->usrLogin = $usrLogin;
    }

    public function getUsrLogin(){
        return $this->usrLogin;
    }

	public function getSenha() {
		return $this->senha;
	}
	
	public function setSenha($senha): self {
		$this->senha = $senha;
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
}