# SITE QUIZZ PHP

Projet réalisé dans le cadre du module Développement Web de BUT2

## Membres du groupe

- Baptiste Chédeville
- Kylian Riberou

## Attendus

Mettre en place un outils de quiz
En utilisant :

- un projet en OO (Classes, héritage, autoloading, ...)
- Organiser / nommage
- Un controleur frontal


## Réalisation

Nous avions fais une première version où nous sommes partis trop loin sans respecter les consignes.
- Pas de controleur frontal
- Mauvaise organisation des fichiers

Suite a votre retour lors du cours de vendredi et à la réexplication des consignes, nous avons décidé de faire une version (v2) plus simple et qui resepcte les consignes.


## Version 2

Dans le repertoire `v2` vous trouverez la version 2 du projet qui respecte les consignes.

Cette version utilise un controleur frontal qui gère les routes et les actions à effectuer.
Une meilleur organisation des fichiers a été mise en place.
Et nous pouvons jongler sur d'où viennent les questions (fichier JSON ou base de données).

Pour lancer le projet, il faut lancer la commande `php -S localhost:8000` et se rendre sur l'adresse `localhost:8000` dans votre navigateur.

Si vous souhaité utiliser le fichier JSON, il faut commenter la ligne 14 du fichier `index.php`.
Pour utiliser la base de données, il faut décommenter la ligne 14 du fichier `index.php` et créer une base de données `quizz` avec le script de création dans les fichiers create.sql et insert.sql `v2/Data/sql/`.
Et modifier les informations de connexion à la base de données dans le fichier `v2/index.php` ligne 14.


## Version 1

Dans le repertoire `v1` vous trouverez la version 1 du projet qui est plus complexe et qui ne respecte pas les consignes.


