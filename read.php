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
        // Tente executar a declaração preparada
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
/* Busca a linha do resultado como uma matriz associativa. Desde o conjunto de resultados
                contém apenas uma linha, não precisamos usar o loop while */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Recuperar valor de campo individual
                $nome = $row["nome"];
                $inicio = $row["inicio"];
                $fim = $row["fim"];
                $valor = $row["valor"];
                $riscos = $row["riscos"];
                $participantes = $row["participantes"];
                
?>