<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>FAQ</title>
</head>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>';
        <h1 class='hautPage'>FAQ</h1>
        <div id='chat-messages'></div>
        <?php
        if (isset($_SESSION["username"])) {
            echo "
            <form id='message-form'>
                <input type='text' id='message-input' placeholder='Entrez votre message' required />
                <input class='validBleu' type='submit' name='submit 'value='Envoyer' />
            </form>";
        } else {
            echo "<div id='message-form'>
                <p>Vous devez être connecté pour accéder à la FAQ.</p>
                <a href='login.php'>Se connecter</a>
            </div>";
        }
        ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadMessages() {
            // Code AJAX pour récupérer les messages depuis le serveur et les afficher
            $.ajax({
                url: 'actions/chat.php', // URL du script PHP qui récupère les messages
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#chat-messages').html(data);
                }
            });
        }

        function sendMessage(message) {
            // Code AJAX pour envoyer un message au serveur
            $.ajax({
                url: 'actions/chat.php', // URL du script PHP qui envoie les messages
                method: 'POST',
                data: {
                    message: message
                },
                success: function() {
                    // Rechargez les messages après avoir envoyé un nouveau message
                    loadMessages();
                }
            });
        }

        // Chargez les messages existants lors du chargement de la page
        loadMessages();

        // Capturez le formulaire de message
        $('#message-form').submit(function(event) {
            event.preventDefault(); // Empêche le formulaire de se soumettre normalement

            var message = $('#message-input').val(); // Récupérez le message depuis l'input
            sendMessage(message); // Envoyez le message au serveur

            // Effacez l'input après l'envoi
            $('#message-input').val('');
        });

        // Rafraîchissez la liste des messages périodiquement
        setInterval(loadMessages, 5000); // Rafraîchir toutes les 5 secondes
    });
</script>
</main>
</body>

</html>