<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Padaria Bolachinha</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <label>Email </label><input type="email" name="email">
        <label>Senha </label><input type="text" name="senha">
        <button>Log in</button>
    </form>
    <p><a href="../usuarios/cadastro_usuarios.php">Cadastre-se</a></p>
    <?php

        session_start();
        include("../../service/usuario.service.php");
        if (!isset($_SESSION["login"])) $_SESSION["login"] = [];
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : null;
        $array = arrayUsuario();
        foreach($array as $user) {
            if ($user->email == $email && $user->senha == $senha) {
                $_SESSION["login"]["email"] = $email;
                $_SESSION["login"]["senha"] = $senha;
                $_SESSION["login"]["nome"] = $user->nome;
                header('Location: index.php');
                exit;
            }
        }
    ?>
</body>
</html>