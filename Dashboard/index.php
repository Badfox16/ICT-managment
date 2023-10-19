<?php

use PHPUnit\Framework\Constraint\Count;

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Components/EquipamentoDAO.php';
require_once 'Classes/Components/EquipamentoDTO.php';
require_once 'Classes/Components/SoftwareDAO.php';
require_once 'Classes/Components/SoftwareDTO.php';
require_once 'Classes/Components/HardwareDAO.php';
require_once 'Classes/Components/HardwareDTO.php';
require_once 'Classes/Components/ManutencaoDAO.php';
require_once 'Classes/Components/ManutencaoDTO.php';

$conexao = ConexaoBD::conectar();

$equipamentoDao = new EquipamentoDAO($conexao);
$softwareDao = new SoftwareDAO($conexao);
$hardwareDao = new HardwareDAO($conexao);
$manutencaoDao = new ManutencaoDAO($conexao);

$softwares = $softwareDao->listarTodos();
$hardwares = $hardwareDao->listarTodos();
$manutencoes = $manutencaoDao->listarTodos();

// Contagem de equipamentos
$countHardware = count($hardwares);
$countSoftware = count($softwares);
$countManutencao = count($manutencoes);
$totalEquipamentos = (count($hardwares) + count($softwares) + count($manutencoes));

// Equipamentos por sala
$equipamentos = $equipamentoDao->countEquipamentoSala();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Ver Patrimonios</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="./style/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="./style/style.css" />
</head>

<body>

  <section class="d-flex">
    <!--left content -->
    <div class="d-flex flex-column p-3 text-white bg-dark position-fixed" style="width: 300px; height:100vh;">
      <a href="/" class="d-flex flex-column align-items-center mb-3 text-white text-decoration-none">
        <span class="fs-4">Equipamentos</span>
        <span class="fs-4">ICT</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item flex ">
          <a href="#" class="nav-link my-4 active">
            Dasboard
          </a>
        </li>
        <li class="nav-item flex ">
          <a href="#" class="nav-link text-white mb-4">
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

    <!--middle content-->
    <div class="d-flex flex-column col-9">
      <div class="card-body" style="width: calc(100% - 300px); margin-left: 300px; overflow-y: scroll;">

        <section class="middle-content container-fluid bg-muted pt-4">
          <div class="header d-flex justify-content-between text-muted">
            <div class="system-name">
              <h3 class="text-uppercase mx-4 text-dark">&nbsp;&nbsp;&nbsp; Dashboard</h3>
            </div>
          </div>

          <!-- Cards views -->
          <div class="cards d-flex mb-5">
            <div class="card-equipment">
              <div class="card-equimpment-img">
                <img src="./img/software.png" alt="Imagem do software">
              </div>
              <h5>software</h5>
              <p><?php echo $countSoftware ?></p>
            </div>
            <div class="card-equipment">
              <div class="card-equimpment-img">
                <img src="./img/hardware.png" alt="Imagem do Hardware">
              </div>
              <h5>Hardware</h5>
              <p><?php echo $countHardware ?></p>
            </div>
            <div class="card-equipment">
              <div class="card-equimpment-img">
                <img src="./img/manutation.png" alt="Imagem da manutenção">
              </div>
              <h5>manutenção</h5>
              <p><?php echo $countManutencao ?></p>
            </div>
            <div class="card-equipment">
              <div class="card-equimpment-img">
                <img src="./img/equipment.png" alt="Imagem de todos os equipamentos">
              </div>
              <h5>Todos Equipamentos</h5>
              <p><?php echo $totalEquipamentos ?></p>
            </div>
          </div>

          <!-- Grafico -->
          <?php foreach ($equipamentos as $equipamento) {
            $nomeSala = $equipamento['NomeSala'];
            $contagemEquipamentos = $equipamento['ContagemEquipamentos'];
            echo "<p class='nomeSala' hidden>$nomeSala</p>";
            echo "<p class='contagemEquipamentos' hidden>$contagemEquipamentos</p>";
          } ?>

          <div class="graphic">
            <canvas id="grafico"></canvas>
          </div>

          <!-- Membros do patrimonio -->
          <div class="management d-flex">
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
        </section>
      </div>
    </div>
    <!-- right/notifiacation content -->
    <div class="notifications">
      <div class="manager-name">
        <h5 class="text-end text-black">Bem vindo</h5>
        <h6 class="text-end text-dark">
          <strong><?= $_SESSION['patrimonio_login'] ?></strong>
        </h6>
      </div>
      <h4 class="notification-title">Notificações</h4>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/grafico.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>