<?php

use App\models\entities\Auteurs;
use App\models\repositories\AuteursRepository;
use Dotenv\Dotenv;

require dirname(__DIR__) . "/vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$auteur = new Auteurs();
$auteur->setNom("testNom");
$auteur->setPrenom("testPrenom");
$auteur->setBiographie("testBiographie");

$auteurRepo = new AuteursRepository();

$auteurRepo->deleteById(48);
