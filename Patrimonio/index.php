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
          <span class="fs-4">Equipamentos</span>
          <span class="fs-4">ICT</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active mt-4 mb-4" aria-current="page">
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
            <a href="#" class="nav-link text-white mb-4">
              <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#table"></use>
              </svg>
              Relatórios
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white mb-4">
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
          <h3 class="text-uppercase mx-4 text-dark">Ict-patrimorio</h3>
        </div>

        <div class="manager-name">
          <h5 class="text-black">Seja bem vindo de volta</h5>
          <p class="text-end text-dark">Felizardo Carlos</p>
        </div>
      </div>

      <div class="main-content">
        <div class="register-print d-flex">

          <!-- Adicionar membros do patrimonio -->
          <div class="register-form col-8">
            <h3 class="text-primary">Adicionar Membro ao Património</h3>
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
            <form action="">
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
                <th>Editar</th>
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
                      <button class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </a>
                  </td>
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