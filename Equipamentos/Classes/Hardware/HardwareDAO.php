<?php

require_once 'HardwareDTO.php';
require_once __DIR__ . '/../Database/ConexaoBD.php';  

class HardwareDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(HardwareDTO $hardware)
    {
        $sql = "INSERT INTO tbHardware (Id_Equipamento) VALUES (?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$hardware->getIdEquipamento()]);
    }

    public function atualizar(HardwareDTO $hardware)
    {
        $sql = "UPDATE tbHardware SET Id_Equipamento = ? WHERE Id_Hardware = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$hardware->getIdEquipamento(), $hardware->getIdHardware()]);
    }

    public function remover($id)
    {
        $sql = "DELETE FROM tbHardware WHERE Id_Hardware = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbHardware";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $hardwares = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $hardware = new HardwareDTO($resultado['Id_Hardware'], $resultado['Id_Equipamento']);
            $hardwares[] = $hardware;
        }

        return $hardwares;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM tbHardware WHERE Id_Hardware = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new HardwareDTO($resultado['Id_Hardware'], $resultado['Id_Equipamento']);
        } else {
            return null;
        }
    }
}
