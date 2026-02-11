# ECF Bibliothèque
## INSTALLATION

Clone le git puis "composer install" pour installer les librairies PHP

Créer un .env, ajouter les variables suivants et changer leurs valeurs pour correspondre à votre projet : 
- Add ":" after the type
- DB_TYPE="yourdb:"
- Adress + port
- DB_HOST="host:port"
- DB Name
- DB_NAME="dbname"
- Logins to connect in db
- DB_USER="user"
- DB_PASS="pass"

Dans le dossier sql, insérer la requête sql afin de créer la base de données

## EXPLICATION

CRUD complet sur la table "livres" et "auteurs" avec authentifaction, et gestion de rôle.

## LIBRAIRIES

PHP : 
- Autoloader
- Twig
- AltoRouter
- PHPdotenv
- PHPMarkdown
- Paginator

JS :
- SweetAlert
