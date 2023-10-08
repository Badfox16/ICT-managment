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
                    <span class="fs-4">Relatórios</span>
                    <span class="fs-4">ICT</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white mt-4 mb-4" aria-current="page">
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
                        <a href="#" class="nav-link active mb-4">
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
                    <h3 class="text-uppercase mx-4 text-dark">Relatórios - ict</h3>
                </div>

                <div class="manager-name">
                    <h5 class="text-black">Seja bem vindo de volta</h5>
                    <p class="text-end text-dark">Felizardo Carlos</p>
                </div>
            </div>

            <div class="main-content">
                <div class="reporter-print d-flex">
                    <!-- Adicionar membros do patrimonio -->
                    <div class="reporter-form container col-6">
                        <h3 class="text-primary">Ver Relatórios</h3>
                        <form action="" method="POST" class="form-reporter">
                            <div class="mb-3">
                                <input type="checkbox" name="Switch" id="switch" class="form-check-input">
                                <label for="switch" class="form-check-label">Switch</label>&nbsp;&nbsp;
                                <input type="checkbox" name="Antenas" id="antenas" class="form-check-input">
                                <label for="antenas" class="form-check-label">Antenas</label>&nbsp;&nbsp;
                                <input type="checkbox" name="Projetor" id="projetor" class="form-check-input">
                                <label for="projetor" class="form-check-label">Projetor</label>&nbsp;&nbsp;
                                <input type="checkbox" name="Camera" id="camera" class="form-check-input">
                                <label for="camera" class="form-check-label">Camera</label>&nbsp;&nbsp;
                                <input type="checkbox" name="Computador" id="computador" class="form-check-input">
                                <label for="computador" class="form-check-label">Computador</label>&nbsp;&nbsp;
                                <input type="checkbox" name="Todos" id="todos" class="form-check-input">
                                <label for="todos" class="form-check-label">Todos</label>
                            </div>
                            <div class="mb-3">
                                <input type="date" name="nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <input type="date" name="nome" class="form-control" required>
                            </div>
                            <div class="print">
                                <button class="btn text-bg-secondary">
                                    <i class="bi bi-file-earmark-arrow-down"></i>
                                    Gerar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>