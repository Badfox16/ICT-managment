<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/ICT/ICTDAO.php';
require_once 'Classes/ICT/ICTDTO.php';

$conexao = ConexaoBD::conectar();
$ICTDAO = new ICTDAO($conexao);

$ICTs = $ICTDAO->listarTodos();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - ICT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <section class="d-flex">
        <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 300px; height:100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Equipamentos do ICT</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item flex ">
                    <a href="#" class="nav-link active mt-4 mb-4" aria-current="page">
                        Gerentes
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
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sair</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <h2 class="pd-4 m-5">Gerentes do ICTs</h2>
            <div class="table-responsive mt-auto">
                <table class="table table-striped-columns table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th scope="col m-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" checked />
                                </div>
                            </th>
                            <th scope="col">Id</th>
                            <th scope="col">Login</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ICTs as $ICT) : ?> <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $Patrimonio['Id_Patrimonio']; ?>" />
                                    </div>
                                </th>
                                <td><?= $ICT['Id_ICT']; ?></td>
                                <td><?= $ICT['UsrLogin']; ?></td>
                                <td><?= $ICT['Senha']; ?></td>
                                <td>Ativo</td>
                                <td>
                                    <a href="EditarICT.php?Id=<?= $ICT['Id_ICT']; ?>">[Editar]</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <h2></h2>

</body>

</html>