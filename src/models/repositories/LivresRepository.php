<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Livres;

class LivreRepository extends BaseRepository
{
  public function create(Livres $data): bool
  {
    return $this->createBase("livres", $data);
  }

  public function getAll(): array
  {
    return $this->getAllBase("livres", Livres::class);
  }

  public function getById(int $id): ?Livres
  {
    return $this->getByIdBase("livres", Livres::class, $id);
  }

  public function updateById(Livres $data): bool
  {
    return $this->updateByIdBase("livres", $data);
  }

  public function deleteById(int $id): bool
  {
    return $this->deleteByIdBase("livres", $id);
  }
}
