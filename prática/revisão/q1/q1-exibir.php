<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média de Notas</title>
</head>
<body>
    <?php
        $n1 = $_POST["n1"];
        $n2 = $_POST["n2"];
        $n3 = $_POST["n3"];
        $n4 = $_POST["n4"];
        $media = $n1 + $n2 + $n3 + $n4;
        $media /= 4;
        echo "A média do aluno é " . $media . "<br>";
        if ($media >= 5) echo "O aluno está aprovado.";
        else echo "O aluno está reprovado.";
    ?>
</body>
</html>