# Examen 2023 PROJET WEB

## Installation

### Prérequis
- PHP 
- Composer
- Symfony CLI 

### Instructions
1. Clonez le dépôt : `git clone https://github.com/krauseangelique/annuaireBienEtre`
2. Installez les dépendances : `composer install`
3. Configurez votre environnement dans le fichier .env
`
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
DATABASE_URL="mysql://app:!ChangeMe/annuaireBienEtreV2?serverVersion=10.4.28-MariaDB&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8" 
`
app:!ChangeMe
votre mot de passe et le nom de la base de données



4. Lancez le serveur de développement : `symfony server:start` (pour les projets Symfony) ou utilisez votre serveur web préféré.

### Base de données

N'oubliez pas de créer la base de données :
1. Créez la DB : `php bin/console doctrine:database:create`
2. Créez les tables : `php bin/console doctrine:migrations:migrate`
3. image de la DB : ![image de la DB](relations_entre_tables_bienEtre_angelique.png "base de données bien être")
   