<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Le Trail des Glaces</title>
</head>

<body class="bodyindex">

    <?php
    include('includes/navbar-index.php');
    ?>
    <main class="mainIndex">

        <div class="div-principale">
            <div class="background-image">
                <img src="images/flocon2.png" alt="">
                <div class="centered-text">
                    <p class="titre-trail">Le trail des </p>
                    <p class="titre-glaces">glaces</p>
                    <a href="parcours.php"><button class="bouton-inscription">S'inscrire pour le Trail</button></a>
                </div>
                <img id="flecheBas" src="img/fleche.svg">
            </div>

        </div>

        <div class="div-explication">
            <h2>Le trail des glaces, c'est quoi ?</h2>
            <div class="texteIndex">
                <p>Le Trail des Glaces organisé par l'association imaginaire Le Club Alpin Horizon Vertical s'annonce comme une aventure immersive au cœur des paysages des Estables en Haute-Loire, programmée pour le 14 décembre 2024. Cet événement propose une gamme variée de parcours, adaptés à tous les niveaux d'enthousiastes de plein air. Des 20 kilomètres exigeants du Trail des Loups à l'intrigant Trail des Alpinistes de 15 kilomètres, comprenant une portion d'escalade unique, jusqu'au parcours plus accessible du Trail des Husky sur 10 kilomètres, chaque participant trouvera un défi à sa mesure.</p>
                <p>Pour ceux privilégiant une approche plus décontractée, la Marche Polaire de 5 kilomètres offre une alternative non compétitive. Des ravitaillements stratégiquement situés et des goodies exclusifs contribueront à l'expérience des participants, créant des souvenirs mémorables de cette journée. L'événement sera animé par une atmosphère festive, de la musique et des animations.</p>
            </div>




            <div class="bouton-container">
                <a href="parcours.php"><button class="bouton-info">En savoir plus</button></a>
            </div>

        </div>



        <div class="separateur"></div>

        <div class="conteneur-cartes">
            <div class="carte">
                <i><img src="images/icon/Fichier 6.png" alt=""></i>
                <h3>14 décembre 2024</h3>
                <p>Rejoignez-nous pour une aventure hivernale inoubliable le 14 décembre 2024 ! Marquez vos calendriers et préparez-vous à affronter le froid en compagnie d'autres passionnés de course à pied. Le Trail des Glaces vous promet une expérience exceptionnelle, alliant sport et paysages enneigés à couper le souffle.</p>
            </div>

            <div class="carte">
                <i><img src="images/icon/Fichier 5.png" alt=""></i>
                <h3>18H</h3>
                <p>Le coup d'envoi de cette expérience glaciaire sera donné à 18h précises. Soyez prêts à vous élancer sous les étoiles naissantes de l'hiver pour une course qui éveillera tous vos sens. Lampe frontale en tête et détermination au cœur, chaque pas vous rapprochera de la ligne d'arrivée.</p>
            </div>

            <div class="carte">
                <i><img src="images/icon/Fichier 7.png" alt=""></i>
                <h3>Les Estables, 43150</h3>
                <p>Les Estables, 43260, est le théâtre de notre Trail des Glaces. Ce village pittoresque, niché au cœur de la nature, offre le décor parfait pour notre évènement. Venez découvrir ses paysages enneigés et ses sentiers qui s'étendent comme un défi à la conquête des coureurs.</p>
            </div>
        </div>
        <div class="bouton-container">
            <a href="parcours.php"><button class="bouton-info">Je réserve ma place</button></a>
        </div>






        <div class="separateur"></div>

        <h2 class="titresectionphoto">Et en photo, ça donne quoi ?</h2>
        <div class="image-container">

            <img class="rectangle img-index" src="images/galerie img 5.jpg" alt="">
            <img class="square img-index" src="images/galerie img 1.jpg" alt="">
            <img class="square img-index" src="images/galerie img 6.jpg" alt="">
            <img class="rectangle img-index" src="images/galerie img2.jpg" alt="">

        </div>


        <?php
        include('includes/footer.php');
        ?>


    </main>
</body>

</html>