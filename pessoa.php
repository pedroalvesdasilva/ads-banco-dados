<?php
require_once 'conexao.php';

class Pessoa {
    private $id;
    private $nome;
    private $user;
    private $email;

    public function __construct($valor1 = null, $valor2 = null, $valor3 = null, $valor4 = null) {
        if (is_numeric($valor1) && $valor2 !== null && $valor3 !== null && $valor4 !== null) {
            $this->id = (int) $valor1;
            $this->nome = $valor2;
            $this->user = $valor3;
            $this->email = $valor4;
        } else {
            $this->id = null;
            $this->nome = $valor1 ?? '';
            $this->user = $valor2 ?? '';
            $this->email = $valor3 ?? '';
        }
    }

    public function inserir() {
        try {
            $pdo = Conexao::getConexao();
            $sql = "INSERT INTO pessoa (nome, `user`, email) VALUES (:nome, :user, :email)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':nome' => $this->nome,
                ':user' => $this->user,
                ':email' => $this->email,
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function listarTodos() {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT * FROM pessoa ORDER BY id ASC";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public static function buscarPorId($id) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT * FROM pessoa WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function atualizar() {
        if ($this->id === null) {
            return false;
        }

        try {
            $pdo = Conexao::getConexao();
            $sql = "UPDATE pessoa SET nome = :nome, `user` = :user, email = :email WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $this->nome,
                ':user' => $this->user,
                ':email' => $this->email,
                ':id' => $this->id,
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function deletar($id) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "DELETE FROM pessoa WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>