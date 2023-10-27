<?php

use PHPUnit\Framework\Constraint\Count;

require_once 'Classes/Database/ConexaoBD.php';
require_once 'Classes/Components/EquipamentoDAO.php';
require_once 'Classes/Components/EquipamentoDTO.php';
require_once 'Classes/Components/SoftwareDAO.php';
require_once 'Classes/Components/SoftwareDTO.php';
require_once 'Classes/Components/EquipamentoDAO.php';
require_once 'Classes/Components/EquipamentoDTO.php';
require_once 'Classes/Components/ManutencaoDAO.php';
require_once 'Classes/Components/ManutencaoDTO.php';

$conexao = ConexaoBD::conectar();

$equipamentoDao = new EquipamentoDAO($conexao);
$softwareDao = new SoftwareDAO($conexao);
$EquipamentoDao = new EquipamentoDAO($conexao);
$manutencaoDao = new ManutencaoDAO($conexao);

$softwares = $softwareDao->listarTodos();
$Equipamentos = $EquipamentoDao->listarTodos();
$manutencoes = $manutencaoDao->listarTodos();
$listarEquipamentos = $equipamentoDao->listarTodos();

// Contagem de equipamentos
$countEquipamento = count($Equipamentos);
$countSoftware = count($softwares);
$countManutencao = count($manutencoes);
$totalEquipamentos = (count($Equipamentos) + count($softwares) + count($manutencoes));

// Equipamentos por sala
$equipamentos = $equipamentoDao->countEquipamentoSala();
$count = 0;
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
                    <a href="../Dashboard/index.php" class="nav-link my-4 active ">
                        Menu Principal
                    </a>
                </li>
                <li>
                    <a href="../Equipamentos/index.php" class="nav-link text-white  mb-4">
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="../Softwares/index.php" class="nav-link text-white mb-4">
                        Software
                    </a>
                </li>
                <li>
                    <a href="../Localizacao/index.php" class="nav-link text-white mb-4" aria-current="page">
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
                <img src="./img/Equipamento.png" alt="Imagem do Equipamento">
              </div>
              <h5>Equipamento</h5>
              <p><?php echo $countEquipamento ?></p>
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
          <!-- Ok, esse codigo é sujo para caralho, mas ok.
              Peço imensas desculpas ao leitor-->
          <div class="graphic">
            <canvas id="grafico"></canvas>
          </div>

          <script>
            const nomesSala = [];
            const contagensEquipamentos = [];

            <?php foreach ($equipamentos as $equipamento) : ?>
              nomesSala.push('<?php echo $equipamento['NomeSala']; ?>');
              contagensEquipamentos.push(<?php echo $equipamento['ContagemEquipamentos']; ?>);
            <?php endforeach; ?>

            var ctx = document.getElementById('grafico').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: nomesSala,
                datasets: [{
                  label: 'Total de Equipamentos',
                  data: contagensEquipamentos,
                  backgroundColor: '#c3d7f9',
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>

          <!-- Todos os equipamentos -->
          <div class="container-fluid my-5">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Número de Série</th>
                  <th>Tipo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Estado</th>
                  <th>Localização</th>
                </tr>
              </thead>
              <?php foreach ($listarEquipamentos as $listagemEquipamentos) : ?>
                <tbody>
                  <tr>
                    <td><?= ++$count ?></td>
                    <td><?= $listagemEquipamentos->getNrDeSerie() ?></td>
                    <td><?= $listagemEquipamentos->getTipo() ?></td>
                    <td><?= $listagemEquipamentos->getMarca() ?></td>
                    <td><?= $listagemEquipamentos->getModelo() ?></td>
                    <td>
                      <?php
                      $estado = $listagemEquipamentos->getEstado();
                      if ($estado == "Ativo" || $estado == "Activo") {
                        echo '<span class="badge rounded-pill bg-info p-2 px-3">' . $estado . '</span>';
                      } else {
                        echo '<span class="badge rounded-pill bg-secondary p-2">' . $estado . '</span>';
                      }
                      ?>
                    </td>
                    <td><?= $listagemEquipamentos->getLocalizacao() ?></td>
                  </tr>
                </tbody>
              <?php endforeach ?>
            </table>
          </div>
        </section>
      </div>
    </div>
    <!-- right/notifiacation content -->
    <div class="notifications">
      <div class="manager-name">
        <h5 class="text-end text-black">Software</h5>
        <h6 class="text-end text-dark">
          <strong><?= $_SESSION['patrimonio_login'] ?></strong>
        </h6>
      </div>
      <h4 class="notification-title">Notificações</h4>
      <div class="d-flex flex-column mt-5">
        <?php foreach ($softwares as $software) {
          $dataExpiracao = $software->getDiaExpiracao();

          $dataAtual = new DateTime();
          $dataExpiracaoObj = DateTime::createFromFormat('Y-m-d', $dataExpiracao);

          if ($dataExpiracaoObj->format('Y-m-d') == $dataAtual->format('Y-m-d')) {
            echo '<h6 class="fw-bold text-uppercase text-info">O equipamento ' . $software->getNomeSoftware() . 'com o Id: (' . $software->getIdEquipamento()  . ') expira Hoje</h6>';
          } elseif ($dataExpiracaoObj < $dataAtual) {
            echo '<h6 class="fw-bold text-uppercase text-danger">O equipamento' . $software->getNomeSoftware() . 'com o Id: (' . $software->getIdEquipamento()  . ') expirou' . '</h6>';
          } else {
            $interval = $dataAtual->diff($dataExpiracaoObj);
            $diferencaDias = $interval->days;
            $diferencaDias++; // Adicionar 1 dia para contar o dia atual como parte dos dias restantes
            echo '<h6 class="fw-bold text-uppercase text-dark"> O equipamento ' . $software->getNomeSoftware() . 'com o Id: (' . $software->getIdEquipamento()  . ') expira em ' . $diferencaDias . ' dia(s)</h6>';
          }
        } ?>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/grafico.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>