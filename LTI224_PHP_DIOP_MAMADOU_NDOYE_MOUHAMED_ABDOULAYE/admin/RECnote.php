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
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $nom = $conn->real_escape_string($_POST['nom']);
    $genre = $conn->real_escape_string($_POST['genre']);
    $epreuves = $_POST['epreuve'];
    $notes = $_POST['note'];

    // Mettre à jour les informations du candidat
    $sql_update_candidate = "UPDATE candidate SET prenom='$prenom', nom='$nom', genre='$genre' WHERE id=$id";
    if ($conn->query($sql_update_candidate) === TRUE) {
        for ($i = 0; $i < count($epreuves); $i++) {
            $epreuve = $conn->real_escape_string($epreuves[$i]);
            $note = floatval($notes[$i]);

            // Ajouter ou mettre à jour la note de l'épreuve pour le candidat
            $sql_check_note = "SELECT * FROM notes WHERE candidate_id=$id AND epreuve_name='$epreuve'";
            $result_check_note = $conn->query($sql_check_note);

            if ($result_check_note->num_rows > 0) {
                // Mettre à jour la note si elle existe déjà
                $sql_update_note = "UPDATE notes SET note=$note WHERE candidate_id=$id AND epreuve_name='$epreuve'";
                $conn->query($sql_update_note);
            } else {
                // Insérer une nouvelle note si elle n'existe pas
                $sql_insert_note = "INSERT INTO notes (candidate_id, epreuve_name, note) VALUES ($id, '$epreuve', $note)";
                $conn->query($sql_insert_note);
            }
        }
        header("location: admission.php");
    } else {
        echo "Erreur lors de la mise à jour des informations du candidat: " . $conn->error;
    }
}

$conn->close();
?>
