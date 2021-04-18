<?php
    // Verifique a existência do parâmetro id antes de continuar a processar
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // inclui o arquivo config
    require_once "config.php";

     // Prepare uma declaração selecionada
     $sql = "SELECT * FROM employees WHERE id = ?";

     if($stmt = mysqli_prepare($link, $sql)){
        // Vincular variáveis ​​à instrução preparada como parâmetros
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        // configura o parametro
        $param_id = trim($_GET["id"]);
?>