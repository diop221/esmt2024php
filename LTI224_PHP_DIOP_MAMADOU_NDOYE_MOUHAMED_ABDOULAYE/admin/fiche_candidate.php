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
    <title>Modifier Candidat</title>
    
</head>
<body>

    <div class="container">
        <h1>Modifier le Candidat</h1>
        <form method="post" action="modif_candidate.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>" required>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            <label for="genre">Genre:</label>
            <select id="genre" name="genre">
                <option value="male" <?php if($row['genre'] == 'male') echo 'selected'; ?>>Homme</option>
                <option value="female" <?php if($row['genre'] == 'female') echo 'selected'; ?>>Femme</option>
            </select>
            <label for="nationalite">Nationalité:</label>
            <input type="text" id="nationalite" name="nationalite" value="<?php echo htmlspecialchars($row['nationalite']); ?>" required>
            <label for="region">Région:</label>
            <input type="text" id="region" name="region" value="<?php echo htmlspecialchars($row['region']); ?>" required>
            <label for="filiere">Filière:</label>
            <input type="text" id="filiere" name="filiere" value="<?php echo htmlspecialchars($row['filiere']); ?>" required>
            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($row['telephone']); ?>" required>
            <label for="dernier_etablissement">Dernier Établissement:</label>
            <input type="text" id="dernier_etablissement" name="dernier_etablissement" value="<?php echo htmlspecialchars($row['dernier_etablissement']); ?>" required>
            <label for="dernier_diplome">Dernier Diplôme:</label>
            <input type="text" id="dernier_diplome" name="dernier_diplome" value="<?php echo htmlspecialchars($row['dernier_diplome']); ?>" required>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>
