<?php
session_start();
if (isset($_SESSION['patrimonio_id']) && isset($_SESSION['patrimonio_email']) && isset($_SESSION['patrimonio_login'])) {
require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Sala/SalaDAO.php';
require_once 'Classes/Sala/SalaDTO.php';

$conexao = ConexaoBD::conectar();
$SalaDAO = new SalaDAO($conexao);

if (isset($_GET['filtroSala'])) {
    $filtro = $_GET['filtroSala'];
    if ($filtro == 'Todos') {
        $Salas = $SalaDAO->listarTodos();
    } elseif ($filtro == 'Novo') {
        $Salas = $SalaDAO->listarPorEdificio('Novo Edificio');
    } elseif ($filtro == 'Antigo') {
        $Salas = $SalaDAO->listarPorEdificio('Antigo Edificio');
    } else {
        $Salas = $SalaDAO->listarTodos(); 
    }
} else {
    $Salas = $SalaDAO->listarTodos();
}
} else {
    header("Location: ../Login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Localizações</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <section class="d-flex">
    <div class="d-flex flex-column p-3 text-white bg-dark position-fixed" style="width: 300px; height:100vh;">
            <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-4">Equipamentos</span>
                <span class="fs-4">ICT</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item flex ">
                    <a href="#" class="nav-link my-4 text-white">
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
                    <a href="../Patrimonio/index.php" class="nav-link text-white mb-4">
                        Patrimonio
                    </a>
                </li>
                <li>
                    <a href="../ICT/index.php" class="nav-link text-white mb-4">
                        ICT
                    </a>
                </li>
                <li>
                    <a href="../Registros/index.php" class="nav-link text-white mb-4">
                        Registros
                    </a>
                </li>
                <li>
                    <a href="../Localizacao/index.php" class="nav-link active  mb-4" aria-current="page">
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
            <h2 class="pd-4 m-5">ICT - Localizações</h2>
            <div class="d-flex">
                <div class="mx-5">
                    <h3>Cadastro de Salas</h3>
                    <form method="post" action="./Controllers/Cadastrar.php">
                        <div class="mb-3">
                            <label for="Sala" class="form-label">Nome da Sala:</label>
                            <input type="text" class="form-control largura" name="sala" placeholder="Insira o nome da sala" required>
                        </div>
                        <div class="mb-3">
                            <label for="Sala" class="form-label ">Edificio</label>
                            <select class="form-select largura" name="edificio" required>
                                <option value="1" selected>Novo Edificio</option>
                                <option value="2">Antigo Edificio</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
                <div>
                    <div>
                        <h3>Filtro de Pesquisa</h3>
                        <form method="GET">
                            <div class="mb-3">
                                <label for="filtroSala" class="form-label">Filtrar por Edificio</label>
                                <select class="form-select largura" name="filtroSala" onchange="this.form.submit()">
                                    <option value="" disabled selected>Selecione o Edificio</option>
                                    <option value="Todos">Todos</option>
                                    <option value="Novo">Novo Edificio</option>
                                    <option value="Antigo">Antigo Edificio</option>
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
                            <th>ID</th>
                            <th>Nome da Sala</th>
                            <th>Edificio</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Salas as $Sala) : ?>
                            <tr style="height: 16px;">
                                <td>
                                    <span><b><?= $Sala['Id_Sala']; ?></b></span>
                                </td>
                                <td><?= $Sala['NomeSala']; ?></td>
                                <td class="status"><span class=""><?= $Sala['NomeEdificio']; ?></span></td>
                                <td>
                                    <a href="#" class="editButton" data-toggle="modal" data-target="#editModal<?= $Sala['Id_Sala']; ?>">
                                        <span style="font-size: 1.5rem; color:#343A40; padding-left: 16px;" aria-hidden="true">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#userInfoModal<?= $Sala['Id_Sala']; ?>">
                                        <span style="font-size: 1.5rem; color:#343A40; padding-left: 16px;" aria-hidden="true">
                                            <i class="fa fa-info-circle"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Modal para Ver -->
                <?php foreach ($Salas as $Sala) : ?>
                    <div class="modal fade" id="userInfoModal<?= $Sala['Id_Sala']; ?>" tabindex="-1" role="dialog" aria-labelledby="userInfoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userInfoModalLabel">Informações do Usuário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><b>Sala: </b><?= $Sala['NomeSala']; ?></p>
                                    <p><b>Edificio: </b><?= $Sala['NomeEdificio']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Modal de Edição -->
                <?php foreach ($Salas as $Sala) : ?>
                    <div class="modal fade" id="editModal<?= $Sala['Id_Sala']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Editar Informações da Sala</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="./Controllers/Editar.php" method="post">
                                        <input type="hidden" name="salaId" value="<?= $Sala['Id_Sala']; ?>">
                                        <div class="form-group">
                                            <label for="nomeSala">Nome da Sala:</label>
                                            <input type="text" required class="form-control" id="nomeSala" name="sala" value="<?= $Sala['NomeSala']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Sala" class="form-label ">Edificio</label>
                                            <select class="form-select largura" name="edificio" required>
                                                <option value="" disabled selected>Selecione o Edificio</option>
                                                <option value="1">Novo Edificio</option>
                                                <option value="2">Antigo Edificio</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                    </form>
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