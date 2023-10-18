<?php
require_once '../Classes/Database/ConexaoBD.php';
require_once '../Classes/ICT/ICTDAO.php';
require_once '../Classes/ICT/ICTDTO.php';



$conexao = ConexaoBD::conectar();
$ICTDAO = new ICTDAO($conexao);

if (isset($_GET['filtroEstado'])) {
    $estadoFiltrado = $_GET['filtroEstado'];
    $ICTs = $ictDAO->listarPorEstado($estadoFiltrado);
} else {
    
}

?>