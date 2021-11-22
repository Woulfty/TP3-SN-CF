var socket = new WebSocket("ws://192.168.65.144:1234");

//DIV
var inscription = document.getElementById('inscription');
var connexion = document.getElementById('connexion');

//Champ
var inputLogin_Connexion = document.getElementById("inputLogin_Connexion");
var inputPassword_Connexion = document.getElementById("inputPassword_Connexion");
var inputLogin_Inscription = document.getElementById("inputLogin_Inscription");
var inputPassword_Inscription = document.getElementById("inputPassword_Inscription");
var inputMessage = document.getElementById("inputMessage");

//Bouton
var inputConnect_Connexion = document.getElementById('inputConnect_Connexion');
var inputRegister_Connexion = document.getElementById('inputRegister_Connexion');
var inputConnect_Inscription = document.getElementById('inputConnect_Inscription');
var inputRegister_Inscription = document.getElementById('inputRegister_Inscription');
var inputSend = document.getElementById('inputSend');

inputRegister_Inscription.addEventListener('click', function(){
    var login = inputLogin_Inscription.value;
    var mdp = inputPassword_Inscription.value;

    data = "Salt"+login+";"+mdp;

    socket.send(data);
});

inputConnect_Connexion.addEventListener('click', function(){
    var login = inputLogin_Connexion.value;
    var mdp = inputPassword_Connexion.value;

    data = "Auth"+login+";"+mdp;

    socket.send(data);
});

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