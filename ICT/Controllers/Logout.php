<?php

session_start();


session_destroy();

header("Location: ../LoginICT.php");
exit();
?>
