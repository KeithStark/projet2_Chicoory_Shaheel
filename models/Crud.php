<?php

class Crud
{
    public $connexion;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $host = "localhost";
        $db = "ecom2_project";
        $user = "root";
        $password = "";

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $this->connexion = new PDO($dsn, $user, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getAll($table)
    {
        $PDOStatement = $this->connexion->query("SELECT * FROM $table ORDER BY id ASC");
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($table, $id)
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id");
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByColumn($table, $column, $value)
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE $column = :value");
        $PDOStatement->bindParam(':value', $value, PDO::PARAM_STR);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($request, $itemData)
    {
        try {
            $PDOStatement = $this->connexion->prepare($request);

            foreach ($itemData as $key => $value) {
                $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $PDOStatement->bindValue(':' . $key, $value, $paramType);
            }

            $PDOStatement->execute();

            return $PDOStatement->rowCount() > 0 ? $this->connexion->lastInsertId() : null;
        } catch (PDOException $e) {
            throw new Exception("Error adding item: " . $e->getMessage());
        }
    }


    public function updateById($request, $itemData)
    {
        $PDOStatement = $this->connexion->prepare($request);

        foreach ($itemData as $key => $value) {
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $PDOStatement->bindValue(':' . $key, $value, $paramType);
        }

        $PDOStatement->execute();
    }

    public function deleteById($table, $id)
    {
        try {
            $item = $this->getById($table, $id);

            if ($item) {
                $PDOStatement = $this->connexion->prepare("DELETE FROM $table WHERE id = :id");
                $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
                $PDOStatement->execute();
                return $PDOStatement->rowCount() > 0;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Error deleting item: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->connexion = null;
    }
}
