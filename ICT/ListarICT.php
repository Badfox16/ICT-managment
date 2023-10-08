<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_login'])) {
    require_once 'Classes/Database/ConexaoBD.php';
    require_once 'Classes/ICT/ICTDAO.php';
    require_once 'Classes/ICT/ICTDTO.php';

    $conexao = ConexaoBD::conectar();
    $ICTDAO = new ICTDAO($conexao);

    $ICTs = $ICTDAO->listarTodos();
} else {

    header("Location: ./LoginICT.php");
    exit();
}




?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - ICT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                <li class="nav-item flex ">
                    <a href="#" class="nav-link my-4 text-white">
                        Patrimonio
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Relatórios
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Registros
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active mb-4" aria-current="page">
                        ICT
                    </a>
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
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sair</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <h2 class="pd-4 m-5">Administradores do ICT</h2>
            <div class="">
                <table class="table table-responsive-lg table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nome de Usuário</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ICTs as $ICT) : ?>
                            <tr style="height: 16px;">
                                <td>
                                    <span><b><?= $ICT['Email']; ?></b></span>
                                </td>
                                <td><?= $ICT['UsrLogin']; ?></td>
                                <td class="status"><span class="active"><?= $ICT['Estado']; ?></span></td>
                                <td>
                                    <a href="./EditarICT.php?Id=<?= $ICT['Id_ICT']; ?>">
                                        <span style="font-size: 1.5rem; color:#343A40;" aria-hidden="true">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <h2></h2>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>