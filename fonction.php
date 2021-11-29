<script>
        var socket = null;
try {
    // Connexion vers un serveur HTTP
    socket = new WebSocket("ws://127.0.0.1:1000");

} catch (exception) {
    console.error(exception);
}

// Récupération des erreurs.
// Si la connexion ne s'établie pas,
socket.onerror = function(error) {
    console.error(error);
};

// Lorsque la connexion est établie.
socket.onopen = function(event) {
    console.log("Connexion établie.");

    // Lorsque la connexion se termine.
    this.onclose = function(event) {
        console.log("Connexion terminé.");
    };

    // Lorsque le serveur envoi un message.
    this.onmessage = function(event) {
        console.log("Message:", event.data);
    };

    // Envoi d'un message vers le serveur.
    this.send("Hello world!");
};
    </script>