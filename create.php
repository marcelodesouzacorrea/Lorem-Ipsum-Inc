<?php
    // incluindo o arquivo config.php
    require_once ('config.php');

    // Defina variáveis ​​e inicialize com valores vazios
$nome = $inicio = $fim = $valor = $riscos = $Participantes = "";
$nome_err = $inicio_err = $fim_err = $valor_err = $riscos_err = $Participantes_err = "";

// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validando o nome
    $input_name = trim($_POST["nome"]);
    if(empty($input_nome)){
        $name_err = "Digite o nome.";
    } elseif(!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nome_err = "Digite um nome valido.";
    } else{
        $nome = $input_nome;
    }
    // validando o inicio
    $input_inicio = trim($_POST["inicio"]);
    if(empty($input_inicio)){
        $inicio_err = "Digite o inicio.";
    } elseif(!filter_var($input_inicio, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $inicio_err = "Digite um inicio valido.";
    } else{
        $inicio = $input_inicio;
    }
    // validando o fim
    $input_fim = trim($_POST["fim"]);
    if(empty($input_fim)){
        $fim_err = "Digite o fim.";
    } elseif(!filter_var($input_fim, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fim_err = "Digite um fim valido.";
    } else{
        $fim = $input_fim;
    }
    // validando o valor
    $input_valor = trim($_POST["valor"]);
    if(empty($input_valor)){
        $name_err = "Digite o valor.";
    } elseif(!filter_var($input_valor, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $valor_err = "Digite um valor valido.";
    } else{
        $valor = $input_valor;
    }
    // validando o riscos
    $input_riscos = trim($_POST["riscos"]);
    if(empty($input_riscos)){
        $name_err = "Digite o riscos.";
    } elseif(!filter_var($input_riscos, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $riscos_err = "Digite um riscos valido.";
    } else{
        $riscos = $input_riscos;
    }
    // validando o participantes
    $input_participantes = trim($_POST["participantes"]);
    if(empty($input_participantes)){
        $participantes_err = "Digite o participantes.";
    } elseif(!filter_var($input_participantes, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $participantes_err = "Digite um participantes valido.";
    } else{
        $participantes = $input_participantes;
    }
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($nome_err) && empty($inicio_err) && empty($fim_err) && empty($valor_err) && empty($riscos_err) && empty($participantes_err)){
        // Prepare uma declaração de inserção
        $sql = "INSERT INTO employees (nome, inicio, fim, valor, riscos, participantes) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variáveis ​​à instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "sss", $param_nome, $param_inicio, $param_fim,$param_valor, $param_riscos, $param_participantes);

            // configura os parametros
            $param_nome = $nome;
            $param_inicio = $inicio;
            $param_fim = $fim;
            $param_valor = $valor;
            $param_riscos = $riscos;
            $param_participantes = $participantes;

            // Tente executar a declaração preparada
            if(mysqli_stmt_execute($stmt)){
                // Registros criados com sucesso. Redirecionar para a página de destino
                header("location: index.php");
                exit();
            } else{
                echo "Ups! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
          // Fechar declaração
          mysqli_stmt_close($stmt);
        }
         // Fechar conexão
    mysqli_close($link);
            
?>