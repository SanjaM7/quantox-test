<?php

class DB
{
    private static function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quantox";
        $charset = "utf8mb4";

        try {
            $dsn = "mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=" . $charset;
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function queryExists($query, $params = array())
    {
        $pdo = self::connect();
        $query = "SELECT EXISTS ($query) as E";
        $statement = $pdo->prepare($query);
        $statement->execute($params);
        $data = $statement->fetchColumn(0);
        return !!$data;
    }

    public static function querySelect($query, $params = array())
    {
        $pdo = self::connect();
        $statement = $pdo->prepare($query);
        $statement->execute($params);
        $data = $statement->fetchAll();
        return $data;
    }

    public static function queryInsert($query, $params = array())
    {
        $pdo = self::connect();
        $statement = $pdo->prepare($query);
        $statement->execute($params);
        $id = $pdo->lastInsertId();
        return $id;
    }
}
