<?php

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    require_once __DIR__ .'/../db/ConexaoDB.php';
    require_once 'Classes/ICT/ICTDAO.php';
    require_once 'Classes/ICT/ICTDTO.php';

    $conexao = ConexaoBD::conectar();
    $ICTDAO = new ICTDAO($conexao);

    try {
        $ICT = $ICTDAO->buscarPorId($user_id);
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
    }
} else {
    header("Location: ./LoginICT.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário</title>
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
                    <a href="../Dashboard/dashboard.php" class="nav-link my-4 text-white">
                        Menu Principal
                    </a>
                </li>
                <li>
                    <a href="../Equipamentos/equipamentos.php" class="nav-link text-white  mb-4">
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="../Softwares/index.php" class="nav-link text-white mb-4">
                        Software
                    </a>
                </li>
                <li>
                    <a href="../Patrimonio/patrimonio.php" class="nav-link text-white  mb-4">
                        Patrimonio
                    </a>
                </li>
                <li>
                    <a href="ict.php" class="nav-link text-white mb-4">
                        ICT
                    </a>
                </li>
                <li>
                    <a href="../Registros/registros.php" class="nav-link text-white mb-4">
                        Registros
                    </a>
                </li>
                <li>
                    <a href="../Localizacao/localizacao.php" class="nav-link text-white mb-4" aria-current="page">
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
        <div class="card-body">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="./img/user_icon.png" class="rounded-circle mb-3" alt="Imagem de Perfil">
                                <h3 class="card-title">Nome do Usuário: <?= $ICT['UsrLogin']; ?></h3>
                                <p class="card-text">Email: <?= $ICT['Email']; ?></p>
                                <p class="card-text">Senha: <strong>********</strong></p>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Editar Perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="./Controllers/Editar.php">
                                <div class="form-group">
                                    <label for="usrLogin">Nome do Usuário</label>
                                    <input type="text" class="form-control" required name="usrLogin" value="<?= $ICT['UsrLogin']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" required name="email" value="<?= $ICT['Email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" required name="senha" value="" >
                                </div>
                                <input hidden class="form-control" required name="id" value="<?= $ICT['Id_ICT']; ?>">
                                <input hidden class="form-control" required name="estado" value="<?= $ICT['Estado']; ?>">
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

