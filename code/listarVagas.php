<?php
require_once 'classes/classes.php';  

$cadastro = new Cadastro();
$vagas = $cadastro->listarVagas();  

// Verificar se foi solicitado excluir uma vaga
if (isset($_GET['excluir_id'])) {
    $idVaga = $_GET['excluir_id'];
    $cadastro->excluirVaga($idVaga);
    header("Location: listarVagas.php"); // Redirecionar após a exclusão
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Vagas de Estágio</title>
    <link rel="stylesheet" href="css/listarstyle.css">
</head>
<body>
    <div class="container">
        <h1>Vagas de Estágio</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome da Empresa</th>
                    <th>WhatsApp</th>
                    <th>E-mail de Contato</th>
                    <th>Descrição</th>
                    <th>Curso</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($vagas) > 0): ?>
                    <?php foreach ($vagas as $vaga): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vaga['nome_empresa']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['numero_whatsapp']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['email_contato']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['descritivo_vaga']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['curso']); ?></td>
                            <td>
                                <a href="?excluir_id=<?php echo $vaga['id']; ?>" class="delete-button" onclick="return confirm('Tem certeza que deseja excluir esta vaga?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhuma vaga cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <br>
        <a href="home.php" class="button">Voltar para a Home</a>
    </div>
</body>
</html>
