<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
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
</body>
</html>