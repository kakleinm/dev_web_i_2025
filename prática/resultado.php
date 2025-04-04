<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h1>calculadora</h1>
    <?php
        $a = $_POST["n1"];
        $b = $_POST["n2"];
        $op = $_POST["op"];

        if ($op == '+') $a += $b;
        if ($op == '-') $a -= $b;
        if ($op == '*') $a *= $b;
        if ($op == '/') $a /= $b;
        echo "O resultado é <b>", $a, "</b><br><br>";
    ?>
    <a href="calcula.php">voltar</a>
</body>
</html>