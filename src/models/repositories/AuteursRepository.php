<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Auteurs;

class AuteursRepository extends BaseRepository
{
  public function create(Auteurs $data): bool
  {
    return $this->createBase("auteurs", $data);
  }

  public function getAll(?int $page = null, ?int $nbrArticle = null): array
  {
    return $this->getAllBase("auteurs", Auteurs::class, $page, $nbrArticle);
  }

  public function getById(int $id): ?Auteurs
  {
    return $this->getByIdBase("auteurs", Auteurs::class, $id);
  }

  public function updateById(Auteurs $data): bool
  {
    return $this->updateByIdBase("auteurs", $data);
  }

  public function deleteById(int $id): bool
  {
    return $this->deleteByIdBase("auteurs", $id);
  }

  public function getCount(): array
  {
    return $this->getCountBase("auteurs");
  }
}
