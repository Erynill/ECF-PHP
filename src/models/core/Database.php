<?php
declare (strict_types = 1);

namespace App\models\core;

use PDO;
use PDOException;

//Classe singleton pour accéder à la db
class Database
{
  private static ?Database $instance = null;
  private PDO $db;

  private function __construct()
  {
    try {
      $this->db = new PDO($_ENV["DB_TYPE"] . "host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASS"]);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new Database();
    }

    return self::$instance;
  }

  public function getConnexion()
  {
    return $this->db;
  }
}
