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

  public function getAll(): array
  {
    return $this->getAllBase("users", Users::class);
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
}
