<?php
session_start();
include('../connexion_db/conn_db.php'); // Assurez-vous que le chemin est correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sécuriser l'entrée de l'utilisateur
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $mdp = sha1(mysqli_real_escape_string($conn, $_POST['mdp']));
    
    // Requête SQL pour vérifier les identifiants
    $sql = "SELECT * FROM admin WHERE login = '$login' AND mdp = '$mdp'";
    $result = $conn->query($sql);
    
    // Vérifier si la requête a réussi et si l'utilisateur existe
    if ($result && $result->num_rows == 1) {
        $_SESSION['login_user'] = $login; // Utiliser un nom de clé plus significatif
        header("Location: liste_candidate.php");
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/indexadmin.css">
    <title>Administration</title>
</head>
<body>
    <div class="container">
        <h1>Administration</h1>
        <form action="index.php" method="post">
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required><br>
            
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required><br>
            
            <input type="submit" value="Se connecter">
            
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
