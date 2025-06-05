<?php
namespace Chiens\View;

class VueListeChiens {
    public function afficher(array $chiens, string $nomRecherche): void {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Liste des Chiens</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Liste des Chiens</h1>
            <form action="index.php" method="get">
                <input type="text" name="recherche" value="<?= htmlspecialchars($nomRecherche) ?>" placeholder="Rechercher par nom">
                <button type="submit">Rechercher</button>
            </form>
            <a href="index.php?action=creer">Ajouter un chien</a>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Âge</th>
                        <th>Race</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chiens as $chien): ?>
                        <tr>
                            <td><a href="index.php?action=voir&nom=<?= urlencode($chien->getNom()) ?>"><?= htmlspecialchars($chien->getNom()) ?></a></td>
                            <td><?= $chien->getAge() ?> ans</td>
                            <td><?= htmlspecialchars($chien->getRace()) ?></td>
                            <td>
                                <a href="index.php?action=modifier&nom=<?= urlencode($chien->getNom()) ?>">Modifier</a>
                                <a href="index.php?action=supprimer&nom=<?= urlencode($chien->getNom()) ?>" onclick="return confirm('Supprimer ce chien ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </body>
        </html>
        <?php
    }
}
?>