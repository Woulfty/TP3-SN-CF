var socket = new WebSocket("ws://192.168.64.126:5000");

//DIV
var connexion = document.getElementById('connexion');

//Champ
var inputLogin_Connexion = document.getElementById("inputLogin_Connexion");
var inputPassword_Connexion = document.getElementById("inputPassword_Connexion");

//Bouton
var inputConnect_Connexion = document.getElementById('inputConnect_Connexion');

var inputSend = document.getElementById('inputSend');

//Connexion
inputConnect_Connexion.addEventListener('click', function(){
    var login = inputLogin_Connexion.value;
    var mdp = inputPassword_Connexion.value;

    data = "Auth"+login+";"+mdp;

    socket.send(data);
});

// Lorsque la connexion est établie.
socket.onopen = function() {
    console.log("Client WebSocket: Nouvelle connexion");            
};

// Lorsque la connexion se termine.
socket.onclose = function() {
    console.log("Client WebSocket: Deconnexion");
};

// Récupération des erreurs.
// Si la connexion ne s'établie pas,
socket.onerror = function(error) {
    console.error(error);
};
/*        
// Lorsque le serveur envoi un message.
socket.onmessage = function(event) {
    if(event.data == "Authtrue" || event.data == "Salttrue"){
        connexion.hidden = true;
        inscription.hidden = true;
        message.hidden = false;
    }else{
        var messageText = document.getElementById('messageText')
        var messageDiv = document.createElement("div");
        var messageContent = event.data;
        messageDiv.innerHTML = "<p>"+messageContent+"</p>";
        messageText.appendChild(messageDiv);
    }
    //Affichage message
    var scrollMessage = document.getElementById('scrollMessage');
    var messageText = document.getElementById('messageText');
    scrollMessage.scrollTo(0, messageText.scrollHeight);

};
*/