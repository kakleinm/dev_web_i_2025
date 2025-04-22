<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Formulário</title>
</head>
<body>
    <form action="q3-exibir.php" method="POST">
        <label>Nome </label><input type="text" name="nome"><br>
        <label>Idade </label><input type="number" name="idade"><br>
        <label>Estado </label><select name="estado">
            <option>AC</option>
            <option>AL</option>
            <option>AP</option>
            <option>AM</option>
            <option>BA</option>
            <option>CE</option>
            <option>DF</option>
            <option>ES</option>
            <option>GO</option>
            <option>MA</option>
            <option>MT</option>
            <option>MS</option>
            <option>MG</option>
            <option>PA</option>
            <option>PB</option>
            <option>PR</option>
            <option>PE</option>
            <option>PI</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RS</option>
            <option>RO</option>
            <option>RR</option>
            <option>SC</option>
            <option>SP</option>
            <option>SE</option>
            <option>TO</option>
        </select><br>
        <label>Cidade </label><input type="text" name="cidade"><br>
        <label>Sexo </label>
        <label>M </label><input type="radio" name="sexo" value="masc">
        <label>F </label><input type="radio" name="sexo" value="fem">
        <button>Enviar</button>
    </form>
</body>
</html>