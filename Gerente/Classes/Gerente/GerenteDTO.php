<?php

class GerenteDTO {


    private $id;
    private $nome;
    private $apelido;
    private $contacto;
    private $usrLogin;
    private $senha;
 


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setApelido($apelido){
        $this->apelido = $apelido;
    }

    public function getApelido(){
        return $this->apelido;
    }

    public function setContacto($contacto){
        $this->contacto = $contacto;
    }

    public function getContacto(){
        return $this->contacto;
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