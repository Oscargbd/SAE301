<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<title>Billetterie</title>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <main>
        <h1>Billetterie</h1>

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