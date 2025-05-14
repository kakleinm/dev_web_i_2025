<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Locadora</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f1f3f4;
      padding: 10px 20px;
      border-bottom: 1px solid #ccc;
    }

    main {
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 300px;
    }

    form input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    form button {
      padding: 10px;
      background-color: #4285f4;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    form button:hover {
      background-color: #357ae8;
    }
  </style>
</head>
<body>
  <header>
    <h2>Locadora</h2>
  </header>

  <main>
    <form method="POST">
      <h2>Login</h2>
      <input type="email" placeholder="E-mail" name="email" required>
      <input type="password" placeholder="Senha" name="senha" required>
      <button type="submit">Entrar</button>
    </form>
  </main>
  <?php
    session_start();
    $_SESSION["usuarios"] = [];
    $usuarios = [
      [
          'nome' => 'João Silva',
          'email' => 'joao.silva@example.com',
          'senha' => 'senha123'
      ],
      [
          'nome' => 'Maria Oliveira',
          'email' => 'maria.oliveira@example.com',
          'senha' => 'maria456'
      ],
      [
          'nome' => 'Carlos Souza',
          'email' => 'carlos.souza@example.com',
          'senha' => 'carlos789'
      ]
    ];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    foreach($usuarios as $key => $dado) {
      if($email == $dado['email'] && $senha == $dado['senha']) {
        array_push($_SESSION["usuarios"], $usuarios[$key]);
      }
    }
  ?>
</body>
</html>
