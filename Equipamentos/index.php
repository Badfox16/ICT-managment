<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_login'])) {
//Conexao
require_once 'Classes/Database/ConexaoBD.php';
//Equipamentos
require_once 'Classes/Equipamentos/EquipamentoDAO.php';
require_once 'Classes/Equipamentos/EquipamentoDTO.php';
//Hardware
require_once 'Classes/Hardware/HardwareDAO.php';
require_once 'Classes/Hardware/HardwareDTO.php';
//Manuntencao
require_once 'Classes/Manutencao/ManutencaoDAO.php';
require_once 'Classes/Manutencao/ManutencaoDTO.php';
//Tipos
require_once 'Classes/Tipos/TiposDAO.php';
require_once 'Classes/Tipos/TiposDTO.php';
//Salas
require_once 'Classes/Sala/SalaDAO.php';
require_once 'Classes/Sala/SalaDTO.php';


$count = 0;

$conexao = ConexaoBD::conectar();

$equipamentoDAO = new EquipamentoDAO($conexao);
$hardwareDAO = new HardwareDAO($conexao);
$manutencaoDAO = new ManutencaoDAO($conexao);
$tiposDAO = new TiposDAO($conexao);
$SalaDAO = new SalaDAO($conexao);

// Chamar o método para listar todos os equipamentos com informações extras
$equipamentos = $equipamentoDAO->listarTodos();
$tipos = $tiposDAO->listarTodos();
$Salas = $SalaDAO->listarTodos();
} else {
  header("Location: ../ICT/LoginICT.php");
  exit();
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Ver Equipamentos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
  <main class="main container-fluid d-flex">
    <!-- Dashboard/ left content -->
    <section class="left-dashboard col-2">
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
                    <a href="../Equipamentos/index.php" class="nav-link active  mb-4">
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
    </section>

    <!-- Right content -->
    <!-- <section class="right-content"> -->
    <section class="right-content container-fluid bg-muted pt-4">
      <div class="header d-flex justify-content-between text-muted">
        <div class="system-name">
          <h3 class="text-uppercase mx-4 text-dark">Ict-Equipamentos</h3>
        </div>

        <div class="manager-name">
          <h5 class="text-black">Seja bem vindo</h5>
          <p class="text-end text-dark"><?= $_SESSION['user_login'] ?></strong></p>
        </div>
      </div>

      <div class="main-content">
        <div class="d-flex align-items-center justify-content-between mb-4">

          <div class="w-25 ">

            <div class="flex-grow-1 input-group">
              <input type="text" class="form-control" id="searchInput" placeholder=' Pesquise... &#128269;'>
            </div>

          </div>

          <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adicionarEquipamentoModal">
              <i class="bi bi-wrench-adjustable"></i>
              ADICIONAR</button>
          </div>

          <!-- Imprimir membros do patrimonio -->
          <div class="print  ">
            <button class="btn bg-danger text-light" data-bs-toggle="modal" data-bs-target="#imprimirModalLabel">
              <i class="bi bi-file-earmark-arrow-down"></i>
              <span class="text-light fw-bold">Imprimir</span></button>
          </div>

          <div>
            <button class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#adicionarTipoModal">
              <i class="bi bi-pc-display"></i>
              ADICIONAR TIPO</button>
          </div>

          <div>
            <button class="btn btn-warning me-2 fw-bold" data-bs-toggle="modal" data-bs-target="#editarTipoModal">
              <i class="bi bi-pc-display"></i>
              EDITAR TIPO</button>
          </div>

        </div>

        <!-- Modal para adicionar equipamento -->
        <div class="modal fade needs-validation" data-bs-backdrop="static" data-bs-keyboard="false" id="adicionarEquipamentoModal" tabindex="-1" aria-labelledby="adicionarEquipamentoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adicionarEquipamentoModalLabel">Adicionar Equipamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- No modal de adicionar equipamento -->
                <form class="needs-validation" id="adicionarEquipamentoForm">
                  <!-- Campos para adicionar um novo equipamento -->
                  <div class="mb-3">
                    <label for="tipoNovo" class="form-label">Tipo:</label>
                    <select class="form-select" id="tipoNovo" name="tipoNovo" required>
                      <!-- Opções para tipos de equipamento -->
                      <?php foreach ($tipos as $tipo) { ?>
                        <option class="text-dark" value="<?= $tipo->getIdTipo() ?>"><?= $tipo->getTipo() ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="marcaNovo" class="form-label">Marca:</label>
                    <input type="text" class="form-control" id="marcaNovo" name="marcaNovo" autocomplete="off" required>
                  </div>
                  <div class="mb-3">
                    <label for="modeloNovo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" id="modeloNovo" name="modeloNovo" autocomplete="off" required>
                  </div>
                  <div class="mb-3">
                    <label for="nrDeSerieNovo" class="form-label">Número de Série:</label>
                    <input type="text" class="form-control" id="nrDeSerieNovo" name="nrDeSerieNovo" autocomplete="off" required>
                  </div>
                  <div class="mb-3">
                    <label for="estadoNovo" class="form-label">Estado:</label>
                    <select class="form-select" id="estadoNovo" name="estadoNovo" required>
                      <option value="Ativo">Ativo</option>
                      <option value="Inativo">Inativo</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="localizacaoNovo" class="form-label">Localização:</label>
                    <select class="form-select" id="localizacaoNovo" name="localizacaoNovo" required>
                      <option value="" disabled selected>Selecione a Localização</option>
                      <?php foreach ($Salas as $Sala) : ?>
                        <option value="<?= $Sala['Id_Sala']; ?>"><?= $Sala['NomeSala']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="fornecedorNovo" class="form-label">Fornecedor:</label>
                    <input type="text" class="form-control" id="fornecedorNovo" name="fornecedorNovo" autocomplete="off" required>
                  </div>
                  <div class="mb-3">
                    <label for="dataFornecimentoNovo" class="form-label">Data de Fornecimento:</label>
                    <input type="date" class="form-control" id="dataFornecimentoNovo" name="dataFornecimentoNovo" autocomplete="off" required>
                  </div>
                  <div class="mb-3">
                    <label for="descricaoEquipamentoNovo" class="form-label">Descrição do Equipamento:</label>
                    <textarea class="form-control" id="descricaoEquipamentoNovo" name="descricaoEquipamentoNovo" rows="3" autocomplete="off" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="observacoesNovo" class="form-label">Observações:</label>
                    <textarea class="form-control" id="observacoesNovo" name="observacoesNovo" rows="3" autocomplete="off" required></textarea>
                  </div>
                  <!-- Adicione outros campos conforme necessário -->
                  <button type="submit" class="btn btn-primary">Adicionar Equipamento</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal para immprimir tipo -->
        <div class="modal fade needs-validation" data-bs-backdrop="static" data-bs-keyboard="false" id="imprimirModalLabel" tabindex="-1" aria-labelledby="imprimirModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="imprimirModalLabelLabel">Imprimir Relatórios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <!-- Formulário para gerar relatórios -->
                <form action="./Controllers/pdf/RelatórioICT_Equipamentos.php" method="POST">
                  <div class="mb-3">
                    <div class="d-flex flex-column">
                      <label for="todosTiposImprimir" class="form-label">Tipo:</label>
                      <select class="form-select" name="tipoEquipamentos" id="todosTiposImprimir" required>
                        <!-- Opções para tipos de equipamento -->
                        <option value="todosEquipamentos" selected>Todos</option>
                        <?php foreach ($tipos as $tipo) { ?>
                          <option class="text-dark" value="<?= $tipo->getTipo() ?>"><?= $tipo->getTipo() ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="d-flex mt-4 gap-4">
                      <div class="d-flex flex-column">
                        <label for="inicio" class="form-label">Início:</label>
                        <input type="date" id="inicio" class="form-control" name="dataInicio">
                      </div>
                      <div class="d-flex flex-column">
                        <label for="fim" class="form-label">Fim:</label>
                        <input type="date" id="fim" class="form-control" name="dataFinal">
                      </div>
                      <div class="d-flex flex-column">
                        <label for="estado" class="form-label">Estado:</label>
                        <select name="opcoesEstado" class="form-select" id="estado">
                          <option value="todos">Todos</option>
                          <option value="Ativo">Ativos</option>
                          <option value="Inativo">Inativos</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Gerar</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal para adicionar tipo -->
        <div class="modal fade needs-validation" data-bs-backdrop="static" data-bs-keyboard="false" id="adicionarTipoModal" tabindex="-1" aria-labelledby="adicionarTipoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adicionarTipoModalLabel">Adicionar Tipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Formulário para adicionar tipo -->
                <form id="adicionarTipoForm">
                  <div class="mb-3">
                    <label for="novoTipo" class="form-label">Novo Tipo:</label>
                    <input type="text" class="form-control" id="novoTipo" name="novoTipo" autocomplete="off" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Adicionar Tipo</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal de edição do tipo -->
        <div class="modal fade" id="editarTipoModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editarTipoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editarTipoModalLabel">Editar Tipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Formulário para editar tipo -->
                <form id="editarTipoForm">
                  <div class="mb-3">
                    <label for="tipoExistente" class="form-label">Escolha um tipo existente:</label>
                    <select class="form-select" id="tipoExistente" name="tipoExistente">
                      <!-- Listar todos os tipos existentes -->
                      <?php foreach ($tipos as $tipo) { ?>
                        <option value="<?= $tipo->getIdTipo() ?>"><?= $tipo->getTipo() ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="novoTipo" class="form-label">Novo nome do tipo:</label>
                    <input type="text" class="form-control" list="datalistOptions" id="novoTipoTipo" name="novoNomeTipo" required autocomplete="off">
                    <datalist id="datalistOptions">
                      <?php foreach ($tipos as $tipo) { ?>
                        <option value="<?= $tipo->getTipo() ?>">
                        <?php } ?>
                    </datalist>
                  </div>

                  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
              </div>
            </div>
          </div>
        </div>



        <!-- filtros-->
        <div class="equipamentos container-fluid p-1">
          <div class="equipamentos-title-add  ">
            <div class="equipamento-title text-uppercase d-flex pt-3 ">
              <p class="align-text-bottom ">Equipamentos</p>
              <div class="dropdown ms-3">
                <select class="form-select" id="categoryFilter">
                  <option value="">Todos tipos</option>

                  <?php
                  foreach ($tipos as $tipo) { ?>
                    <option class="text-dark" value="<?= $tipo->getTipo() ?>">
                      <?= $tipo->getTipo() ?>
                    </option>
                  <?php } ?>

                </select>
              </div>

              <div class="dropdown ms-3">
                <select class="form-select" id="estadoFilter">
                  <option value="" selected>Todos estados</option>
                  <option class="text-dark" value="Ativo">Ativo</option>
                  <option class="text-dark" value="Inativo">Inativo</option>
                </select>
              </div>


            </div>

          </div>
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
                <th colspan="2" class="text-center ">Ações</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($equipamentos as $equipamento) : ?>

                <tr class="equipment-row equipamento <?= $equipamento->getTipo() ?>" id="equipamento<?= $equipamento->getIdEquipamento() ?>">
                  <td><?= ++$count ?></td>
                  <td><?= $equipamento->getNrDeSerie() ?></td>
                  <td><?= $equipamento->getTipo() ?></td>
                  <td><?= $equipamento->getMarca() ?></td>
                  <td><?= $equipamento->getModelo() ?></td>
                  <td class="estadoCol">

                    <?php if ($equipamento->getEstado() == "Ativo" || $equipamento->getEstado() == "Activo") { ?>
                      <span class="badge rounded-pill bg-info p-2 px-3">
                        <?= $equipamento->getEstado() ?>
                      </span>
                    <?php } else { ?>
                      <span class="badge rounded-pill bg-secondary p-2">
                        <?= $equipamento->getEstado() ?>
                      </span>
                    <?php } ?>

                  </td>
                  <td><?= $equipamento->getLocalizacao() ?></td>
                  <td>
                    <button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="editarEquipamento(<?= $equipamento->getIdEquipamento() ?>)">
                      <i class="bi bi-pencil-square"></i> Editar
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-primary" onclick="verDetalhesEquipamento(<?= $equipamento->getIdEquipamento() ?>)">
                      <i class="bi bi-info-circle"></i> Ver detalhes
                    </button>
                  </td>

                </tr>

                <!-- Formulário para editar equipamento -->
                <div class="modal fade needs-validation" id="editarEquipamentoModal" tabindex="-1" aria-labelledby="editarEquipamentoModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                  <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editarEquipamentoModalLabel">Editar Equipamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                        <form id="editarEquipamentoForm">
                          <div class="mb-3">
                            <label for="tipoEdit" class="form-label">Tipo:</label>
                            <select class="form-select" id="tipoEdit" name="tipoEdit" required>
                              <?php
                              foreach ($tipos as $tipo) { ?>
                                <option class="text-dark" value="<?= $tipo->getIdTipo() ?>">
                                  <?= $tipo->getTipo() ?>
                                </option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="marcaEdit" class="form-label">Marca:</label>
                            <input type="text" class="form-control" id="marcaEdit" name="marcaEdit" required>
                          </div>
                          <div class="mb-3">
                            <label for="modeloEdit" class="form-label">Modelo:</label>
                            <input type="text" class="form-control" id="modeloEdit" name="modeloEdit" required>
                          </div>
                          <div class="mb-3">
                            <label for="nrDeSerieEdit" class="form-label">Número de Série:</label>
                            <input type="text" class="form-control" id="nrDeSerieEdit" name="nrDeSerieEdit" required>
                          </div>
                          <div class="mb-3">
                            <label for="estadoEdit" class="form-label">Estado:</label>
                            <select class="form-select" id="estadoEdit" name="estadoEdit" required>
                              <option value="Ativo">Ativo</option>
                              <option value="Inativo">Inativo</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="localizacaoEdit" class="form-label">Localização:</label>
                            <select class="form-select" id="localizacaoEdit" name="localizacaoEdit" required>
                              <option value="" disabled selected>Selecione a Localização</option>
                              <?php foreach ($Salas as $Sala) : ?>
                                <option value="<?= $Sala['Id_Sala']; ?>"><?= $Sala['NomeSala']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="fornecedorEdit" class="form-label">Fornecedor:</label>
                            <input type="text" class="form-control" id="fornecedorEdit" name="fornecedorEdit" required>
                          </div>
                          <div class="mb-3">
                            <label for="dataFornecimentoEdit" class="form-label">Data de Fornecimento:</label>
                            <input type="date" class="form-control" id="dataFornecimentoEdit" name="dataFornecimentoEdit" required>
                          </div>
                          <div class="mb-3">
                            <label for="descricaoEquipamentoEdit" class="form-label">Descrição do Equipamento:</label>
                            <textarea class="form-control" id="descricaoEquipamentoEdit" name="descricaoEquipamentoEdit" rows="3" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="observacoesEdit" class="form-label">Observações:</label>
                            <textarea class="form-control" id="observacoesEdit" name="observacoesEdit" rows="3" required></textarea>
                          </div>
                          <!-- Adicione outros campos conforme necessário -->
                          <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal para ver detalhes do equipamento -->
                <div class="modal fade" id="verDetalhesEquipamentoModal" tabindex="-1" aria-labelledby="verDetalhesEquipamentoModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                  <div class=" modal-dialog  modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="verDetalhesEquipamentoModalLabel">Detalhes do Equipamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="tipoDetalhes" class="form-label">Tipo:</label>
                          <input type="text" class="form-control" id="tipoDetalhes" name="tipoDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="marcaDetalhes" class="form-label">Marca:</label>
                          <input type="text" class="form-control" id="marcaDetalhes" name="marcaDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="modeloDetalhes" class="form-label">Modelo:</label>
                          <input type="text" class="form-control" id="modeloDetalhes" name="modeloDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="nrDeSerieDetalhes" class="form-label">Número de Série:</label>
                          <input type="text" class="form-control" id="nrDeSerieDetalhes" name="nrDeSerieDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="estadoDetalhes" class="form-label">Estado:</label>
                          <input type="text" class="form-control" id="estadoDetalhes" name="estadoDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="localizacaoDetalhes" class="form-label">Localização:</label>
                          <input type="text" class="form-control" id="localizacaoDetalhes" name="localizacaoDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="fornecedorDetalhes" class="form-label">Fornecedor:</label>
                          <input type="text" class="form-control" id="fornecedorDetalhes" name="fornecedorDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="dataFornecimentoDetalhes" class="form-label">Data de Fornecimento:</label>
                          <input type="date" class="form-control" id="dataFornecimentoDetalhes" name="dataFornecimentoDetalhes" required readonly>
                        </div>
                        <div class="mb-3">
                          <label for="descricaoEquipamentoDetalhes" class="form-label">Descrição do Equipamento:</label>
                          <textarea class="form-control" id="descricaoEquipamentoDetalhes" name="descricaoEquipamentoDetalhes" rows="3" required readonly></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="observacoesDetalhes" class="form-label">Observações:</label>
                          <textarea class="form-control" id="observacoesDetalhes" name="observacoesDetalhes" rows="3" required readonly></textarea>
                        </div>
                        <!-- Adicione outros campos de detalhes conforme necessário -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>




  <!-- Scripts no final do corpo do documento -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Se preferir, você pode baixar o Bootstrap e hospedá-lo localmente -->
  <!-- <script src="./caminho/para/bootstrap.bundle.min.js"></script> -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script defer src="./js/FiltroEquipamentos.js"></script>
  <script defer src="./js/pesquisar.js"></script>
  <script defer src="./js/modal.js"></script>
</body>

</html>