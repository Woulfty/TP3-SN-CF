<?php
//$trame = new Trame($_PDO);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>SN-CF</title>
</head>
<body> 
    <script>
        //local
        var socket = new WebSocket("ws://192.168.65.144");

        inputSend.addEventListener('click', function(){
            var message = inputMessage.value

            data ="Bdd"+message;
            
            socket.send(data);

            inputMessage.value = "";
        });

        // Lorsque la connexion est établie.
        socket.onopen = function() {
            console.log("Client WebSocket: Nouvelle connexion");            
        };

        // Lorsque la connexion se termine.
        socket.onclose = function() {
            console.log("Client WebSocket: Déconnexion");
        };

        // Récupération des erreurs.
        // Si la connexion ne s'établie pas,
        socket.onerror = function(error) {
            console.error(error);
        };
                
        // Lorsque le serveur envoi un message.
        socket.onmessage = function(event) {
           
        };
            
    </script>
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5661875.706410285!2d-2.434900432556569!3d46.13904121191319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd54a02933785731%3A0x6bfd3f96c747d9f7!2sFrance!5e0!3m2!1sfr!2sfr!4v1636968215925!5m2!1sfr!2sfr" style="width: 100%; height: 945px; border:0;" allowfullscreen="" loading="lazy"></iframe>

</body>
</html>