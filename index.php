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
    include('includes/navbar.php');
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
                <img id="flecheBas" src="img/flecheBas.png">
            </div>
            
        </div>

        <div class="div-explication">
            <h2>Le trail des glaces, c'est quoi ?</h2>
            <div class="texteIndex" >
                <p >Le Trail des Glaces organisé par l'association imaginaire Le Club Alpin Horizon Vertical s'annonce comme une aventure immersive au cœur des paysages des Estables en Haute-Loire, programmée pour le 14 décembre 2024. Cet événement propose une gamme variée de parcours, adaptés à tous les niveaux d'enthousiastes de plein air. Des 20 kilomètres exigeants du Trail des Loups à l'intrigant Trail des Alpinistes de 15 kilomètres, comprenant une portion d'escalade unique, jusqu'au parcours plus accessible du Trail des Husky sur 10 kilomètres, chaque participant trouvera un défi à sa mesure.</p>
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
                <p></p>
            </div>

            <div class="carte">
                <i><img src="images/icon/Fichier 5.png" alt=""></i>
                <h3>18H</h3>
                <p></p>
            </div>

            <div class="carte">
                <i><img src="images/icon/Fichier 7.png" alt=""></i>
                <h3>Les Estables, 43260</h3>
                <p></p>
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

        <footer>

            <?php
            include('includes/footer.php');
            ?>

        </footer>

    </main>
</body>

</html>