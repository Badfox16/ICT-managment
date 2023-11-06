<?php


require_once 'SoftwareDTO.php';
require_once __DIR__ .'/../../../db/ConexaoDB.php';


class SoftwareDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tbSoftware";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        $softwares = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $software = new SoftwareDTO($resultado['Id_Software'], $resultado['Id_Equipamento'], $resultado['NomeSoftware'], $resultado['Fabricante'], $resultado['Versao'], $resultado['Estado'], $resultado['Observacoes'], $resultado['DiaInstalacao'], $resultado['DiaExpiracao']);
            $softwares[] = $software;
        }

        return $softwares;
    }
}
