<?php

require_once __DIR__ .'/../../db/ConexaoDB.php';
require_once '../Classes/ICT/ICTDAO.php';
require_once '../Classes/ICT/ICTDTO.php';



$conexao = ConexaoBD::conectar();
$ICTDAO = new ICTDAO($conexao);

if (isset($_GET['filtroEstado'])) {
    $estadoFiltrado = $_GET['filtroEstado'];
    $ICTs = $ICTDAO->listarPorEstado($estadoFiltrado);
} else {
    
}

?>