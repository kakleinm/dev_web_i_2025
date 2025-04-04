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

        input {
            width: 50px;
        }
    </style>
</head>
<body>
    <h1>calculadora</h1>
    <form action="resultado.php" method="post">
        <input type="number" name="n1">
        <select name="op">
            <option>+</option>
            <option>-</option>
            <option>*</option>
            <option>/</option>
        </select>
        <input type="number" name="n2">
        <button>enviar</button>
    </form>
</body>
</html>