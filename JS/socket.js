var websocket_conn = new WebSocket('ws://127.0.0.1:5000');

websocket_conn.onopen = function(e) {
    console.log('Connected!');
};

websocket_conn.onclose = function(e) {
    console.log('Disconnected!');
};