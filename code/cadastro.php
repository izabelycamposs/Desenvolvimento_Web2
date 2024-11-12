<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vaga de Estágio</title>
    <link rel="stylesheet" href="css/cadastrostyle.css">
</head>
<body>
    
    <div class="form-container">
        <h1>Cadastro de Vaga de Estágio</h1>
        <form action="classes/classes.php" method="POST">
            <label for="nome_empresa">Nome da Empresa:</label>
            <input type="text" name="nome_empresa" id="nome_empresa" required>
            
            <label for="numero_whatsapp">Número do WhatsApp:</label>
            <input type="text" name="numero_whatsapp" id="numero_whatsapp" required>
            
            <label for="email_contato">E-mail de Contato:</label>
            <input type="email" name="email_contato" id="email_contato" required>
            
            <label for="descricao_vaga">Breve Descrição da Vaga:</label>
            <textarea name="descricao_vaga" id="descricao_vaga" required></textarea>
            
            <label for="curso">Curso:</label>
            <select name="curso" id="curso" required>
                <option value="1">DSM</option>
                <option value="2">GE</option>
            </select>
            
            <button type="submit">Cadastrar Vaga</button>
        </form>
    </div>
</body>
</html>
