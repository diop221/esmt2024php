<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'ACCUEIL</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
<div class="site-wrapper">
    <div class="main-content">
      <!-- Placez ici le contenu principal de votre page -->
      <nav >
    <ul class="sidebar">
      <li><a href="index.php">ACCUEIL</a></li>
      <li><a href="form_inscription.php">inscription</a></li>
      <li><a href="liste_candidate.php">liste Candidats</a></li>
      <li><a href="admin/index.php">Admin</a></li>
    </ul>
    <ul>

      <li> <a href="#">ESMT</a></li>
      <li class="hideOnMobile"><a href="index.php">ACCUEIL</a></li>
      <li class="hideOnMobile"><a href="form_inscription.php">inscription</a></li>
      <li class="hideOnMobile"><a href="liste_candidate.php">liste Candidats</a></li>
      <li class="hideOnMobile"><a href="admin/index.php">Admin</a></li>
      <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
    </ul>
  </nav>
  <section class="accueil">
    <div>
        <h1>BIENVENUE SUR LE PORTAIL DE CANDIDATURE DE L'ESMT </h1>          

        <a href="form_inscription.php">
            <button type="button" name="button">CANDIDATER</button>
        </a>
    </div>
    

  </section>
</div>
    </div>

    
<!-- menu section starts  -->

<section class="menu" id="menu">

<h1 class="heading"> NOTRE <span>ECOLE</span> </h1>

<div class="box-container">

    <div class="box">
        <img src="images/menu-1.jpg" alt="">
        <h3>DECOUVRIR L'ESMT DE DAKAR</h3>
        <div class="price"><span></span></div>
        <a href="https://www.esmt.sn/fr/mot-du-directeur-general" class="btn">A PROPOS DE NOUS</a>
    </div>

    <div class="box">
        <img src="images/menu-2.jpeg" alt="">
        <h3>RESULTATS DES ADMISSION</h3>
        <div class="price"> <span></span></div>
        <a href="admin/admission.php" class="btn">RESULTATS</a>
    </div>

    <div class="box">
        <img src="images/menu-3.jpeg" alt="">
        <h3>FORMATION continue & initiale</h3>
        <div class="price"><span></span></div>
        <a href="https://foad.esmt.sn/" class="btn">DECOUVRER</a>
    </div>

    

    

    

</div>

</section>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <h4>Institut Universitaire</h4>
            <ul>
              <li><a href="https://www.esmt.sn/fr/mot-du-directeur-general">À propos de nous</a></li>
              <li><a href="https://foad.esmt.sn/">Nos filières</a></li>
              <li><a href="https://ific.auf.org/">Formation a distance</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Aide et Support</h4>
            <ul>
              <li><a href="form_inscription.php">Inscription</a></li>
              <li><a href="admin/admission.php">Résultats</a></li>
             
            </ul>
          </div>
         
          <div class="footer-col">
            <h4>Suivez-nous</h4>
            <div class="social-links">
              <a href="https://www.facebook.com/ESMTSenegal/"><i class="fab fa-facebook-f"></i></a>
              <a href="https://i.instagram.com/esmtsn/"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
  
  
<script src="js/index.js"></script>


</body>
</html>