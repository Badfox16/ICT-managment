<?php
class LogsDTO
{
    private $usuario;
    private $hora;
    private $atividade;

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getHora()
    {
        return $this->hora;
    }
    public function setHora($hora)
    {
        $this->hora = $hora;
    }
    public function getAtividade()
    {
        return $this->atividade;
    }
    public function setAtividade($atividade)
    {
        $this->atividade = $atividade;
    }
}
