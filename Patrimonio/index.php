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
      <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 300px; height:100vh;">
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
        <div class="reporters container p-3">
          <h2 class="text-primary">Reporter</h2>

          <div class="reporters-form">
            <form action="">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>Categoria Equipamento</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-1">
                      <select class="form-select">
                        <option value="1">Hardware</option>
                        <option value="2">Software</option>
                        <option value="3" selected>Todos</option>
                      </select>
                    </td>
                    <td class="col-1">
                      <input type="date" class="form-control" />
                    </td>
                    <td class="col-sm-1">
                      <input type="date" class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td class="d-flex justify-content-around">
                      <button class="search-btn bg-success">
                        <i class="bi bi-download"></i>
                        Gerar
                      </button>
                    </td>
                    <td></td>
                    <td>
                      <button type="reset" class="reset-btn bg-danger">
                        <i class="bi bi-trash3"></i>
                        Limpar
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
          <div class="reports-pdf container p-1">
            <table class="table">
              <thead>
                <tr>
                  <th>Reportes</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        <div class="managers container p-1">
          <div class="managers-title-add">
            <div class="manager-title text-uppercase">
              <p>Membros do Património</p>
            </div>
            <div class="manager-add">
              <button class="btn btn-success text-white">
                <i class="bi bi-person-plus"></i>
                Adicionar membro
              </button>
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Nome de Usuário</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($Patrimonios as $usuarios) : ?>
                <tr>
                  <td><?= $usuarios["Id_Patrimonio"] ?></td>
                  <td><?= $usuarios["Nome"] ?></td>
                  <td><?= $usuarios["Apelido"] ?></td>
                  <td><?= $usuarios["Contacto"] ?></td>
                  <td><?= $usuarios["Email"] ?></td>
                  <td><?= $usuarios["UsrLogin"] ?></td>
                  <td>
                    <?php
                    if ($usuarios["Estado"] == "Ativo") {
                      echo "<button disabled class='manager-actived'>Ativo</button>";
                    } else {
                      echo "<button disabled class='manager-disabled'>Inativo</button>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="./UsuarioAtualizar.php?usuarioTK=<?= $usuarios["id"] ?>">
                      <button class="btn btn-danger">
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