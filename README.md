# 🥗 Projet Symfony - Dashboard Mongoo

## ⚙️ 1. Prérequis

- 🐘 PHP 8.1 ou supérieur  
- 📦 Composer  
- 🛠️ Symfony CLI (optionnel mais recommandé)  
- 🗂️ SQLite (inclus avec PHP)  
- 🌐 Navigateur web moderne

## 🛠️ 2. Installation du projet

- Cloner le dépôt Git : `git clone <URL>`  
- Aller dans le dossier du projet : `cd b2-rattrapages-raphael-parone/11-Framework-Backend/backend`  
- Installer les dépendances Composer : `composer install`  

## 🗄️ 3. Configuration de la base de données

La base de données utilise SQLite. Par défaut, la configuration est déjà prête dans le fichier `.env` :

DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"


✅ Aucune autre configuration n’est nécessaire.

## 🧱 4. Création de la base de données

- Générer les migrations : `php bin/console make:migration`  
- Appliquer les migrations : `php bin/console doctrine:migrations:migrate`  

## 🚀 5. Lancement du serveur local

- Démarrer le serveur local Symfony : `symfony server:start`  
- Accéder au site à l'adresse suivante :  
  👉 [http://localhost:8000/dashboard](http://localhost:8000/dashboard)

## 📊 6. Fonctionnalités du dashboard

- 👀 Affichage des restaurants et de leurs employés  
- ➕➖✏️ Création / modification / suppression de restaurants  
- ➕➖✏️ Création / modification / suppression d’employés  
- 🔗 Liaison d’un employé à un restaurant  
- 📈 Statistiques visibles sur le dashboard :
  - 🏢 Nombre total de restaurants  
  - ✅ Nombre d’employés actifs  
  - ❌ Nombre d’employés inactifs  
- 🎨 Interface moderne avec Bootstrap  
- ⏱️ Champs `createdAt` et `updatedAt` gérés automatiquement  
- 🚫 Ces champs ne sont pas modifiables via les formulaires  

## 🔗 7. Accès rapide

Le dashboard est disponible ici :  
👉 [http://localhost:8000/dashboard](http://localhost:8000/dashboard)

## 🎥 8. Vidéo

👉 https://www.youtube.com/watch?v=sVnSO-TozQ0
