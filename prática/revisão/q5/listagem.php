<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Funcionários - Empresa</title>
    <style>
        table {
        border: 1px solid black;
        text-align: center;
        }

        td {
        padding-left: 5px;
        padding-right: 5px;
        }

        th {
        padding-left: 9.5px;
        padding-right: 9.5px;
        }
    </style>
</head>
<body>
    <h1>Listagem de Funcionários</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Setor</th>
        </tr>
        <?php
            if (isset($_SESSION["funcionarios"])) {
                for ($i = 0; $i < count($_SESSION["funcionarios"]); $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 4; $j++) {
                        switch($j) {
                            case 0 : echo "<td>" . $_SESSION["funcionarios"][$i]["nome"] . "</td>"; break;
                            case 1 : echo "<td>" . $_SESSION["funcionarios"][$i]["email"] . "</td>"; break;
                            case 2 : echo "<td> (" . $_SESSION["funcionarios"][$i]["ddd"] . ") " . $_SESSION["funcionarios"][$i]["tel"] . "</td>"; break;
                            case 3 : echo "<td>" . $_SESSION["funcionarios"][$i]["setor"] . "</td>"; break;
                        }
                    }
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>