<?php
require_once 'pessoa.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    if (Pessoa::deletar($id)) {
        header('Location: consulta.php');
        exit();
    }
}

header('Location: consulta.php');
exit();
?>