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

                    echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Inicio</th>";
                                        echo "<th>Fim</th>";
                                        echo "<th>Valor</th>";
                                        echo "<th>Riscos</th>";
                                        echo "<th>Participantes</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";  
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nome'] . "</td>";
                                        echo "<td>" . $row['inicio'] . "</td>";
                                        echo "<td>" . $row['fim'] . "</td>";
                                        echo "<td>" . $row['valor'] . "</td>";
                                        echo "<td>" . $row['riscos'] . "</td>";
                                        echo "<td>" . $row['participantes'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';

                                        echo "</td>";
                                        echo "</tr>";
                                    }

                                    echo "</tbody>";                            
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo '<div class="alert alert-danger"><em>Nenhum registro foi encontrado..</em></div>';
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
         
                            // Close connection
                            mysqli_close($link);
                            ?>
                        </div>
                    </div>        
                </div>
            </div>
        </body>
        </html>
            ?>                                  
            
            </div>
            </div>
        </div>
    </div>
</body>
</html>