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
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table ORDER BY id ASC");
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($table, $id)
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id");
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->execute();
        return $PDOStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function getByColumn($table, $column, $value)
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE $column = :value");
        $PDOStatement->bindParam(':value', $value, PDO::PARAM_STR);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        if (isset($data['id'])) {
            unset($data['id']);
            $columns = implode(", ", array_keys($data));    
            $placeholders = ":" . implode(", :", array_keys($data));
        }

        $nextIdStatement = $this->connexion->query("SELECT MAX(id) + 1 as next_id FROM $table");
        $nextId = $nextIdStatement->fetch(PDO::FETCH_ASSOC)['next_id'] ?? 1;

        $nextId = $nextId ?: 1;

        $columns .= ', id';
        $placeholders .= ', :id';

        $data['id'] = $nextId;

        $request = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $PDOStatement = $this->connexion->prepare($request);

        foreach ($data as $key => $value) {
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $PDOStatement->bindValue(':' . $key, $value, $paramType);
        }

        $PDOStatement->execute();
    }



    public function updateById($table, $id, $itemData)
    {
        $columnsToUpdate = array_keys($itemData);
        $columnsToUpdateString = implode(', ', array_map(function ($column) {
            return $column . ' = :' . $column;
        }, $columnsToUpdate));

        $request = "UPDATE $table SET $columnsToUpdateString WHERE id = :id";

        $PDOStatement = $this->connexion->prepare($request);

        $PDOStatement->bindValue(':id', $id, PDO::PARAM_INT);

        foreach ($itemData as $key => $value) {
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $PDOStatement->bindValue(':' . $key, $value, $paramType);
        }

        $PDOStatement->execute();
    }


    public function deleteById($table, $id)
    {
        try {
            $PDOStatement = $this->connexion->prepare("DELETE FROM $table WHERE id = :id");
            $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
            $PDOStatement->execute();

            return $PDOStatement->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Error deleting item: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->connexion = null;
    }
}
