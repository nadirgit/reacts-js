Dans Laravel, l'interrogation des bases de données peut être effectuée de deux manières principales : en utilisant l'ORM Eloquent pour une approche orientée objet ou le Query Builder pour une approche plus directe et flexible. 

Des exemples pour les deux méthodes, pour diverses requêtes courantes dans une application de blog comportant des tables comme `users`, `profiles`, `roles`, `categories`, `posts`, `comments`, `tags`, et une table de liaison `post_tag` pour la relation many-to-many entre `posts` et `tags`.

### Exemples de requêtes SQL

- **1. Sélectionner tous les utilisateurs avec leurs profils**
- **2. Trouver un utilisateur et ses rôles**
- **3. Récupérer tous les posts d'une certaine catégorie**
- **4. Récupérer tous les commentaires pour un post spécifique avec leur auteur**
- **5. Lister tous les tags d'un post donné**
- **6. Compter le nombre de posts pour chaque catégorie**
- **7. Trouver les posts avec plus de 5 commentaires**
- **8. Afficher tous les utilisateurs et leur dernier post**
- **9. Liste des tags associés à au moins trois posts différents**
- **10. Récupérer tous les utilisateurs qui n'ont pas encore de profil**
- **11. Récupérer tous les posts qui contiennent tous les tags spécifiés**
- **12. Récupérer les utilisateurs avec le nombre total de commentaires sur leurs posts**
- **13. Requête conditionnelle en fonction de l'entrée utilisateur**
- **14. Trouver des utilisateurs avec leurs rôles spécifiques**
- **15. Afficher des posts avec la date de leur dernier commentaire**
- **16. Récupérer les posts sans tags**
- **17. Requêtes avec des filtres dynamiques**
- **18. Afficher les utilisateurs et le nombre total de leurs posts et commentaires**
- **19. Récupérer les catégories avec le dernier post dans chaque catégorie**
- **20. Récupérer tous les posts qui n'ont pas encore été commentés**
- **21. Liste des posts avec leurs auteurs, catégories, et le nombre de commentaires**

















----------------------------------------------

**1. Sélectionner tous les utilisateurs avec leurs profils**

SQL pur :
```sql
SELECT users.*, profiles.*
FROM users
JOIN profiles ON profiles.user_id = users.id;
```

Avec Eloquent :
```php
$users = User::with('profile')->get();
```

Avec Query Builder :
```php
$users = DB::table('users')
           ->join('profiles', 'profiles.user_id', '=', 'users.id')
           ->select('users.*', 'profiles.*')
           ->get();
```

**2. Trouver un utilisateur et ses rôles**

Supposons que les utilisateurs peuvent avoir plusieurs rôles et que vous utilisez une table de liaison `role_user`.

SQL pur :
```sql
SELECT users.*, roles.*
FROM users
JOIN role_user ON role_user.user_id = users.id
JOIN roles ON roles.id = role_user.role_id
WHERE users.id = 1;
```

Avec Eloquent :
```php
$user = User::with('roles')->find(1);
```

Avec Query Builder :
```php
$user = DB::table('users')
           ->join('role_user', 'role_user.user_id', '=', 'users.id')
           ->join('roles', 'roles.id', '=', 'role_user.role_id')
           ->where('users.id', 1)
           ->select('users.*', 'roles.*')
           ->get();
```

**3. Récupérer tous les posts d'une certaine catégorie**

SQL pur :
```sql
SELECT posts.*
FROM posts
JOIN categories ON categories.id = posts.category_id
WHERE categories.name = 'Technology';
```

Avec Eloquent :
```php
$posts = Post::whereHas('category', function ($query) {
    $query->where('name', 'Technology');
})->get();
```

Avec Query Builder :
```php
$posts = DB::table('posts')
           ->join('categories', 'categories.id', '=', 'posts.category_id')
           ->where('categories.name', 'Technology')
           ->select('posts.*')
           ->get();
```

**4. Récupérer tous les commentaires pour un post spécifique avec leur auteur**

SQL pur :
```sql
SELECT comments.*, users.name as user_name
FROM comments
JOIN users ON users.id = comments.user_id
WHERE comments.post_id = 10;
```

Avec Eloquent :
```php
$comments = Comment::with('user')->where('post_id', 10)->get();
```

Avec Query Builder :
```php
$comments = DB::table('comments')
              ->join('users', 'users.id', '=', 'comments.user_id')
              ->where('comments.post_id', 10)
              ->select('comments.*', 'users.name as user_name')
              ->get();
```

**5. Lister tous les tags d'un post donné**

Supposons une relation many-to-many entre `posts` et `tags` via la table `post_tag`.

SQL pur :
```sql
SELECT tags.*
FROM tags
JOIN post_tag ON post_tag.tag_id = tags.id
WHERE post_tag.post_id = 5;
```

Avec Eloquent :
```php
$tags = Post::find(5)->tags;
```

Avec Query Builder :
```php
$tags = DB::table('tags')
          ->join('post_tag', 'post_tag.tag_id', '=', 'tags.id')
          ->where('post_tag.post_id', 5)
          ->select('tags.*')
          ->get();
```

D'autres scénarios d'interrogation plus complexes et intéressants utilisant des tables comme `users`, `profiles`, `roles`, `categories`, `posts`, `comments`, `tags`, et `post_tag`. 


**6. Compter le nombre de posts pour chaque catégorie**

SQL pur :
```sql
SELECT categories.name, COUNT(posts.id) AS post_count
FROM categories
LEFT JOIN posts ON posts.category_id = categories.id
GROUP BY categories.name;
```

Avec Eloquent :
```php
$categories = Category::withCount('posts')->get();
```

Avec Query Builder :
```php
$categoryCounts = DB::table('categories')
    ->leftJoin('posts', 'posts.category_id', '=', 'categories.id')
    ->select('categories.name', DB::raw('COUNT(posts.id) as post_count'))
    ->groupBy('categories.name')
    ->get();
```
