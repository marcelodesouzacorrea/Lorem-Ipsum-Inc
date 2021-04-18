<?php
    // credencias do banco de dados
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'projeto');

    // Tentativa de conexão ao banco de dados MySQL
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    //checar conexão
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>