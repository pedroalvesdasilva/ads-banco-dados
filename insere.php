<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'pessoa.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST["nome"] ?? '';
    $user = $_POST["user"] ?? '';
    $email = $_POST["email"] ?? '';

    $pessoa = new Pessoa($nome, $user, $email);

    if ($pessoa->inserir()) {

        header("refresh:3;url=index.php");

        echo "<p>Cadastro feito com sucesso!</p>";
        echo '<a href="index.php">Voltar para home</a><br/>';
        echo "Redirecionamento para a página em 3 segundos!";

    } else {

        header("refresh:3;url=index.php");

        echo "<p>Erro, não foi possível inserir no banco de dados.</p>";
        echo "Redirecionamento para a página em 3 segundos!";
    }

} else {

    header("Location: index.php");
    exit();
}

?>