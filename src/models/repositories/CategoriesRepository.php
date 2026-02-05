<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Categories;

class CategoriesRepository extends BaseRepository
{
  public function create(Categories $data): bool
  {
    return $this->createBase("categories", $data);
  }

  public function getAll(): array
  {
    return $this->getAllBase("categories", Categories::class);
  }

  public function getById($id): ?Categories
  {
    return $this->getByIdBase("categories", Categories::class, $id);
  }

  public function updateById(Categories $data): bool
  {
    return $this->updateByIdBase("categories", $data);
  }

  public function deleteById(int $id): bool
  {
    return $this->deleteByIdBase("categories", $id);
  }
}
