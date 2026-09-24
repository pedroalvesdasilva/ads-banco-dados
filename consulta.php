<?php
require_once 'pessoa.php';
$pessoas = Pessoa::listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cadastro</title>
</head>
<body>
    <h3>Lista de Pessoas Cadastradas</h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>User</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pessoas)): ?>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pessoa['id']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['nome']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['user']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['email']); ?></td>
                        <td>
                            <a href="edita.php?id=<?php echo $pessoa['id']; ?>">Editar</a>
                            <a href="deleta.php?id=<?php echo $pessoa['id']; ?>" onclick="return confirm('Deseja Realmente excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>