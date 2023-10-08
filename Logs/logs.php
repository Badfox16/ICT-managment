<?php

require_once './Classes/Database/ConexaoBD.php';
require_once './Classes/Log/LogsDAO.php';

$conexao = ConexaoBD::conectar();
$LogsDAO = new LogsDAO($conexao);

$Logs = $LogsDAO->listarTodos();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ver Patrimonios</title>
    <link rel="styleshee    t" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./style/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <main class="main container-fluid d-flex">
        <!-- Dashboard/ left content -->
        <section class="left-dashboard col-2">
            <div class="d-flex flex-column p-3 text-white bg-dark fixed-top" style="width: 300px; height:100vh;">
                <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
                    <span class="fs-4">Relatórios</span>
                    <span class="fs-4">ICT</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white mt-4 mb-4" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Gerentes
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white mb-4">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Equipamentos
                        </a>
                    </li>
                    <li>
                        <a href="../Relatorio/relatorios.php" class="nav-link text-white mb-4">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Relatórios
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link active text-white mb-4">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
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
                        <strong>Logout</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Definições</a></li>
                        <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Right content -->
        <section class="right-content container-fluid bg-muted pt-4">
            <div class="header d-flex justify-content-between text-muted">
                <div class="system-name">
                    <h3 class="text-uppercase mx-4 text-dark">Relatórios - ict</h3>
                </div>

                <div class="manager-name">
                    <h5 class="text-black">Seja bem vindo de volta</h5>
                    <p class="text-end text-dark">Felizardo Carlos</p>
                </div>
            </div>

            <div class="main-content">
                <div class="reporter-print d-flex">
                    <!-- Adicionar membros do patrimonio -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Hora</th>
                                <th>Atividade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Logs as $logs) : ?>
                                <tr>
                                    <td><?= $logs["Id_logs"] ?></td>
                                    <td><?= $logs["Usuario"] ?></td>
                                    <td><?= $logs["Hora"] ?></td>
                                    <td><?= $logs["Atividade"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>

</html>