<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <h1>Cadastrar Administrador</h1>

    <form action="Controllers/Cadastrar.php" method="POST">
        <input type="text" name="login" placeholder="Login" required>
        <br><br>
        <input type="text" name="senha" placeholder="Senha" required>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <br>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table table-responsive-xl">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nome de Usuário</th>
                            <th>Estado</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="alert" role="alert">

                            <td class="d-flex align-items-center">
                                <div class="pl-3 email">
                                    <span>markotto@email.com</span>
                                    <span>Added: 01/03/2020</span>
                                </div>
                            </td>
                            <td>Markotto89</td>
                            <td class="status"><span class="active">Ativo</span></td>
                            <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>
                        <tr class="alert" role="alert">

                            <td class="d-flex align-items-center">
                                <div class="pl-3 email">
                                    <span>jacobthornton@email.com</span>
                                    <span>Added: 01/03/2020</span>
                                </div>
                            </td>
                            <td>Jacobthornton</td>
                            <td class="status"><span class="waiting">Inativo</span></td>
                            <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <br>
    <h2>Clique aqui para ver todos os Administradores</h2>
    <form method="post" action="Controllers/outra_pagina.php">
        <input type="submit" name="redirecionar" value="Redirecionar para Outra Página">
    </form>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>