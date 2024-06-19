# Les seeders

Dans Laravel, les "seeders" sont des classes qui permettent de remplir la base de données avec des données de test ou initiales. Ils sont très utiles lors du développement d'une application pour tester les fonctionnalités avec des données réalistes sans avoir à les saisir manuellement.

### 1. Utilisation des seeders

Par exemple, si vous avez un modèle `User`, vous pouvez créer une factory pour ce modèle. Ensuite, dans votre seeder, vous pouvez utiliser cette factory pour créer plusieurs utilisateurs :

### Création d'un Seeder

Pour créer un seeder, Laravel utilise une commande Artisan :

```bash
php artisan make:seeder UserSeeder
```

Cette commande crée un seeder. Par défaut, Laravel place les seeders dans le dossier `database/seeders`.


```php
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(50)->create();
    }
}
```

Dans cet exemple, `User::factory()->count(50)->create()` crée 50 utilisateurs avec des données générées aléatoirement selon les spécifications définies dans la UserFactory.

### 2. Appels de seeders additionnels

Vous pouvez organiser vos seeders en appelant d'autres seeders depuis un seeder principal. Cela est utile pour maintenir la structure et l'organisation du code, surtout quand il y a beaucoup de tables et de données à générer.

Par exemple, si vous avez plusieurs seeders pour différentes tables, vous pouvez les appeler tous depuis le `DatabaseSeeder`, qui est le seeder principal :

```php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        // Ajoutez d'autres seeders ici
    }
}
```

### 3. Désactivation d’événements de modèles

Laravel permet de définir des événements liés aux modèles, comme `creating`, `created`, `updating`, `updated`, etc. Ces événements peuvent être utiles pour exécuter certaines actions automatiquement lors de modifications dans la base de données. Cependant, lors du seeding, il peut être nécessaire de désactiver ces événements pour éviter des comportements inattendus ou pour améliorer les performances.

Pour désactiver les événements pendant le seeding, vous pouvez utiliser la méthode `Model::withoutEvents` :

```php
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::withoutEvents(function () {
            User::factory()->count(50)->create();
        });
    }
}
```

Dans cet exemple, les événements du modèle `User` ne seront pas déclenchés lors de la création des utilisateurs par la factory.

En résumé, les seeders dans Laravel sont un outil puissant pour gérer les données de test ou initiales, et ils offrent une flexibilité importante grâce à l'utilisation de factories, la possibilité d'appeler d'autres seeders, et la capacité de désactiver les événements de modèles pour contrôler le comportement de l'application lors du remplissage de la base de données.
