<?php
require_once 'conexao.php';

class Pessoa {
    private $nome;
    private $user;
    private $email;

    public function __construct($nome, $user, $email) {
        $this->nome = $nome;
        $this->user = $user;
        $this->email = $email;
    }

    public function inserir(){
        try {
            $pdo = Conexao::getConexao();
            $aql = "INSERT INTO pessoa (nome, user, email) VALUES (:nome, :user, :email)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute ( [
                ':nome' => $this->nome,
                ':user' => $this->user,
                ':email' => $this->email
             ]);

        return $stmt->rowCount() > 0;
        } catch (PODException $e) {
            return false;
        }
    }
}
?>