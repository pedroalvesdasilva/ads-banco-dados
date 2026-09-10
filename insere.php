<?php
ini_set ('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'pessoa.php';

if ($_server['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["NOME"] ?? '';
    $user = $_POST["user"] ?? '';
    $email = $_POST["email"] ?? '';

    $pessoa = new Pessoa($nome, $user, $email);

    if ($pessoa->inserir()) {
        echo "<p>Cadastro feito com sucesso</p><br>";
        echo '<a href="index.html">Voltar para home</a><br/>';
        header("refresh:3;url-index.html");
        echo 'Redirencionamento a página em 3 segndos!';
    } else {
        echo "Erro, nãao foi possível inserir no banco de dados<br/>";
        header("refresh:3;url=index.php");
        echo 'Redirecionamento a página em 3 segundos!';
    }
} else {
    header("Locaiton: index.php");
    exit();
}
?>