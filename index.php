<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorem Ipsum Inc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        .<div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Detalhes do Projeto</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar novos projetos</a>
                </div>
            <?php
                  // inclusão do arquivo config.php
                  require_once "config.php";

            
                  // Tentar selecionar a execução da consulta
            $sql = "SELECT * FROM listaprojetos";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo '<table class="table table-bordered table-striped">';
            ?>    
            
            </div>
            </div>
        </div>
    </div>
</body>
</html>