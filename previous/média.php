<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php

        $n1; $n2; $n3; $n4;

        $n1 = isset($_POST['nota1']) ? $_POST['nota1'] : 0;
        $n2 = isset($_POST['nota2']) ? $_POST['nota2'] : 0;
        $n3 = isset($_POST['nota3']) ? $_POST['nota3'] : 0;
        $n4 = isset($_POST['nota4']) ? $_POST['nota4'] : 0;

        $media = ($n1 + $n2 + $n3 + $n4)/4;

        echo "<p>A média do aluno é  <strong>$media</strong></p>";

        if($media >= 5) {
            echo "<p>Aprovado.</p>";
        }
        else {
            echo "<p>Reprovado.</p>";
        }
    ?>
</body>
</html>