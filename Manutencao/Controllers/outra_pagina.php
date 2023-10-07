<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["redirecionar"])) {
    // Redirecionar para outra página
    header("Location: ../ListarICT.php");
    exit();
}




