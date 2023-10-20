<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_login'])) {
  require_once 'Classes/Database/ConexaoBD.php';
  require_once 'Classes/Patrimonio/PatrimonioDAO.php';
  require_once 'Classes/Patrimonio/PatrimonioDTO.php';

  $conexao = ConexaoBD::conectar();
  $PatrimonioDAO = new PatrimonioDAO($conexao);

  $Patrimonios = $PatrimonioDAO->listarTodos();
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

  <!-- Dashboard/ left content -->
  <section class="d-flex">
    <div class="d-flex flex-column p-3 text-white bg-dark position-fixed" style="width: 300px; height:100vh;">
            <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-4">Equipamentos</span>
                <span class="fs-4">ICT</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item flex ">
                    <a href="#" class="nav-link my-4 active">
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
                    <a href="../ICT/index.php" class="nav-link text-white mb-4" aria-current="page">
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
            <h3 class="text-uppercase mx-4 text-dark">Gerentes do Patrimonio</h3>
          </div>

          <div class="manager-name">
            <h5 class="text-black">Bem vindo</h5>
            <h6 class="text-end bold text-dark"><strong><?= $_SESSION['user_login'] ?></strong></h6>
          </div>
        </div>

        <div class="main-content">
          <div class="register-print d-flex">

            <!-- Adicionar membros do patrimonio -->
            <div class="register-form col-8">
              <h3 class="text-black">Adicionar Membro</h3>
              <form action="./Controllers/Cadastrar.php" method="POST" class="form-register">
                <div class="mb-3">
                  <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="apelido" class="form-control" placeholder="Apelido" required>
                </div>
                <div class="mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                  <input type="number" name="contacto" class="form-control" placeholder="Contacto" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="login" class="form-control" placeholder="Nome de Usuário" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="senha" class="form-control" placeholder="Senha" required>
                </div>
                <div class="mb-3">
                  <input type="hidden">
                </div>
                <button class="btn text-bg-success add-btn">
                  <i class="bi bi-person-fill-add"></i>
                  Adicionar
                </button>
              </form>
            </div>

            <!-- Imprimir membros do patrimonio -->
            <div class="print col-3 text-center">
              <br>
              <br> <!-- Cota Persson sabe das cenas yu! Br*2 tmlc!-->
              <h3 class="h2-print">Imprimir lista de membros do Património</h3>
              <form action="./Controllers/pdf/RelatórioICT_Patrimonio.php" method="POST">
                <div class="d-flex mb-3">
                  <select name="opcoesEstado" class="form-control">
                    <option value="todos" selected>Todos</option>
                    <option value="ativos">Ativos</option>
                    <option value="inativos">Inativos</option>
                  </select>
                </div>
                <button class="btn text-bg-secondary">
                  <i class="bi bi-file-earmark-arrow-down"></i>
                  Imprimir</button>
              </form>
            </div>
          </div>

          <div class="managers container-fluid p-1">
            <div class="managers-title-add">
              <div class="manager-title text-uppercase">
                <p>Membros do Património</p>
              </div>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Apelido</th>
                  <th>Contacto</th>
                  <th>Email</th>
                  <th>Nome de Usuário</th>
                  <th>Estado</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($Patrimonios as $patrimonio) : ?>
                  <tr>
                    <td><?= $patrimonio["Id_Patrimonio"] ?></td>
                    <td><?= $patrimonio["Nome"] ?></td>
                    <td><?= $patrimonio["Apelido"] ?></td>
                    <td><?= $patrimonio["Contacto"] ?></td>
                    <td><?= $patrimonio["Email"] ?></td>
                    <td><?= $patrimonio["UsrLogin"] ?></td>
                    <td>
                      <?php
                      if ($patrimonio["Estado"]) {
                        echo "<button disabled class='manager-actived'>Ativo</button>";
                      } else {
                        echo "<button disabled class='manager-disabled'>Inativo</button>";
                      }
                      ?>
                    </td>
                    <td>
                      <a href="./EditarPatrimonio.php?id=<?= $patrimonio["Id_Patrimonio"] ?>">
                        <span style="font-size: 1.5rem; color:#343A40;" aria-hidden="true">
                          <i class="fa fa-edit"></i>
                        </span>
                      </a>
                      <a href="#" data-toggle="modal" data-target="#userInfoModal<?= $patrimonio['Id_Patrimonio']; ?>">
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
            <?php foreach ($Patrimonios as $patrimonio) : ?>
              <div class="modal fade" id="userInfoModal<?= $patrimonio['Id_Patrimonio']; ?>" tabindex="-1" role="dialog" aria-labelledby="userInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="userInfoModalLabel">Informações do Usuário</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><b>Nome: </b><?= $patrimonio['Nome']; ?></p>
                      <p><b>Apelido: </b><?= $patrimonio['Apelido']; ?></p>
                      <p><b>Email: </b><?= $patrimonio['Email']; ?></p>
                      <p><b>Nome de Usuário: </b><?= $patrimonio['UsrLogin']; ?></p>
                      <?php
                      if ($patrimonio["Estado"]) {
                     echo "<p><b>Estado: </b>Ativo</p>";
                    } else {
                     echo "<p><b>Estado: </b>Inativo</p>";
                    }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>