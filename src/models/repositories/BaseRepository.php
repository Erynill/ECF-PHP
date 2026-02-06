<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\core\Database;
use PDO;

abstract class BaseRepository
{
  protected PDO $db;

  public function __construct()
  {
    $this->db = Database::getInstance()->getConnexion();
  }

  protected function createBase(string $table, object $data): bool
  {
    $arrayObject = $data->getProps();
    $arrayObject = array_filter($arrayObject, fn($value) => !is_null($value) && $value !== "");
    $column = implode(", ", array_keys($arrayObject));
    $query = "INSERT INTO $table ($column) VALUES (";
    foreach ($arrayObject as $key => $value) {
      $query .= ":$key";
      if (array_key_last($arrayObject) !== $key) {
        $query .= ", ";
      }
    }
    $query .= ")";

    $stmt = $this->db->prepare($query);
    foreach ($arrayObject as $key => $value) {
      $stmt->bindValue($key, $value);
    }
    return $stmt->execute();
  }

  protected function getAllBase(string $table, string $class): array
  {
    $query = "SELECT * FROM $table";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    var_dump(ucfirst($table));
    return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
  }

  protected function getByIdBase(string $table, string $class, int $id): ?object
  {
    $query = "SELECT * FROM $table WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $param = [":id" => $id];
    $stmt->execute($param);

    return $stmt->fetchObject($class);
  }

  protected function updateByIdBase(string $table, object $data): bool
  {
    $query = "UPDATE $table SET ";
    $arrayObject = $data->getProps();
    $arrayObject = array_filter($arrayObject, fn($value) => !is_null($value) && $value !== "");
    foreach ($arrayObject as $key => $value) {
      $query .= "$key = :$key";
      if (array_key_last($arrayObject) !== $key) {
        $query .= ", ";
      }
    }
    $query .= " WHERE id = :id";

    $stmt = $this->db->prepare($query);

    foreach ($arrayObject as $key => $value) {
      $stmt->bindValue($key, $value);
    }
    $stmt->bindValue("id", $arrayObject["id"]);

    return $stmt->execute();
  }

  protected function deleteByIdBase(string $table, int $id): bool
  {
    $query = "DELETE FROM $table WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $param = [":id" => $id];

    return $stmt->execute($param);
  }
}
