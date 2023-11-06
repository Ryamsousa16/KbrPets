<?php
    include("../painel/conn.php");

    session_start();

    session_destroy();

    header("Location: ../login.php");

    exit();
?>