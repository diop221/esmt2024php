<?php
// Connexion à la base de données
require_once('connexion_db/conn_db.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listec.css">

    <?php include 'navigation.php'; ?>
    <title>Liste des Candidats</title>
    
</head>
<body>
    <div class="container">
        <h1>Liste des Candidats</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Nationalité</th>
                    <th>Région</th>
                    <th>Filière</th>
                    <th>Der Diplôme</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Requête SQL pour obtenir les données des candidats
                $sql = "SELECT * FROM candidate ORDER BY id ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["prenom"]) . "</td>
                                <td>" . htmlspecialchars($row["nom"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) . "</td>
                                <td>" . htmlspecialchars($row["genre"]) . "</td>
                                <td>" . htmlspecialchars($row["nationalite"]) . "</td>
                                <td>" . htmlspecialchars($row["region"]) . "</td>
                                <td>" . htmlspecialchars($row["filiere"]) . "</td>
                                <td>" . htmlspecialchars($row["dernier_diplome"]) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Aucun candidat trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="js/index.js"></script>

</body>
</html>
<?php

