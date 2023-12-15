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

    // Vérifiez si l'utilisateur est connecté
    if (!isset($_SESSION["idUtilisateur"])) {
        echo "<p>Vous devez être connecté pour accéder à la FAQ.</p>";
    } else {
        // Utilisateur connecté, affichez le formulaire de messagerie instantanée
        echo "<h1>FAQ</h1>";
        echo "<div id='chat-messages'></div>";
        echo "<form id='message-form'>
                <input type='text' id='message-input' placeholder='Entrez votre message' required />
                <input type='submit' value='Envoyer' />
              </form>";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        function loadMessages() {
            // Code AJAX pour récupérer les messages depuis le serveur et les afficher dans #chat-messages
            $.ajax({
                url: 'chat.php', // URL du script PHP qui récupère les messages
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
    });
    </script>
</body>

</html>
