<?php
// Connexion à la base de données
require_once('../connexion_db/conn_db.php');

// Vérifiez si l'utilisateur est authentifié
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $nationalite = mysqli_real_escape_string($conn, $_POST['nationalite']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $filiere = mysqli_real_escape_string($conn, $_POST['filiere']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $dernier_etablissement = mysqli_real_escape_string($conn, $_POST['dernier_etablissement']);
    $dernier_diplome = mysqli_real_escape_string($conn, $_POST['dernier_diplome']);

    $sql = "UPDATE candidate SET prenom='$prenom', nom='$nom', email='$email', genre='$genre', nationalite='$nationalite', region='$region', filiere='$filiere', telephone='$telephone', dernier_etablissement='$dernier_etablissement', dernier_diplome='$dernier_diplome' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: liste_candidate.php");
    } else {
        echo "Erreur lors de la mise à jour du candidat : " . $conn->error;
    }
} else {
    echo "Méthode de requête invalide.";
}

$conn->close();
?>
