<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vagas de Estágio - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Logo_fatec_araras.png" alt="Logo Fatec Araras" class="logo">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="login" placeholder="Insira seu login" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Insira sua senha" required>
                </div>
                <input class="botaoentrar" type="submit" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>
