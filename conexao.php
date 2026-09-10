<?php
    class Conexao{
        private static $instancia = null;
        public static function getConexao () {
            if (self::$instancia === null){
                try{
                    self::$instancia = new PDO ("mysql:host=localhost;dbname=novo;charset=utf8", "daylton", "123456"); 
                    self::$instancia -> setAtribute(PDO::ATTR::ERRMODE, PDO::ERRMODE_EXEPTION);
                }catch(PDOexception $e) {
                    die("Erro na Conexão ao BD: " .$e -> getMessage());
                }
                return self::$instancia;
            }
        }
    }