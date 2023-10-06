<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Patrimonio/PatrimonioDAO.php';
require_once 'Classes/Patrimonio/PatrimonioDTO.php';

$conexao = ConexaoBD::conectar();
$PatrimonioDAO = new PatrimonioDAO($conexao);

$Patrimonios = $PatrimonioDAO->listarTodos();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Ver Patrimonios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <section class="d-flex">
    <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 300px; height:100vh;">
    <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
      <span class="fs-4">Equipamentos</span>
      <span class="fs-4">ICT</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active mt-4 mb-4" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Gerentes
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white mb-4">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Equipamentos
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white mb-4">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Relatórios
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white mb-4">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Registros
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
 
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>Opções</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Definições</a></li>
        <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sair</a></li>
      </ul>
    </div>
  </div>
        <div class="card-body">
            <h2 class="pd-4 m-5">Conteudo que vc quiser entra aqui</h2>
         
        </div>
    </section>
    <script src="./js/jquery.min.js"></script>
	<script src="./js/popper.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/main.js"></script>
</body>

</html>