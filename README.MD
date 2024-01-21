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


L'application intègre 3 types de questions :

- QCM (radio)
- QCM (checkbox)
- Réponse libre (text)

Un score est calculé à la fin du quizz et affiché à l'utilisateur.
Pour les questions de type QCM (checkbox), une pondération est mise en place.

## Version 1

Dans le repertoire `v1` vous trouverez la version 1 du projet qui est plus complexe et qui ne respecte pas les consignes.


Pour lancer le projet, il faut dans un premier temps configurer la base de données en créant une base de données avec le script de création dans les fichiers create.sql et insert.sql `v1/ressources/db/`.

Puis configuré les informations de connexion à la base de données dans le fichier `v1/_inc/properties.json`.

Ensuite il faut lancer la commande `php -S localhost:8000` et se rendre sur l'adresse `localhost:8000` dans votre navigateur.

Dans cette application, vous pouvez retrover les fonctionnalités suivantes :

Gestion des utilisateurs avec un système de connexion et d'inscription.
Les utilisateurs peuvent créer des quizz.
Un utilisateur a accès a ses quizzs, voir les statistiques et peut les supprimer.
Il a accès à l'histoire de ses participations aux différents quizzs. 
