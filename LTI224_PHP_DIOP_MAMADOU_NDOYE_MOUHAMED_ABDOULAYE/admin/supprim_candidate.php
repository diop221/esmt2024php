<?php
// Connexion à la base de données
require_once('../connexion_db/conn_db.php'); // Ajuste le chemin selon l'emplacement réel

// Vérifiez si l'utilisateur est authentifié
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM candidate WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("location: liste_candidate.php");
    } else {
        echo "Erreur lors de la suppression du candidat : " . $conn->error;
    }
} else {
    echo "ID de candidat manquant.";
}

$conn->close();
?>
