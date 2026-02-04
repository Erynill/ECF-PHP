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

  abstract public function create(object $data): bool;

  abstract public function getAll(): array;

  abstract public function getById(int $id): ?object;

  abstract public function updateById(object $data): bool;

  abstract public function deleteById(int $id): bool;
}
