<?php

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Equipamentos/Computador/ComputadorDAO.php';
require_once 'Classes/Equipamentos/Computador/ComputadorDTO.php';
require_once 'Classes/Equipamentos/AntenasPA/AntenasPaDAO.php';
require_once 'Classes/Equipamentos/AntenasPA/AntenasPaDTO.php';
require_once 'Classes/Equipamentos/Impressora/ImpressoraDAO.php';
require_once 'Classes/Equipamentos/Impressora/ImpressoraDTO.php';
require_once 'Classes/Equipamentos/Projetor/ProjetorDAO.php';
require_once 'Classes/Equipamentos/Projetor/ProjetorDTO.php';
require_once 'Classes/Equipamentos/Switch/SwitchDAO.php';
require_once 'Classes/Equipamentos/Switch/SwitchDTO.php';

$count = 0;


$conexao = ConexaoBD::conectar();

$computadorDAO = new ComputadorDAO($conexao);
$antenasPaDAO = new AntenasPaDAO($conexao);
$impressoraDAO = new ImpressoraDAO($conexao);
$projetorDAO = new ProjetorDAO($conexao);
$switchDAO = new SwitchDAO($conexao);



$computadores = $computadorDAO->listarTodos();
$impressoras = $impressoraDAO->listarTodos();
$projetores = $projetorDAO->listarTodos();
$switches = $switchDAO->listarTodos();
$antenas = $antenasPaDAO->listarTodos();

?>


<!DOCTYPE html>
<html>

<head>
  <title>Ver Patrimonios</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script defer src="./js/FiltroEquipamentos.js"></script>

  <link rel="stylesheet" href="css/style.css" />
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
            <a href="#" class="nav-link  
            mt-4 mb-4 text-white" aria-current="page">
              <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#home"></use>
              </svg>
              Gerentes
            </a>
          </li>
          <li>
            <a href="#" class="nav-link active text-white mb-4">
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
          <h3 class="text-uppercase mx-4 text-dark">Ict-Equipamentos</h3>
        </div>

        <div class="manager-name">
          <h5 class="text-black">Seja bem vindo de volta</h5>
          <p class="text-end text-dark">Felizardo Carlos</p>
        </div>
      </div>

      <div class="main-content">

        <div class="d-flex m-4">
          <div class="dropdown">
            <select class="form-select" id="categoryFilter">
              <option value="">Todas Categorias</option>
              <option value="Computador">Computador</option>
              <option value="Impressora">Impressora</option>
              <option value="Projetor">Projetor</option>
              <option value="Switch">Switch</option>
              <option value="AntenasPA">Antenas PA</option>
            </select>
          </div>
        </div>

        <div class="managers container-fluid p-1">
          <div class="managers-title-add">
            <div class="manager-title text-uppercase">
              <p>Equipamentos</p>
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Número de Série</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($computadores as $computador) : ?>


                <tr class="equipment-row Computador">
                  <td><?= ++$count ?></td>
                  <td><?= $computador["NrDeSerie"] ?></td>
                  <td>Computador</td>
                  <td><?= $computador["Marca"] ?></td>
                  <td><?= $computador["Modelo"] ?></td>
                  <td>
                    <?php
                    if ($computador["Estado"]) {
                      echo "<button disabled class='manager-actived'>Ativo</button>";
                    } else {
                      echo "<button disabled class='manager-disabled'>Inativo</button>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="./EditarPatrimonio.php?id=<?= $computador["Id_Computador"] ?>">
                      <button class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              <?php endforeach;
              ?>



              <?php foreach ($impressoras as $impressora) : ?>
                <tr class="equipment-row Impressora">
                  <td><?= ++$count ?></td>
                  <td><?= $impressora["NrDeSerie"] ?></td>
                  <td>Impressora</td>
                  <td><?= $impressora["Marca"] ?></td>
                  <td><?= $impressora["Modelo"] ?></td>
                  <td>
                    <?php
                    if ($impressora["Estado"]) {
                      echo "<button disabled class='manager-actived'>Ativo</button>";
                    } else {
                      echo "<button disabled class='manager-disabled'>Inativo</button>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="./EditarPatrimonio.php?id=<?= $impressora["Id_Impressora"] ?>">
                      <button class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              <?php endforeach;
              ?>



              <?php foreach ($projetores as $projetor) : ?>
                <tr class="equipment-row Projetor">
                  <td><?= ++$count ?></td>
                  <td><?= $projetor["NrDeSerie"] ?></td>
                  <td>Projetor</td>
                  <td><?= $projetor["Marca"] ?></td>
                  <td><?= $projetor["Modelo"] ?></td>
                  <td>
                    <?php
                    if ($projetor["Estado"]) {
                      echo "<button disabled class='manager-actived'>Ativo</button>";
                    } else {
                      echo "<button disabled class='manager-disabled'>Inativo</button>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="./EditarPatrimonio.php?id=<?= $projetor["Id_Projetor"] ?>">
                      <button class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              <?php endforeach;
              ?>

              <?php foreach ($switches as $switch) : ?>
                <tr class="equipment-row Switch">
                  <td><?= ++$count ?></td>
                  <td><?= $switch["NrDeSerie"] ?></td>
                  <td>Switch</td>
                  <td><?= $switch["Marca"] ?></td>
                  <td><?= $switch["Modelo"] ?></td>
                  <td>
                    <?php
                    if ($switch["Estado"]) {
                      echo "<button disabled class='manager-actived'>Ativo</button>";
                    } else {
                      echo "<button disabled class='manager-disabled'>Inativo</button>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="./EditarPatrimonio.php?id=<?= $switch["Id_Switch"] ?>">
                      <button class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              <?php endforeach;
              ?>

              <?php foreach ($antenas as $antena) : ?>
                <tr class="equipment-row Switch">
                  <td><?= ++$count ?></td>
                  <td><?= $antena["NrDeSerie"] ?></td>
                  <td>Antena PA</td>
                  <td><?= $antena["Marca"] ?></td>
                  <td><?= $antena["Modelo"] ?></td>
                  <td>
                    <?php
                    if ($antena["Estado"]) {
                      echo "<button disabled class='manager-actived'>Ativo</button>";
                    } else {
                      echo "<button disabled class='manager-disabled'>Inativo</button>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="./EditarPatrimonio.php?id=<?= $antena["Id_AntenasPA"] ?>">
                      <button class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                    </>
                  </td>
                </tr>
              <?php endforeach;
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</body>

</html>