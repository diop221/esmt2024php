<link rel="stylesheet" href="css/listec.css">

<?php
// Connexion à la base de données
require_once('./connexion_db/conn_db.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez que les clés existent dans $_POST
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $genre = isset($_POST['gender']) ? $_POST['gender'] : '';
    $nationalite = isset($_POST['nationalite']) ? $_POST['nationalite'] : '';
    $identite = isset($_POST['identite']) ? $_POST['identite'] : '';
    $region = isset($_POST['region']) ? $_POST['region'] : '';
    $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : '';
    $pays_residence = isset($_POST['pays_residence']) ? $_POST['pays_residence'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $dernier_etablissement = isset($_POST['dernier_etablissement']) ? $_POST['dernier_etablissement'] : '';
    $adresse_complete = isset($_POST['adresse_complete']) ? $_POST['adresse_complete'] : '';
    $dernier_diplome = isset($_POST['dernier_diplome']) ? $_POST['dernier_diplome'] : '';
    $nom_responsable = isset($_POST['nom_responsable']) ? $_POST['nom_responsable'] : '';
    $email_responsable = isset($_POST['email_responsable']) ? $_POST['email_responsable'] : '';
    $source = isset($_POST['social_media']) ? $_POST['social_media'] : '';

    // Préparer la requête SQL
    $sql = "INSERT INTO candidate (prenom, nom, email, genre, nationalite, identite, region, filiere, pays_residence, telephone, dernier_etablissement, adresse_complete, dernier_diplome, nom_responsable, email_responsable, source)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Préparer la requête
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("ssssssssssssssss", $prenom, $nom, $email, $genre, $nationalite, $identite, $region, $filiere, $pays_residence, $telephone, $dernier_etablissement, $adresse_complete, $dernier_diplome, $nom_responsable, $email_responsable, $source);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "<div class='success-message'>Les informations ont été ajoutées avec succès.</div>";

        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Erreur de préparation : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
} else {
    echo "Le formulaire n'a pas été soumis correctement.";
}
?>
