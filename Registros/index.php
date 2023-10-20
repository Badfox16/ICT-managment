<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_login'])) {
require_once './Classes/Database/ConexaoBD.php';
require_once './Classes/Log/LogsDAO.php';

$conexao = ConexaoBD::conectar();
$LogsDAO = new LogsDAO($conexao);

$Logs = $LogsDAO->listarTodos();
} else {
    header("Location: ../ICT/LoginICT.php");
    exit();
  }

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
    <main class=" d-flex">
        <!-- Dashboard/ left content -->
        <div class="d-flex flex-column p-3 text-white bg-dark position-fixed" style="width: 300px; height:100vh;">
            <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-4">Equipamentos</span>
                <span class="fs-4">ICT</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item flex ">
                    <a href="../Dashboard/index.php" class="nav-link my-4 text-white">
                        Menu Principal
                    </a>
                </li>
                <li>
                    <a href="../Equipamentos/index.php" class="nav-link text-white mb-4">
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="../Softwares/index.php" class="nav-link text-white mb-4">
                        Software
                    </a>
                </li>
                <li>
                    <a href="../Patrimonio/index.php" class="nav-link text-white  mb-4">
                        Patrimonio
                    </a>
                </li>
                <li>
                    <a href="../ICT/index.php" class="nav-link text-white mb-4">
                        ICT
                    </a>
                </li>
                <li>
                    <a href="../Registros/index.php" class="nav-link active mb-4">
                        Registros
                    </a>
                </li>
                <li>
                    <a href="../Localizacao/index.php" class="nav-link text-white mb-4" aria-current="page">
                        Localizações
                    </a>
                </li>
            </ul>
            <hr>
            <div class="d-flex flex-column">
                <a href="./Perfil.php" class="d-flex align-items-center text-white text-decoration-none m-2" aria-expanded="false">
                    <span>
                        <i class="fa fa-user"></i>
                        <strong>Perfil</strong>
                    </span>
                </a>
                <a href="./Controllers/Logout.php" class="d-flex align-items-center text-white text-decoration-none m-2" aria-expanded="false">
                    <span>
                        <i class="fa fa-sign-out"></i>
                        <strong>Logout</strong>
                    </span>
                </a>
            </div>
        </div>

        <div class="card-body" style="width: calc(100% - 300px); margin-left: 300px; overflow-y: scroll;">
            <div class="header d-flex justify-content-between text-muted">
                <div class="system-name">
                    <h3 class="text-uppercase mx-4 text-dark">Registros - ict</h3>
                </div>

                <div class="manager-name">
                    <h5 class="text-black">Seja bem vindo de volta</h5>
                    <p class="text-end text-dark"><?= $_SESSION['user_login'] ?></strong></p>
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

        </div>
    </main>
</body>

</html>