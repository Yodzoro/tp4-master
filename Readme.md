# Examen TP 4

Le stagiaire à qui on a confié la tâche de créer le formulaire de notre page à fait n'importe quoi. Votre boss vous demande de reprendre son code et de le corriger.
Les demandes clients :

## Partie 1 : Le formulaire (11 points)

1. Vous devez reprendre le formulaire afin qu'il utilise le fichier form.php pour le traitement des données.
2. Afin d'aider les futurs utilisateurs de notre site, vous devez faire une vérification des données avant envoie.
3. Vous devez insérer les données récupérées via le formulaire dans la base de données : base.db dans la base comments (Attention : la base a déjà des données à l'intérieur)

## Partie 2 : La requête AJAX (9 points)

1. À l'affichage de la page, faites une demande AJAX au fichier load.php.
2. Dans le fichier load.php faites une requête SQL pour récupérer les 3 premiers commentaires de la table "comments" en utilisant les options OFFSET et LIMIT en SQL.
3. Afficher dans votre fichier index.php les données récupérées sour cette forme :

```html
<main>
    <section>
        <article>
            <p>username récupéré dans la bdd</p>
            <p>comment récupéré dans la bdd</p>
        </article>
    </section>
    
    <footer>
        <button>Plus de commentaire</button>
    </footer>
</main>
```
N.B. le CSS n'est pas nécessaire.

4. Lorsque vous cliquez sur le bouton "Plus de commentaire" vous devez charger les 3 commentaires suivants et les afficher de la même manière que ci-dessus.

**N.B. :**  
- Attention à tout ce qu'on a vu sur ce semestre ! Les bonnes pratiques que je vous ai présentées.
- Attention de respecter les standards HTML : accessibilité, balises cohérentes, éléments obligatoires, etc.
- Attention à ranger proprement votre projet.
- Pour travailler sur le projet, faire un fork du projet (bouton en haut à droite), vous allez sur la version qui se trouve alors dans vos repositories et vous travaillez à partir de cette version.
