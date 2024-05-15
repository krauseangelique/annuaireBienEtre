# Examen 2024 PROJET WEB

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
votre mot de passe et le nom de votre base de données



1. Lancez le serveur de développement avec la commande : `symfony server:start` 

### Base de données

N'oubliez pas de créer la base de données :
1. Créez la DB : `php bin/console doctrine:database:create`
2. Créez les tables : `php bin/console doctrine:migrations:migrate`
3. image de la DB : ![image de la DB](relations_entre_tables_bienEtre_angelique.png "base de données bien être")
4. logos des Prestataires pexels et images du slider gérées par l'admin : ![images dans la DB](image_tableImage_logos_prestataire_slider_admin.png "base de données bien être")
   