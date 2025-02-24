<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Chat</title>
    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"></script>
</head>
<body>
    <h1>Customer Chat</h1>
    <div id="chat-box"></div>
    <input type="text" id="message-input" placeholder="Type your message here">
    <button onclick="sendMessage()">Send</button>

    <script>
        const socket = io('http://localhost:3000');
        let sessionId = localStorage.getItem('sessionId');

        // Daftarkan session atau buat baru
        socket.emit('register-session', sessionId);

        // Terima session ID dari server
        socket.on('session-id', (id) => {
            sessionId = id;
            localStorage.setItem('sessionId', sessionId); // Simpan session ID di localStorage
            console.log('Your session ID:', sessionId);
        });

        // Terima pesan
        socket.on('receive-message', (data) => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<p><strong>${data.sender}:</strong> ${data.message}</p>`;
        });

        // Kirim pesan ke server
        function sendMessage() {
            const message = document.getElementById('message-input').value;
            socket.emit('send-message', { sessionId, message });
            document.getElementById('message-input').value = '';
        }
    </script>
</body>
</html>
