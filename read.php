<?php
    // Verifique a existência do parâmetro id antes de continuar a processar
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // inclui o arquivo config
    require_once "config.php";
?>