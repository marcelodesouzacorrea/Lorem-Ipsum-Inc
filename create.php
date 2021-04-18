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
?>