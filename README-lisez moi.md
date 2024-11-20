<h1> Rapport sur la réalisation de l'exercice </h1>

Bonjour, voici un "rapport" sur la réalisation de cet exercice et sur la manière de le lancer pour vérifier la qualité de ce que j'ai réalisé.


<h2>I.) La réalisation </h2>

I.a) La mise en place de Docker et du projet Symfony

Je dois admettre que la dernière fois que j'ai créé mon propre conteneur Docker pour travailler sur un projet Symfony remonte à plus de deux ans.

En effet, toutes les fois où j'ai travaillé sur des projets Symfony après mon apprentissage initial, on me fournissait une base Docker complète, voire même des projets déjà entamés.
Repartir de zéro a donc été vraiment intéressant, mais légèrement challengeant.

Il m'a fallu beaucoup de recherches et d'essais pour arriver à une base "fonctionnelle" (environ 6 heures).
Je suis conscient que la base (Docker + le squelette de projet Symfony) de mon projet n'est clairement ni la plus "propre" ni la plus conventionnelle, mais cet exercice m'a permis de m'en rendre compte.
Dans les prochains jours, je vais m'atteler à rafraîchir mes compétences dans ce domaine.

I.b) Base fonctionnelle du projet

Une fois que mon projet Symfony était lancé et qu'il fonctionnait avec ma base de données, il ne m'a fallu que peu de temps (2h30 maximum) pour avoir un PMV (Produit Minimal Viable) correspondant au "Must have" de l'exercice.
Au vu du délai que vous m'aviez accordé, je me suis dit qu'il serait intéressant d'essayer de rajouter quelques fonctionnalités et de mettre un peu d'effort dans la présentation générale de ce projet.

I.c) Les ajouts

J'ai voulu suivre les "nice to have". Je me suis orienté vers les points suivants :

- L’application est jolie et utilise les avatars des salariés (fournis).
- Je peux modifier un "merci" que j’ai créé.
- Je peux supprimer un "merci" que j’ai créé.
- Je peux filtrer la liste pour voir uniquement les mercis qui me concernent.

Cependant, n'arrivant pas à créer une page de connexion fonctionnelle et donc une identification de l'utilisateur, je me suis rabattu sur un fonctionnement généraliste pour la modification, la suppression et la filtration des "mercis".

J'ai également choisi de rajouter une page d'accueil et une page listant les différents utilisateurs disponibles dans cette application, avec la possibilité de modifier leurs noms, mots de passe et liens vers leurs images d'avatar.

Tous ces ajouts m'ont pris plus de temps que je ne l'avais anticipé (environ 5 heures), tandis que les multiples essais pour ajouter et faire fonctionner la page de connexion et l'identification de l'utilisateur sans succès ont fini par consommer ma journée d'hier (plus de 3h30).


<h2> II. La mise en place du projet pour pouvoir le tester </h2> 
 
Pré-requis :

- Être sur un kernel Linux (Mac ou distribution Linux de votre choix).
- Avoir PHP (^7.0.0) installé sur votre machine.
- Avoir le "composer Symfony" installé sur votre machine.
- Avoir le "CLI Symfony" installé sur votre machine.
- Avoir Docker installé sur votre machine.

II.a) La mise en place du projet

Faites un git clone du projet ou récupérez-le sur Dropbox :

    git clone <url-du-projet>

Déplacez-vous dans le dossier SymfonyProject :

    cd SymfonyProject

Donnez-vous les privilèges sudo pour être sûr que tout fonctionne bien :

    sudo su

(Puis tapez votre mot de passe).
Exécutez le script launch-all :

    ./launch-all.sh

Attendez que le terminal affiche "Setup complete".
    
Ouvrez votre navigateur Internet et tapez localhost:8000.

Naviguez comme vous le souhaitez.

<h3>Si vous souhaitez voir la base de données et la modifier directement : </h3>

Tapez dans votre navigateur : localhost:8081.

    Connectez-vous :
        Login : root
        Password : root
        
Cliquez sur la base de données dans le coin en haut à gauche ("symfony").

Inspectez et modifiez ce que vous souhaitez.
