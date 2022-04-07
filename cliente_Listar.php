<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listagem de clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/14e3cc8fa2.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <div class="container" style="margin-top: 40px">

            <table class="table table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <!-- Define as colunas da sua tabela --> 
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">OBS</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <?php
                        include ('conecta.php');
                        $resultado = "SELECT * FROM clientes LIMIT 10";
                        $resultado = $conn->prepare($resultado);
                        $resultado->execute();

                        while ($array = $resultado->fetch(PDO::FETCH_ASSOC)) {

                            $id = $array['id'];
                            $nome = $array['nome'];
                            $nascimento = $array['nascimento'];
                            $cpf = $array['cpf'];
                            $telefone = $array['telefone'];
                            $email = $array['email'];
                            $obs = $array['observacao'];

                            //seta as variaveis para exibicao em cada linha

                            echo '<td>' . $id . '</td>';
                            echo '<td>' . $nome . '</td>';
                            echo '<td>' . $nascimento . '</td>';
                            echo '<td>' . $cpf . '</td>';
                            echo '<td>' . $telefone . '</td>';
                            echo '<td>' . $email . '</td>';
                            echo '<td>' . $obs . '</td>';
                            echo '<td> <a class="btn btn-warning btn-sm" href="cliente_Editar.php?id=' . $id . '" role="button"><i class="far fa-edit"></i> Editar</a>';
                            echo ' <a class="btn btn-danger btn-sm" href="cliente_Delete.php?id=' . $id . '" role="button"><i class="far fa-trash-alt"></i> Excluir</a></td>';

                            echo '</tr>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: right">
                <a href="index.php" role="button" class="btn btn-sm btn-primary">Voltar</a>
            </div>

        </div>


    </body>
</html>