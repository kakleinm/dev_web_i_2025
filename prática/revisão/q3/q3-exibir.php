<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Formulário</title>
</head>
<body>
    <?php
        if(!empty($_POST["nome"]) && !empty($_POST["idade"]) && !empty($_POST["estado"]) && !empty($_POST["cidade"]) && !empty($_POST["sexo"])) {
            $nome = $_POST["nome"];
            $idade = $_POST["idade"];
            $estado = $_POST["estado"];
            $cidade = $_POST["cidade"];
            $sexo = $_POST["sexo"];
            echo $nome . "<br>" . $idade . "<br>" . $estado . "<br>" . $cidade . "<br> Sexo " . $sexo; 
        }
        else echo 'ERRO. Algum dos campos não foi devidamente preenchido. <a href="q3-form.php">Voltar</a>';
    ?>
</body>
</html>