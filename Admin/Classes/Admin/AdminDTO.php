<?php

class AdminDTO {


    private $id;
    private $usrLogin;
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
}