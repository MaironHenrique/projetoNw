<?php
session_start();
ob_start();
include('conecta.php');

$id = $_GET['id'];

$resultado = "select * from clientes where id=$id";
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
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Edição de Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style type="text/css">
            #tamanhoContainer {
                width: 900px;
            }
        </style>

        <div class="container" id="tamanhoContainer" style="margin-top: 40px">

            <h4>Formulário de Edição </h4>

            <form action="cliente_Update.php" method="post" style="margin-top: 20px">
                <input type="text" class="form-control" id="id" autocomplete="off" name="id" value="<?php echo $id ?>" style="display: none;">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nome" autocomplete="off" name="nome" value="<?php echo $nome ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nascimento</label>
                    <input type="date" class="form-control" id="nascimento" autocomplete="off" name="nascimento" value="<?php echo $nascimento ?>" readonly>
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control" id="cpf" autocomplete="off" name="cpf" value="<?php echo $cpf ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="tel" class="form-control" id="telefone" autocomplete="off" name="telefone" value="<?php echo $telefone ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" autocomplete="off" name="email" value="<?php echo $email ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Observacao</label><br>
                    <textarea rows="10" cols="40" maxlength="300" id= "obs" name="obs" autocomplete="off"<?php echo $obs ?>"></textarea>
                </div>

                <label>Atenção! Apenas é possível editar apenas a informação de Observação!</label>

                <div style="text-align: right">
                    <a href="index.php" role="button" class="btn btn-primary botao">Voltar</a>
                    <button type="submit" id="botao" class="btn btn-primary botao">Salvar</button>
                </div>
            </form>

        </div>

    </body>
</html>