<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<title>Billetterie</title>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
        <h1 class='hautPage'>Billetterie</h1>

        <div class="ensembleCard">
            <div class="card">
                <img src="">
                <h3>Parcours 1</h3>
                <div>blabla</div>
                <form method='post' action='reservation.php?id=1'>
                    <label>Participants :</label>
                    <input type='number' name='nbParticipants' min='1' max='20' value='1'>
                    <input class='validBleu' type='submit' value='Réserver'>
                </form>
            </div>

            <div class="card">
                <img src="">
                <h3>Parcours 2</h3>
                <div>blabla</div>
                <form method='post' action='reservation.php?id=2'>
                    <label>Participants :</label>
                    <input type='number' name='nbParticipants' min='1' max='20' value='1'>
                    <input class='validBleu' type='submit' value='Réserver'>
                </form>
            </div>

            <div class="card">
                <img src="">
                <h3>Parcours 3</h3>
                <div>blabla</div>
                <form method='post' action='reservation.php?id=3'>
                    <label>Participants :</label>
                    <input type='number' name='nbParticipants' min='1' max='20' value='1'>
                    <input class='validBleu' type='submit' value='Réserver'>
                </form>
            </div>

            <div class="card">
                <img src="">
                <h3>Raquettes</h3>
                <div>blabla</div>
                <form method='post' action='reservation.php?id=4'>
                    <label>Participants :</label>
                    <input type='number' name='nbParticipants' min='1' max='20' value='1'>
                    <input class='validBleu' type='submit' value='Réserver'>
                </form>
            </div>
        </div>
    </main>

</body>
</html>