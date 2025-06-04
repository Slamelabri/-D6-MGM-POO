<?php
class TacheVue {
    public function afficherTaches($taches) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Taches</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
            max-width: 900px;
            margin: auto;
            padding: 40px 20px;
        }
        h1, h2 {
            text-align: center;
            color: #fff;
        }
        form {
            background-color: #2a2a2a;
            padding: 20px;
            border-radius: 12px;
            margin: 30px auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        textarea {
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            background-color: #1c1c1c;
            border: 1px solid #444;
            border-radius: 6px;
            color: #e0e0e0;
            display: block;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
            max-height: 400px;
        }
        input[type="submit"],
        button {
            background-color: #444;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            margin-top: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover,
        button:hover {
            background-color: #666;
        }
        .task-list {
            list-style: none;
            padding: 0;
        }
        .task-item {
            background-color: #2a2a2a;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .task-text {
            flex: 1;
        }
        .task-buttons {
            display: flex;
            gap: 10px;
        }
        .delete-btn {
            background-color: transparent;
            border: 1px solid #c62828;
            color: #c62828;
        }
        .delete-btn:hover {
            background-color: #e53935;
            color: #fff;
        }
        
        .task-buttons button {
            align-self: center;
        }
        /* Modal */
        .modal {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0,0,0,0.8);
            display: none;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #2a2a2a;
            padding: 30px;
            border-radius: 12px;
            max-width: 500px;
            width: 90%;
        }
    </style>
</head>
<body>
    <h1>🗒️ Gestion des Taches</h1>

    <form method="post">
        <input type="hidden" name="action" value="ajouter">
        <label>Nom de la tache :</label>
        <input type="text" name="nom" required>
        <label>Description :</label>
        <textarea name="description"></textarea>
        <input type="submit" value="➕ Ajouter Tache">
    </form>

    <h2>📋 Liste des Taches</h2>
    <ul class="task-list">
        <?php foreach ($taches as $id => $tache): ?>
            <li class="task-item">
                <div class="task-text">
                    <strong><?php echo htmlspecialchars($tache['nom']); ?></strong><br>
                    <em><?php echo nl2br(htmlspecialchars($tache['description'])); ?></em>
                </div>
                <div class="task-buttons">
                    <form method="post">
                        <input type="hidden" name="action" value="supprimer">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button class="delete-btn" type="submit">🗑 Supprimer</button>
                    </form>
                    <button onclick="editBtn(<?php echo $id; ?>, '<?php echo htmlspecialchars(addslashes($tache['nom'])); ?>', '<?php echo htmlspecialchars(addslashes($tache['description'])); ?>')">✏ Modifier</button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>


    <div id="modal-edit" class="modal">
        <div class="modal-content">
            <h2>✏️ Modifier Tache</h2>
            <form method="post">
                <input type="hidden" name="action" value="modifier">
                <input type="hidden" name="id" id="edit-id">
                <label>Nom de la tache :</label>
                <input type="text" name="nom" id="edit-nom" required>
                <label>Description :</label>
                <textarea name="description" id="edit-description"></textarea>
                <input type="submit" value="💾 Sauvegarder">
                <button type="button" onclick="fermerEdition()">Annuler</button>
            </form>
        </div>
    </div>

  
</body>
</html>
<?php
    }
}
?>
