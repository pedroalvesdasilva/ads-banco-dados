<?php

class Conexao
{
    private static $instancia = null;

    public static function getConexao()
    {
        if (self::$instancia === null) {
            try {
                self::$instancia = new PDO(
                    "mysql:host=localhost;dbname=novo;charset=utf8mb4",
                    "pedro",
                    "123456"
                );

                self::$instancia->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            } catch (PDOException $e) {
                die("Erro na Conexão ao BD: " . $e->getMessage());
            }
        }

        return self::$instancia;
    }
}