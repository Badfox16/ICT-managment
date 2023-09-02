<?php

class ConexaoBD {

    private static $host = "localhost";
    private static $dbname = "bdICT";
    private static $user = "root";
    private static $password = "";

    public static function conectar() {
        try {
            $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed " . $e->getMessage());
        }
    }
}
