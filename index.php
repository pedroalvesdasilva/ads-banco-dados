<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
    <h3>Formulário de Cadastro</h3>
    <p><a href="consulta.php">Consultar Cadastro</a></p>
    <form action="insere.php" method="post">
        <label for="nome">Nome: </label> 
        <input type="text" name="nome" />
        <br/>
        <label for="user">User: </label>&nbsp;
        <input type="text" name="user" />
        <br/>
        <label for="email">Email: </label>
        <input type="email" name="email" />
        <br/> 
        <br/>
        <input type="submit" vlaue="Cadastrar" />
    </form>

</body>
</html>