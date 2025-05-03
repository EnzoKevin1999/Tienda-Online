<?php

session_start();

unset($_SESSION["username"]);

unset($_SESSION["tipo_usuario"]);

header("Location:./index.php");



?>