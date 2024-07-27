<?php
// Connexion à la base de données
require_once('../connexion_db/conn_db.php');

// Vérifiez si l'utilisateur est authentifié
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM candidate WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Candidat non trouvé.";
        exit();
    }
} else {
    echo "ID de candidat manquant.";
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fiche.css">
    <title>Ajouter Notes du Candidat</title>
    <script>
        function addEpreuve() {
            const container = document.getElementById('epreuveContainer');
            const div = document.createElement('div');
            div.className = 'epreuve-note-pair';
            div.innerHTML = `
                <label for="epreuve">Épreuve:</label>
                <select name="epreuve[]">
                    <option value="Mathématiques">Mathématiques</option>
                    <option value="Physique">Physique</option>
                    <option value="Chimie">Chimie</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Anglais">Anglais</option>
                    <option value="ELECTRONIQUE">ELECTRONIQUE</option>
                    <option value="MANAGEMENT">MANAGEMENT</option>
                    <option value="TELECOM">TELECOM</option>
                    <option value="FRANCAIS">FRANCAIS</option>
                    <option value="MERISE">MERISE</option>
                </select>
                <label for="note">Note:</label>
                <input type="number" name="note[]" step="0.01" min="0" max="20" required>
                <button type="button" onclick="removeEpreuve(this)">Supprimer</button>
            `;
            container.appendChild(div);
        }

        function removeEpreuve(button) {
            button.parentElement.remove();
        }
    </script>
</head>
<body>

    <div class="container">
        <h1>AJOUTER LES NOTES DU CANDIDAT</h1>
        <form method="post" action="RECnote.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>" required>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>" required>
            <label for="genre">Genre:</label>
            <select id="genre" name="genre">
                <option value="male" <?php if($row['genre'] == 'male') echo 'selected'; ?>>Homme</option>
                <option value="female" <?php if($row['genre'] == 'female') echo 'selected'; ?>>Femme</option>
            </select>

            <div id="epreuveContainer">
                <div class="epreuve-note-pair">
                    <label for="epreuve">Épreuve:</label>
                    <select name="epreuve[]">
                        <option value="Mathématiques">Mathématiques</option>
                        <option value="Physique">Physique</option>
                        <option value="Chimie">Chimie</option>
                        <option value="Informatique">Informatique</option>
                        <option value="Anglais">Anglais</option>
                        <option value="ELECTRONIQUE">ELECTRONIQUE</option>
                        <option value="MANAGEMENT">MANAGEMENT</option>
                        <option value="TELECOM">TELECOM</option>
                        <option value="FRANCAIS">FRANCAIS</option>
                        <option value="MERISE">MERISE</option>
                    </select>
                    <label for="note">Note:</label>
                    <input type="number" name="note[]" step="0.01" min="0" max="20" required>
                    <button type="button" onclick="removeEpreuve(this)">Supprimer</button>
                </div>
            </div>

            <button type="button" onclick="addEpreuve()">Ajouter une épreuve</button>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>
