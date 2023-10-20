<?php

class ConexaoBD {

    private static $host = "localhost:3306";
    private static $dbname = "bdICT";
    private static $user = "root";
    private static $password = "B@dF0x16";

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