<?php
namespace Chiens\View;

use Chiens\Model\Chien;

class VueChien {
    public function afficherDetails(Chien $chien): void {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Détails de <?= htmlspecialchars($chien->getNom()) ?></title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Détails de <?= htmlspecialchars($chien->getNom()) ?></h1>
            <p><?= $chien->afficherDetails() ?></p>
            <p>Cri : <?= htmlspecialchars($chien->crier()) ?></p>
            <a href="index.php">Retour à la liste</a>
            <a href="index.php?action=modifier&nom=<?= urlencode($chien->getNom()) ?>">Modifier</a>
        </body>
        </html>
        <?php
    }

    public function afficherFormulaireCreation(): void {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Ajouter un Chien</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Ajouter un Chien</h1>
            <form action="index.php?action=creer" method="post">
                <label>Nom : <input type="text" name="nom" required></label><br>
                <label>Âge : <input type="number" name="age" required min="0"></label><br>
                <label>Race : <input type="text" name="race" required></label><br>
                <label>Couleur : <input type="text" name="couleur" required></label><br>
                <label>Sexe : 
                    <select name="sexe" required>
                        <option value="Mâle">Mâle</option>
                        <option value="Femelle">Femelle</option>
                    </select>
                </label><br>
                <label>Poids (kg) : <input type="number" name="poids" required min="0" step="0.1"></label><br>
                <label>Type : 
                    <select name="type">
                        <option value="Chien">Chien</option>
                        <option value="ChienDeChasse">Chien de chasse</option>
                    </select>
                </label><br>
                <button type="submit">Ajouter</button>
            </form>
            <a href="index.php">Retour à la liste</a>
        </body>
        </html>
        <?php
    }

    public function afficherFormulaireModification(Chien $chien): void {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Modifier <?= htmlspecialchars($chien->getNom()) ?></title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Modifier <?= htmlspecialchars($chien->getNom()) ?></h1>
            <form action="index.php?action=modifier&nom=<?= urlencode($chien->getNom()) ?>" method="post">
                <label>Âge : <input type="number" name="age" value="<?= $chien->getAge() ?>" required min="0"></label><br>
                <label>Race : <input type="text" name="race" value="<?= htmlspecialchars($chien->getRace()) ?>" required></label><br>
                <label>Couleur : <input type="text" name="couleur" value="<?= htmlspecialchars($chien->getCouleur()) ?>" required></label><br>
                <label>Sexe : 
                    <select name="sexe" required>
                        <option value="Mâle" <?= $chien->getSexe() === 'Mâle' ? 'selected' : '' ?>>Mâle</option>
                        <option value="Femelle" <?= $chien->getSexe() === 'Femelle' ? 'selected' : '' ?>>Femelle</option>
                    </select>
                </label><br>
                <label>Poids (kg) : <input type="number" name="poids" value="<?= $chien->getPoids() ?>" required min="0" step="0.1"></label><br>
                <button type="submit">Mettre à jour</button>
            </form>
            <a href="index.php">Retour à la liste</a>
        </body>
        </html>
        <?php
    }
}
?>