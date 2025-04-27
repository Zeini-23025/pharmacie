
# Pharmacie Project

Bienvenue dans le projet **Pharmacie** ! Ce projet est une application web de gestion de pharmacie. Il permet de gérer les utilisateurs, les médicaments, les employés et l'historique des ventes. Ce fichier vous guidera dans le processus de téléchargement et d'installation.

## Téléchargement

### 1. Téléchargement du projet

Pour télécharger le projet **Pharmacie**, vous pouvez suivre les étapes suivantes :

#### Cloner via Git
Si vous avez **Git** installé, vous pouvez cloner ce projet en utilisant la commande suivante dans votre terminal ou invite de commande :

```bash
git clone https://votre-url-de-depot.git
```

#### Télécharger en ZIP
Vous pouvez aussi télécharger le projet en format **ZIP** :
- Allez sur la page du dépôt GitHub du projet.
- Cliquez sur **Code** et choisissez **Download ZIP**.
- Une fois le fichier ZIP téléchargé, décompressez-le dans le répertoire de votre choix.

### 2. Téléchargement du fichier spécifique

Si vous souhaitez télécharger un fichier spécifique (par exemple, un fichier **SQL** pour la base de données ou un autre fichier), cliquez sur le lien ci-dessous pour le télécharger :

[**Télécharger le fichier ZIP de la base de données**](#)  *(Remplacez ce lien avec le lien réel pour le fichier SQL)*

#### Instructions pour le fichier SQL
1. **Téléchargez le fichier SQL** contenant la structure de la base de données.
2. **Importez ce fichier** dans votre gestionnaire de base de données pour créer les tables nécessaires.
3. **Assurez-vous** que la connexion à la base de données dans le fichier `db.php` est correctement configurée.

## Installation

### Prérequis

Avant de démarrer l'application, assurez-vous que vous avez installé les éléments suivants sur votre machine :

- **PHP 7.x** ou version supérieure.
- **MySQL** ou **MariaDB**.
- Un serveur local comme **XAMPP**, **MAMP**, ou **WAMP**.

### Étapes d'installation

1. **Extraire les fichiers** : Si vous avez téléchargé un fichier ZIP, extrayez-le dans le répertoire de votre choix.
2. **Configurer la base de données** :
   - Ouvrez **phpMyAdmin** ou tout autre outil de gestion de base de données.
   - Créez une nouvelle base de données.
   - Importez le fichier SQL pour créer les tables dans la base de données.
3. **Configurer la connexion à la base de données** :
   - Modifiez les paramètres de connexion à la base de données dans le fichier `db.php`.

### Démarrage du serveur local

Si vous utilisez **XAMPP**, ouvrez le panneau de contrôle et démarrez **Apache** et **MySQL**. Ensuite, ouvrez votre navigateur et accédez à `http://localhost/nom_du_dossier` pour accéder à l'application.

## Technologies utilisées

- **PHP** : Langage de programmation pour le backend.
- **MySQL** : Base de données.
- **Bootstrap** : Framework CSS pour un design responsive.
- **MD5** : Cryptage des mots de passe des utilisateurs.

## Auteurs

- **Nom de l'auteur** : Votre nom ou équipe de développement.
