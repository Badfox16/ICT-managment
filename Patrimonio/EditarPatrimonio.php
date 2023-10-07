<?php
session_start();
if (isset($_SESSION['patrimonio_id']) && isset($_SESSION['patrimonio_email']) && isset($_SESSION['patrimonio_login'])) {
require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Patrimonio/PatrimonioDAO.php';
require_once 'Classes/Patrimonio/PatrimonioDTO.php';

$conexao = ConexaoBD::conectar();
$PatrimonioDAO = new PatrimonioDAO($conexao);
$id = $_GET["id"];
try {
    $Patrimonio = $PatrimonioDAO->buscarPorId($id);
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
} else {
    header("Location: ./Login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ver Patrimonios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./style/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css" />
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

            <!-- Right content -->
            <section class="right-content container-fluid bg-muted pt-4">
                <div class="header d-flex justify-content-between text-muted">
                    <div class="system-name">
                        <h3 class="text-uppercase mx-4 text-dark">Gerentes do Património</h3>
                    </div>

                    <div class="manager-name">
                        <h5 class="text-black">Administrador</h5>
                        <p class="text-end text-dark"><strong><?= $_SESSION['patrimonio_login'] ?></strong></p>
                    </div>
                </div>

                <div class="main-content">
                    <div class="register-print d-flex">

                        <!-- Editar membros do Patrimonio -->
                        <div class="register-form col-8">
                            <h3 class="text-primary">Editar Membro do Património</h3>
                            <form action="./Controllers/Editar.php" method="POST" class="form-register">
                                <div class="mb-3">
                                    <input type="text" name="nome" value="<?= $Patrimonio["Nome"] ?>" class="form-control" placeholder="Nome" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="apelido" value="<?= $Patrimonio["Apelido"] ?>" class="form-control" placeholder="Apelido" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" value="<?= $Patrimonio["Email"] ?>" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="contacto" value="<?= $Patrimonio["Contacto"] ?>" class="form-control" placeholder="Contacto" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="login" value="<?= $Patrimonio["UsrLogin"] ?>" class="form-control" placeholder="Nome de Usuário" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="senha" value="<?= $Patrimonio["Senha"] ?>" class="form-control" placeholder="Senha" required>
                                </div>
                                <div class="mb-3">
                                    <?php if ($Patrimonio["Estado"]) {
                                        echo "<input type='checkbox' id='estado' name='estado' checked/> &nbsp;";
                                        echo "<label for='estado'>Ativo</label>";
                                    } else {
                                        echo "<input type='checkbox' id='estado' name='estado'/> &nbsp;";
                                        echo "<label for='estado'>Ativo</label>";
                                    }
                                    ?>
                                </div>
                                <button class="btn text-bg-primary add-btn">
                                    <i class="bi bi-person-fill-up"></i>
                                    Atualizar
                                </button>
                                <input type="hidden" name="id" value="<?= $Patrimonio["Id_Patrimonio"] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

</html>