<?php
// Connexion à la base de données 
require_once('./connexion_db/conn_db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/form_inscription.css">
    <title>FORMULAIRE D'INSCRIPTION</title>
</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-up">
        <form method="post" action="ajout_candidate.php">
    <h1>FORMULAIRE </h1>
    
    <input type="text" name="prenom" placeholder="Prenom" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="gender" required>
        <option value="" disabled selected>Genre</option>
        <option value="male">Homme</option>
        <option value="female">Femme</option>
    </select>
    <input type="text" name="nationalite" placeholder="Nationalite" required>
    <input type="number" name="identite" placeholder="pièce d'identité" required>
    <select name="region" required>
        <option value="" disabled selected>Sélectionner une région</option>
                    <option value="dakar1">Dakar1</option>
                    <option value="dakar2">Dakar2</option>
                    <option value="dakar3">Dakar3</option>
                    <option value="THIES">THIES </option>
                    <option value="KOLDA">KOLDA</option>
                    <option value="Diourbel">Diourbel</option>
                    <option value="Fatick">Fatick</option>
                    <option value="Kaffrine">Kaffrine</option>
                    <option value="Kaolack">Kaolack</option>
                    <option value="Kédougou">Kédougou</option>
                    <option value="Louga">Louga</option>
                    <option value="Matam">Matam</option>
                    <option value="Saint-Louis">Saint-Louis</option>
                    <option value="Sédhiou">Sédhiou</option>
                    <option value="Tambacounda">Tambacounda</option>
                    <option value="Ziguinchor">Ziguinchor</option>
    </select>
    <select name="filiere" required>
        <option value="" disabled selected>Sélectionner une filière</option>
        <optgroup label="Licence">
                        <option value="LPTI1">LPTI1</option>
                        <option value="LPTI2">LPTI2</option>
                        <option value="LPTI3">LPTI3</option>
                        <option value="LMEN1">LMEN1</option>
                        <option value="LMEN2">LMEN2</option>
                        <option value="LMEN3">LMEN3</option>
                    </optgroup>
                    <optgroup label="Ingénieur">
                        <option value="INGC1">INGC1</option>
                        <option value="INGC2">INGC2</option>
                        <option value="INGC3">INGC3</option>
                        <option value="ING-ELEC1">ING-ELEC1</option>
                        <option value="ING-ELEC2">ING-ELEC2</option>
                        <option value="ING-ELEC3">ING-ELEC3</option>
                    </optgroup>
                    <optgroup label="Master">
                        <option value="MPSIS1">MPSIS1</option>
                        <option value="MPSSI2">MPSSI2</option>
                        <option value="MMEN1">MMEN1</option>
                        <option value="MMEN 2">MMEN 2</option>
                        <option value="M-ELEC1">M-ELEC1</option>
                        <option value="M-ELEC2">M-ELEC2</option>
                    </optgroup>
    </select>
    <input type="text" name="pays_residence" placeholder="Pays de résidence" required>
    <input type="tel" name="telephone" placeholder="Numéro de téléphone" required>
    <input type="text" name="dernier_etablissement" placeholder="Dernier établissement fréquenté" required>
    <input type="text" name="adresse_complete" placeholder="Adresse complète" required>
    <input type="text" name="dernier_diplome" placeholder="Dernier diplôme obtenu" required>
    <input type="text" name="nom_responsable" placeholder="Nom du responsable financier" required>
    <input type="email" name="email_responsable" placeholder="Email du responsable financier" required>
    <select name="social_media" required>
        <option value="" disabled selected>Comment avez-vous entendu parler de l'ESMT ?</option>
        <option value="facebook">Facebook</option>
        <option value="linkedin">LinkedIn</option>
        <option value="instagram">Instagram</option>
        <!-- Autres options -->
    </select>
    <button type="submit">S'inscrire</button>
</form>

        </div>
        <div class="form-container sign-in">
            
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bonjour, ami !</h1>
                    <p>Entrez vos informations personnelles pour utiliser toutes les fonctionnalités du site</p>

                    <button class="hidden" id="login">RETOURNER</button>

                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenue sur le portail de candidature de l'ESMT</h1>
                    <p>Inscrivez-vous avec vos informations personnelles pour utiliser toutes les fonctionnalités du site</p>
                    <button class="hidden" id="register">CANDIDATER</button>
                </div>
            </div>
        </div>
    </div>
    

    <script src="js/script.js"></script>
</body>

</html>
