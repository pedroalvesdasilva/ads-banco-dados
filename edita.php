<?php
require_once 'pessoa.php';

$pessoaData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $user = $_POST['user'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($id !== null) {
        $pessoa = new Pessoa($id, $nome, $user, $email);

        if ($pessoa->atualizar()) {
            header('Location: consulta.php');
            exit();
        }
    }

    header('Location: consulta.php');
    exit();
} elseif (!empty($_GET['id'])) {
    $pessoaData = Pessoa::buscarPorId($_GET['id']);

    if (!$pessoaData) {
        header('Location: consulta.php');
        exit();
    }
} else {
    header('Location: consulta.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cadastro</title>
</head>
<body>
    <h3>Editar Cadastro</h3>
    <form action="edita.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($pessoaData['id']); ?>">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($pessoaData['nome']); ?>" required><br><br>
        User: <input type="text" name="user" value="<?php echo htmlspecialchars($pessoaData['user']); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($pessoaData['email']); ?>" required><br><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>