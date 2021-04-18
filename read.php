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
            } else{
                //URL não contém parâmetro de id válido. Redirecionar para a página de erro
                header("location: error.php");
                exit();
            }
        } else{
            echo "Ups! Algo deu errado. Por favor, tente novamente mais tarde.";
        }
    }
    // Fechar declaração
    mysqli_stmt_close($stmt);
    
    // Fechar conexão
    mysqli_close($link);
} else{
    // O URL não contém o parâmetro id. Redirecionar para a página de erro
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <h1 class="mt-5 mb-3">Ver registro</h1>
                <div class="form-group">
                        <label>Nome</label>
                        <p><b><?php echo $row["nome"]; ?></b></p>
                </div>

                <div class="form-group">
                        <label>Inicio</label>
                        <p><b><?php echo $row["inicio"]; ?></b></p>
                </div>

                <div class="form-group">
                        <label>Fim</label>
                        <p><b><?php echo $row["fim"]; ?></b></p>
                </div>

                <div class="form-group">
                        <label>Valor</label>
                        <p><b><?php echo $row["valor"]; ?></b></p>
                </div>

                <div class="form-group">
                        <label>Riscos</label>
                        <p><b><?php echo $row["riscos"]; ?></b></p>
                </div>

                <div class="form-group">
                        <label>Participantes</label>
                        <p><b><?php echo $row["participantes"]; ?></b></p>
                </div>

                <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>