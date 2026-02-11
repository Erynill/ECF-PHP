<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Users;

class UsersRepository extends BaseRepository
{
  public function create(Users $data): bool
  {
    return $this->createBase("users", $data);
  }

  public function getAll(?int $page = null, ?int $nbrArticle = null): array
  {
    return $this->getAllBase("users", Users::class, $page, $nbrArticle);
  }

  public function getById(int $id): ?Users
  {
    return $this->getByIdBase("users", Users::class, $id);
  }

  public function updateById(Users $data): bool
  {
    return $this->updateByIdBase("users", $data);
  }

  public function deleteById(int $id): bool
  {
    return $this->deleteByIdBase("users", $id);
  }

  public function getCount(): array
  {
    return $this->getCountBase("users");
  }

  public function getByUsername(string $username): Users | bool
  {
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue("username", $username);
    $stmt->execute();

    return $stmt->fetchObject(Users::class);
  }
}
