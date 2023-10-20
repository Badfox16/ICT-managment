<?php
require_once "./Classes/Manutencao/ManutencaoDTO.php";
require_once "./Classes/Manutencao/ManutencaoDAO.php";
require_once "./Classes/Database/ConexaoBD.php";

$conexao = ConexaoBD::conectar();
$ManutencaoDAO = new ManutencaoDAO($conexao);

$Manutencoes = $ManutencaoDAO->listarTodos();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Equipamentos - Manutencao</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <section class="d-flex">
        <div class="d-flex flex-column p-3 text-white bg-dark position-fixed" style="width: 300px; height:100vh;">
            <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-4">Equipamentos</span>
                <span class="fs-4">Manutencao</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item flex ">
                    <a href="#" class="nav-link my-4 text-white">
                        Menu Principal
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Patrimonio
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Relatórios
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active mb-4">
                        Manutenção
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4">
                        Registros
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white mb-4" aria-current="page">
                        ICT
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
            <h2 class="pd-4 m-5">Controle de Manutenção</h2>
            <div class="d-flex">
                <div class="mx-5">
                    <h3>Cadastro de Manutenção</h3>
                    <form method="post" action="./Controllers/Cadastrar.php">
                        <div class="d-flex">
                            <div class="">
                                <label for="nrSerie" class="form-label">Número de Série:</label>
                                <input type="text" id="nrSerie" class="form-control largura" name="email" placeholder="Insira o numero de série" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Titulo:</label>
                                <input type="text" class="form-control largura" name="username" placeholder="Insira o titulo da manutenção" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label ">Estado</label>
                            <textarea name="descricao" id="descricao" rows="8" class="form-control largura"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
                <div>
                    <div>
                        <h3>Filtro de Pesquisa</h3>
                        <form method="GET">
                            <div class="mb-3">
                                <label for="filtroEstado" class="form-label">Filtrar por Estado</label>
                                <select class="form-select largura" name="filtroEstado" onchange="this.form.submit()">
                                    <option value="" disabled selected>Selecione o Estado</option>
                                    <option value="Todos">Todos</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="mt-5">
                        <h3>Relatório:</h3>
                        <button class="btn btn-secondary">Imprimir</button>
                    </div>
                </div>
            </div>
            <div class="">
                <table class="table table-responsive-lg table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nome de Usuário</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Manutencoes as $manutencao) : ?>
                            <tr style="height: 16px;">
                                <td>
                                    <span><b><?= $manutencao['Titulo']; ?></b></span>
                                </td>
                                <td><?= $manutencao['Descricao']; ?></td>
                                <a href="#" data-toggle="modal" data-target="#userInfoModal<?= $manutencao['Id_Manutencao']; ?>">
                                    <span style="font-size: 1.5rem; color:#343A40; padding-left: 16px;" aria-hidden="true">
                                        <i class="fa fa-info-circle"></i>
                                    </span>
                                </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <?php foreach ($Manutencoes as $manutencao) : ?>
                    <div class="modal fade" id="userInfoModal<?= $manutencao['Id_Manutencao']; ?>" tabindex="-1" role="dialog" aria-labelledby="userInfoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userInfoModalLabel">Informações do Usuário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><b>Email: </b><?= $manutencao['Titulo']; ?></p>
                                    <p><b>Nome de Usuário: </b><?= $manutencao['Descricao']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>