<?php
session_start();
if (isset($_SESSION['patrimonio_id']) && isset($_SESSION['patrimonio_email']) && isset($_SESSION['patrimonio_login'])) {
//Conexao
require_once 'Classes/Database/ConexaoBD.php';
//Softwares
require_once 'Classes/Softwares/SoftwareDAO.php';
require_once 'Classes/Softwares/SoftwareDTO.php';
require_once 'Classes/Equipamentos/EquipamentoDAO.php';
require_once 'Classes/Equipamentos/EquipamentoDTO.php';

$count = 0;

$conexao = ConexaoBD::conectar();

$softwareDAO = new SoftwareDAO($conexao);
$equipamentoDAO = new EquipamentoDAO($conexao);

// Chamar o método para listar todos os softwares
$softwares = $softwareDAO->listarTodos();
$computadores = $equipamentoDAO->listarComputadores();
} else {
    header("Location: ../Login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Gerenciamento de Softwares</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                    <a  href="../Dashboard/index.php" class="nav-link my-4 text-white">
                        Menu Principal
                    </a>
                </li>
                <li>
                    <a href="../Equipamentos/index.php" class="nav-link text-white  mb-4">
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="../Softwares/index.php" class="nav-link active mb-4">
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
        <div class="card-body mt-3" style="width: calc(100% - 300px); margin-left: 320px; overflow-y: scroll;">
            <div class="header d-flex justify-content-between text-muted">
                <div class="system-name">
                    <h3 class="text-uppercase mx-4 text-dark">Ict-Equipamentos</h3>
                </div>

                <div class="manager-name">
                    <h5 class="text-black">Seja bem vindo</h5>
                    <p class="text-end text-dark"><?=$_SESSION['patrimonio_login']?></p>
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
                        <button class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#adicionarSoftwareModal">
                            <i class="bi bi-terminal"></i>
                            ADICIONAR SOFTWARE</button>
                    </div>

                    <!-- Imprimir membros do patrimonio -->
                    <div class="print  ">
                        <button class="btn bg-danger text-light fw-bold" data-bs-toggle="modal" data-bs-target="#imprimirModalLabel">
                            <i class="bi bi-file-earmark-arrow-down"></i>
                            <span class="text-light ">Imprimir</span></button>
                    </div>
                </div>
            </div>

            <!-- Modal para adicionar software -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="adicionarSoftwareModal" tabindex="-1" aria-labelledby="adicionarSoftwareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adicionarSoftwareModalLabel">Adicionar Software</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- No modal de adicionar equipamento -->
                            <form class="" id="adicionarSoftwareForm">
                                <!-- Campos para adicionar um novo equipamento -->
                                <div class="mb-3">
                                    <label for="computadorNovo" class="form-label">Computador:</label>
                                    <select class="form-select" id="computadorNovo" name="computadorNovo" required>
                                        <!-- Opções para tipos de equipamento -->
                                        <?php
                                        foreach ($computadores as $computador) { ?>
                                            <option class="text-dark" value="<?= $computador['Id_Equipamento'] ?>">
                                                <?= $computador['NrDeSerie'] . ' - ' . $computador['Marca'] . ' - ' . $computador['Modelo'] . ' - ' . $computador['Localizacao'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nomeNovo" class="form-label">Nome do Software:</label>
                                    <input type="text" class="form-control" id="nomeNovo" name="nomeNovo" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fabricanteNovo" class="form-label">Fabricante:</label>
                                    <input type="text" class="form-control" id="fabricanteNovo" name="fabricanteNovo" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="versaoNovo" class="form-label">Versão:</label>
                                    <input type="text" class="form-control" id="versaoNovo" name="versaoNovo" autocomplete="off" required>
                                </div>

                                <div class="mb-3">
                                    <label for="estadoNovo" class="form-label">Estado:</label>
                                    <select class="form-select" id="estadoNovo" name="estadoNovo" required>
                                        <option value="Ativo">Ativo</option>
                                        <option value="Inativo">Inativo</option>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="dataInstalacaoNovo" class="form-label">Data de Instalação:</label>
                                    <input type="date" class="form-control" id="dataInstalacaoNovo" name="dataInstalacaoNovo" autocomplete="off" placeholder="AAAA-MM-DD" required>
                                </div>

                                <div class="mb-3">
                                    <label for="dataExpiracaoNovo" class="form-label">Data de Expiração:</label>
                                    <input type="date" class="form-control" id="dataExpiracaoNovo" name="dataExpiracaoNovo" placeholder="AAAA-MM-DD" autocomplete="off">
                                </div>



                                <div class="mb-3">
                                    <label for="observacoesNovo" class="form-label">Observações:</label>
                                    <textarea class="form-control" id="observacoesNovo" name="observacoesNovo" rows="3" autocomplete="off"></textarea>
                                </div>
                                <!-- Adicione outros campos conforme necessário -->
                                <button type="submit" class="btn btn-primary">Adicionar Software</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="equipamentos-title-add  ">
                <div class="equipamento-title text-uppercase d-flex pt-3 align-items-center  ">
                    <p class="align-bottom fw-bold pt-3 ">Softwares</p>
                    <div class="dropdown ms-3">
                        <select class="form-select" id="computadorFilter">
                            <option value="">Todos computadores</option>

                            <?php
                            foreach ($computadores as $computador) { ?>
                                <option class="text-dark" value="<?= $computador['Id_Equipamento'] ?>">
                                    <?= $computador['NrDeSerie'] . ' - ' . $computador['Marca'] . ' - ' . $computador['Modelo'] . ' - ' . $computador['Localizacao'] ?>
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


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Fabricante</th>
                        <th>Versão</th>
                        <th>Estado</th>
                        <th>Data de Instalação</th>
                        <th>Expira em</th>
                        <th colspan="2" class="text-center">Ações</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($softwares as $software) : ?>

                        <tr class="software-row software <?= $software->getEstado() ?>" id="software<?= $software->getIdSoftware() ?>">
                            <td><?= ++$count ?></td>
                            <td class="computadorCol" style="display:none"><?= $software->getIdEquipamento() ?></td>
                            <td><?= $software->getNomeSoftware() ?></td>
                            <td><?= $software->getFabricante() ?></td>
                            <td><?= $software->getVersao() ?></td>
                            <td class="estadoCol">
                                <?php if ($software->getEstado() == "Ativo" || $software->getEstado() == "Activo") : ?>
                                    <span class="badge rounded-pill bg-info p-2 px-3"><?= $software->getEstado() ?></span>
                                <?php else : ?>
                                    <span class="badge rounded-pill bg-secondary p-2"><?= $software->getEstado() ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $software->getDiaInstalacao() ?></td>
                            <td>
                                <?php
                                $dataExpiracao = $software->getDiaExpiracao(); // Supondo que você tenha um método para obter a data de expiração do objeto $software

                                if ($dataExpiracao == null) {
                                    echo '<span class="fw-bold text-uppercase text-success">Vitalício</span>';
                                } else {
                                    // Obter a data atual
                                    $dataAtual = new DateTime();

                                    // Converter a data de expiração para um objeto DateTime
                                    $dataExpiracaoObj = DateTime::createFromFormat('Y-m-d', $dataExpiracao);

                                    // Verificar se a data de expiração é igual ao dia atual
                                    if ($dataExpiracaoObj->format('Y-m-d') == $dataAtual->format('Y-m-d')) {
                                        echo '<span class="fw-bold text-uppercase text-info">Hoje</span>';
                                    } elseif ($dataExpiracaoObj < $dataAtual) {
                                        echo '<span class="fw-bold text-uppercase text-danger">Expirou</span>';
                                    } else {
                                        // Calcular a diferença em dias entre a data de expiração e a data atual
                                        $interval = $dataAtual->diff($dataExpiracaoObj);
                                        $diferencaDias = $interval->days;

                                        // Adicionar 1 dia para contar o dia atual como parte dos dias restantes
                                        $diferencaDias++;

                                        echo '<span class="fw-bold text-uppercase text-dark">' . $diferencaDias . ' dia(s)</span>';
                                    }
                                }
                                ?>
                            </td>

                            <td> <button class="btn btn-success ms-5" onclick="editarSoftware(<?= $software->getIdSoftware() ?>)">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button></td>


                            <td>
                                <button class="btn btn-primary" onclick="verDetalhesSoftware(<?= $software->getIdSoftware() ?>)">
                                    <i class="bi bi-info-circle"></i> Ver detalhes
                                </button>
                            </td>
                        </tr>


                        <!-- Modal para Editar Software -->
                        <div class="modal fade" id="editarSoftwareModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarSoftwareModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarSoftwareModalLabel">Editar Software</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulário para editar o software -->
                                        <form id="editarSoftwareForm">
                                            <div class="mb-3">
                                                <label for="computadorEdit" class="form-label">Computador:</label>
                                                <select class="form-select" id="computadorEdit" name="computadorEdit" required>
                                                    <!-- Opções para tipos de equipamento -->
                                                    <?php
                                                    foreach ($computadores as $computador) { ?>
                                                        <option class="text-dark" value="<?= $computador['Id_Equipamento'] ?>">
                                                            <?= $computador['NrDeSerie'] . ' - ' . $computador['Marca'] . ' - ' . $computador['Modelo'] . ' - ' . $computador['Localizacao'] ?>
                                                        </option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nomeEdit" class="form-label">Nome do Software:</label>
                                                <input type="text" class="form-control" id="nomeEdit" name="nomeEdit" autocomplete="off" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fabricanteEdit" class="form-label">Fabricante:</label>
                                                <input type="text" class="form-control" id="fabricanteEdit" name="fabricanteEdit" autocomplete="off" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="versaoEdit" class="form-label">Versão:</label>
                                                <input type="text" class="form-control" id="versaoEdit" name="versaoEdit" autocomplete="off" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="estadoEdit" class="form-label">Estado:</label>
                                                <select class="form-select" id="estadoEdit" name="estadoEdit" required>
                                                    <option value="Ativo">Ativo</option>
                                                    <option value="Inativo">Inativo</option>
                                                </select>
                                            </div>


                                            <div class="mb-3">
                                                <label for="dataInstalacaoEdit" class="form-label">Data de Instalação:</label>
                                                <input type="date" class="form-control" id="dataInstalacaoEdit" name="dataInstalacaoEdit" autocomplete="off" placeholder="AAAA-MM-DD" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dataExpiracaoEdit" class="form-label">Data de Expiração:</label>
                                                <input type="date" class="form-control" id="dataExpiracaoEdit" name="dataExpiracaoEdit" placeholder="AAAA-MM-DD" autocomplete="off">
                                            </div>



                                            <div class="mb-3">
                                                <label for="observacoesEdit" class="form-label">Observações:</label>
                                                <textarea class="form-control" id="observacoesEdit" name="observacoesEdit" rows="3" autocomplete="off"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modal para Ver Detalhes do Software -->
                        <div class="modal fade" id="detalhesSoftwareModal" tabindex="-1" aria-labelledby="detalhesSoftwareModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detalhesSoftwareModalLabel">Detalhes do Software</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulário para editar o software -->
                                        <form>
                                            <input type="hidden" name="idSoftwareDetalhes" value="<?= $software->getIdSoftware() ?>" id="idSoftwareDetalhes">
                                            <div class="mb-3">
                                                <label for="computadorDetalhes" class="form-label">Computador:</label>
                                                <input type="text" class="form-control" id="computadorDetalhes" name="computadorDetalhes" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nomeDetalhes" class="form-label">Nome do Software:</label>
                                                <input type="text" class="form-control" id="nomeDetalhes" name="nomeDetalhes" autocomplete="off" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fabricanteDetalhes" class="form-label">Fabricante:</label>
                                                <input type="text" class="form-control" id="fabricanteDetalhes" name="fabricanteDetalhes" autocomplete="off" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="versaoDetalhes" class="form-label">Versão:</label>
                                                <input type="text" class="form-control" id="versaoDetalhes" name="versaoDetalhes" autocomplete="off" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="estadoDetalhes" class="form-label">Estado:</label>
                                                <input type="text" class="form-control" id="estadoDetalhes" name="estadoDetalhes" readonly>

                                            </div>


                                            <div class="mb-3">
                                                <label for="dataInstalacaoDetalhes" class="form-label">Data de Instalação:</label>
                                                <input type="date" class="form-control" id="dataInstalacaoDetalhes" name="dataInstalacaoDetalhes" autocomplete="off" placeholder="AAAA-MM-DD" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dataExpiracaoDetalhes" class="form-label">Data de Expiração:</label>
                                                <input type="date" class="form-control" id="dataExpiracaoDetalhes" name="dataExpiracaoDetalhes" placeholder="AAAA-MM-DD" autocomplete="off" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="observacoesDetalhes" class="form-label">Observações:</label>
                                                <textarea class="form-control" id="observacoesDetalhes" name="observacoesDetalhes" rows="3" autocomplete="off" readonly></textarea>
                                            </div>
                                        </form>
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
    </section>




    <!-- Scripts no final do corpo do documento -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Se preferir, você pode baixar o Bootstrap e hospedá-lo localmente -->
    <!-- <script src="./caminho/para/bootstrap.bundle.min.js"></script> -->


    <script defer src="./js/pesquisa.js"></script>
    <script defer src="./js/filtroSoftwares.js"></script>
    <script defer src="./js/modal.js"></script>
</body>

</html>