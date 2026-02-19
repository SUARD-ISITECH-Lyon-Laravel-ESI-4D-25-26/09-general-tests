## Testez vos compétences Laravel — Évaluation générale

Ce dépôt est un exercice pratique : réalisez les tâches listées ci-dessous
et faites passer les tests PHPUnit, qui échouent volontairement pour le moment.

Pour vérifier votre progression, les tests se trouvent dans `tests/Feature/GeneralTest.php`.

Au départ, si vous exécutez `php artisan test`, tous les tests échouent.
Votre objectif est de les faire passer un par un.

> ⚠️ **Vous n'avez pas le droit de modifier les fichiers de tests.**


## Notice importante — Base de données MySQL

**Les tests sont configurés pour s'exécuter sur une base de données MySQL locale
nommée `mysql_testing`.**

**N'oubliez pas de créer cette base de données.**

**Attention : cette base sera vidée fréquemment par les tests via `migrate:fresh`.**


## Installation du projet

```sh
git clone <url-du-depot> projet
cd projet
cp .env.example .env  # Éditez vos variables d'environnement
composer install
php artisan key:generate
npm install && npm run build
```

Puis lancez `php artisan test` pour voir les erreurs à corriger.


## Soumettre votre solution

Créez une Pull Request (ou Merge Request) vers la branche `main`.

---

## Tâche 1. Route avec Single Action Controller

Dans `routes/web.php`, ajoutez une route pointant l'URL `"/"` vers le `HomeController`.
Ce controller est un Single Action Controller (méthode `__invoke`) qui retourne la vue `home`.

Méthode de test : `test_home_screen_returns_home_view_and_shows_homepage()`.

---

## Tâche 2. Validation avec Form Request

Dans `app/Http/Controllers/PostController.php`, la validation est effectuée via la classe
`StorePostRequest`, mais cette classe n'existe pas intentionnellement.
Votre objectif est de la créer dans `app/Http/Requests/StorePostRequest.php`,
avec `authorize()` retournant `true` et des règles de validation exigeant les champs `title` et `body`.

Méthode de test : `test_form_request_validation()`.

---

## Tâche 3. Upload de fichier : suppression de l'ancien fichier lors de la mise à jour

Dans `app/Http/Controllers/PostController.php`, dans la méthode `update()`,
le nouveau fichier est enregistré mais l'ancien n'est pas supprimé.
Ajoutez la suppression de l'ancien fichier du stockage (Storage) avant de le remplacer.

Méthode de test : `test_remove_old_file_when_updating_post()`.

---

## Tâche 4. Eloquent — Relation BelongsToMany avec champs supplémentaires dans le pivot

Dans `app/Models/Team.php`, la relation `users()` ne récupère pas les champs supplémentaires
de la table pivot. Corrigez la définition de la relation pour que la vue `teams/index.blade.php`
puisse afficher les colonnes `position` et `created_at` du pivot.

Méthode de test : `test_teams_with_user()`.

---

## Tâche 5. Eloquent — Mise à jour ou création d'un enregistrement

Dans `app/Http/Controllers/UserController.php`, dans la méthode `check_update()`,
trouvez un utilisateur (User) par son `$name` et mettez à jour son `$email`.
Si aucun utilisateur n'est trouvé, créez-en un avec `$name`, `$email` et un mot de passe aléatoire.

Méthode de test : `test_check_or_update_user()`.

---

## Tâche 6. Migration — Suppression automatique des enregistrements liés (cascade)

Le dossier `database/migrations/task6` contient les migrations pour les tables `categories`
et `products`. Modifiez la migration de la table `products` pour que la suppression
d'une catégorie entraîne la suppression automatique de ses produits (suppression en cascade).

Méthode de test : `test_delete_parent_child_record()`.

---

## Tâche 7. Authentification — Mot de passe avec au moins une lettre

Par défaut, le formulaire d'inscription exige un mot de passe d'au moins 8 caractères.
Ajoutez une règle de validation pour exiger qu'il contienne au moins une lettre
(majuscule ou minuscule). Ainsi, `12345678` est invalide, mais `a12345678` est valide.

Modifiez le fichier `app/Http/Controllers/Auth/RegisteredUserController.php`.

Méthode de test : `test_password_at_least_one_uppercase_lowercase_letter()`.

---

## Tâche 8. Blade — Boucle dans un tableau

Le fichier `resources/views/users/index.blade.php` doit afficher la liste de tous les
utilisateurs dans un tableau, ou une ligne « No content » si aucun utilisateur n'existe
en base de données.

Méthode de test : `test_loop_shows_table()`.

---

## Questions / Problèmes ?

Si vous rencontrez des difficultés ou avez des suggestions, créez une Issue.

Bon courage !
