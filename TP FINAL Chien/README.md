# -D6-MGM-POO
Z08 - Programmation Orientée Objet en PHP
TP Chiens

src/Model/ : Classes (Chien, ChienDeChasse, Chenil)
src/Interface/ : Interface (Animal)
src/Exception/ : Exception (ChienNonTrouveException)
src/Controller/ : Contrôleur (ChienController)
src/Service/ : Services (GestionSession, RechercheChiens)
src/View/ : Vues (VueListeChiens, VueChien)
public/ : Point d'entrée (index.php), style.css

Fonctionnalités

Gestion CRUD des chiens
Polymorphisme via l'interface Animal
Recherche par nom
Stockage en session
Mise en forme CSS

Installation

Allee dans le répértoire TP FINAL Chien 
-> 
$ cd TP\ FINAL\ Chien/


Lancer le serveur php une fois dans le dossier du TP, par exemple 
->
 php -S localhost:8000 -t public

SOLID

Single Responsibility : Classes séparées pour session, recherche, et CRUD.
Open/Closed : Extensible via nouvelles implémentations de Animal.
Liskov Substitution : ChienDeChasse remplace Chien.
Interface Segregation : Animal minimaliste.
Dependency Inversion : Dépendances injectées.

