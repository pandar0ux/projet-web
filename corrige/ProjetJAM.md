JAM - Just Another Mémo
=======================

Vous devez développer une application de gestion de mémos.


Mémo
-------

Un **mémo** est constitué de ces éléments :

- un identifiant,
- un propriétaire,
- un titre,
- un contenu textuel,
- un statut indiquant s'il est publique ou non,
- la date de la dernière publication,
- la date de la dernière modification.


Partie publique
---------------

La partie publique doit proposer les 3 vues principales :

- la page principale avec les mémos publiques,
- un formulaire de création de compte,
- un formulaire d'authentification.

Sur chaque vue, un menu doit permettre de naviguer vers les autres vues.

Sur la page principale ne doivent apparaître ques les titres, date de création et propriétaire du mémo. Un clic sur le titre ou un bouton spécifique doit mener à une page permettant de visualiser le contenu de ce mémo et toutes ses informations.


Compte utilisateur
------------------

Un utilisateur authentifié doit pouvoir :

- changer son mot de passe
- supprimer son compte : tous ses mémos sont supprimés
- se déconnecter

mais aussi :

- créer un nouveau mémo
- voir la liste de ses mémos, publiques et privés
- modifier un mémo qu'il a lui-même créé
- rendre publique/privé un mémo

Un mémo privé n'est donc visible que pour son propriétaire s'il est authentifié.


Conseils
--------

- Nous vous recommandons de réaliser ce projet en partant de la base de code obtenue à l'issue du TP n°8 (avec les bonus).
- Fixez-vous des objectifs progressifs : il n'est pas nécessaire que votre application soit entièrement fonctionnelle pendant son développement.
- Ne passez pas trop de temps sur le CSS : gardez à l'esprit que l'aspect esthétique ne sera pas évalué lors du TP noté.


Bonus pour les plus rapides
---------------------------

Ça tient en 5 mots mais cela devrait largement vous occuper : ajoutez la catégorisation des mémos.

Cela signifie qu'un mémo peut appartenir à une ou plusieurs catégories, modifiables à tout instant. Il faudra donc ajouter une vue publique permettant d'afficher les mémos d'une catégorie donnée.
