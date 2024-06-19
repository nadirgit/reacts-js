### 1. **Page de connexion (Login Page)**
- **Objectif :** Permettre aux administrateurs de se connecter à leur compte pour gérer le blog.
- **Fonctionnalités :**
  - Champ pour l’adresse email.
  - Champ pour le mot de passe.
  - Bouton de connexion.
  - Lien pour la récupération du mot de passe.

### 2. **Page de Tableau de Bord (Dashboard)**
- **Objectif :** Fournir une vue d'ensemble des statistiques clés du blog.
- **Fonctionnalités :**
  - Blocs ou widgets affichant des statistiques telles que le nombre total de posts, de commentaires, de vues, et d'utilisateurs actifs.
  - Utilisation de graphiques ou de compteurs pour une représentation visuelle des données.
  - Les données doivent être mises à jour en temps réel ou via des rafraîchissements périodiques.

### 3. **Page de Gestion des Posts (Posts Management Page)**
- **Objectif :** Permettre l'administration des articles publiés sur le blog.
- **Fonctionnalités :**
  - **Tableau des Posts :** 
    - Colonnes : Catégorie, Titre, Auteur, Statut (publié, brouillon, etc.), Date de création, Date de publication.
    - Actions disponibles par post : Afficher, Éditer, Supprimer.
  - **Bouton Ajouter Nouveau Post :** Redirection vers la page de création de post.
  - **Input de Recherche :** Permet de filtrer les posts par mots-clés.
  - **Combo pour la Pagination :** Sélectionner le nombre de posts à afficher par page (ex. 10, 20, 50).
  - **Pagination :** Naviguer entre les différentes pages de posts.
  - **Formatage des Dates :** Utiliser la classe Carbon pour formater les dates affichées.

### 4. **Page Ajouter/Éditer un Post (Add/Edit Post Page)**
- **Objectif :** Interface pour créer ou éditer un post.
- **Fonctionnalités :**
  - Champs à remplir pour la création ou la modification d'un post :
    - Titre du post.
    - Extrait du contenu.
    - Contenu complet.
    - Choix de la catégorie via un menu déroulant.
    - Sélection de tags.
    - Date et heure de publication (utilisation de sélecteurs de date et heure).
    - Option pour sauvegarder en tant que brouillon ou publier directement.
  - **Boutons en bas de page :**
    - **Créer :** Sauvegarde le post et redirige vers la page de gestion des posts.
    - **Créer et Créer un Autre :** Sauvegarde le post et réinitialise le formulaire pour un nouveau post.
    - **Annuler :** Annule la création/édition et retourne à la page précédente.
