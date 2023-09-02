<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Cadastrar Gerente</h1>

    <form action="Controllers/testeCadastrar.php" method="POST">

    <input type="text" name="nome" placeholder="nome" required>
    <br><br>
    <input type="text" name="apelido" placeholder="apelido" required>
    <br><br>
    <input type="text" name="contacto" placeholder="contacto" required>
    <br><br>
    <input type="text" name="login" placeholder="login" required>
    <br><br>
    <input type="text" name="senha" placeholder="senha" required>
    <br><br>
    <input type="submit" value="Cadastrar">
    </form>
    
    <br>
    




    <br>
    <h2>Clique aqui para ver todos os gerentes</h2>
    <form method="post" action="Controllers/outra_pagina.php">
    <input type="submit" name="redirecionar" value="Redirecionar para Outra Página">
</form>

</body>
</html>