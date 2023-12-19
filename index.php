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
            
        </div>
        
        </div>
        <a href="billetterie.php"><button class="bouton-inscription">S'inscrire pour le Trail</button></a>
    </div>

    <div class="div-explication">
        <h2>Le trail des glaces, c'est quoi ?</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not
simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
undoubtable source</p>
        <a href="parcours.php"><button class="bouton-info">En savoir plus</button></a>

    </div>

    <div class="separateur"></div>

    <div class="conteneur-cartes">
        <div class="carte">
            <i><img src="images/icon/Fichier 6.png" alt=""></i> 
            <h3>Date</h3>
            <p>Lorem Ipsum is simply dummy
            text of the printing and
            typesetting industry. Lorem
            Ipsum has been the industry's
            standard dummy text ever
            since the 1500s, when an
            unknown printer took a galley
            of type.</p>
        </div>

        <div class="carte">
            <i><img src="images/icon/Fichier 5.png" alt=""></i> 
            <h3>18H</h3>
            <p>Lorem Ipsum is simply dummy
            text of the printing and
            typesetting industry. Lorem
            Ipsum has been the industry's
            standard dummy text ever
            since the 1500s, when an
            unknown printer took a galley
            of type.</p>
        </div>

        <div class="carte">
            <i><img src="images/icon/Fichier 7.png" alt=""></i> 
            <h3>Les Estables, 43260</h3>
            <p>Lorem Ipsum is simply dummy
            text of the printing and
            typesetting industry. Lorem
            Ipsum has been the industry's
            standard dummy text ever
            since the 1500s, when an
            unknown printer took a galley
            of type.</p>
        </div>
    </div>
        <div class="bouton-container">
            <a href="billeterie.php"><button class="bouton-info">Je réserve ma place</button></a>
        </div>

        

   


    <div class="separateur"></div>
   
        <h2 class="titresectionphoto">Et en photo, ça donne quoi ?</h2>    
     <div class="image-container">
        
        <img class="rectangle" src="images/galerie img 5.jpg" alt="">
        <img class="square" src="images/galerie img 1.jpg" alt="">
        <img class="square" src="images/galerie img 6.jpg" alt="">
        <img class="rectangle" src="images/galerie img2.jpg" alt="">

    </div> 
</main>
</body>
    
</html>