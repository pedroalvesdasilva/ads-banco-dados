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
            $sql = "INSERT INTO pessoa (nome, user, email) VALUES (:nome, :user, :email)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute ( [
                ':nome' => $this->nome,
                ':user' => $this->user,
                ':email' => $this->email
             ]);

        return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
    //Metodo consultador todos
          public static function listarTodos () {
            try { 
            $pdo= Conexao::getConexao();
            $sql = "SELECT * FROM pessoa";
            $stmt = $pdo->query($sql);
            // Retorna um array com todos os registros
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>