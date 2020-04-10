# Euskaltek

Un CRM crée avec le Framework Symfony



### Pré-requis

Ce qu'il est requis pour commencer :

- Avoir Composer d'installer

### Installation

Pour lancer l'installation : 


 Executez la commande ``composer install``

Puis dans le fichier .ENV éditez la ligne 32 et modifiez votre nom d'utilisateur:mot de passe puis mettez le nom que vous voulez pour votre base de données 

Ensuite : 

Executez la commande ``php bin/console doctrine:database:create``

Super votre base de donnée est crée !!! 

Pour finir avec la base de donnée il faudra executer la commande suivante pour avoir les tables : 

`` php bin/console doctrine:migrations:migrate ``

Super les tables ont été crées !!!

## Démarrage

Pour lancer le serveur : `` symfony serve ``

## Fabriqué avec

* [Visual studio code ](https://atom.io/) - Editeur de textes
* [Boostrap.css](https://getbootstrap.com/) - Framework CSS


## Auteurs

* **Aramendi Dorian ** _alias_ [@dorian-64](https://github.com/dorian-64)