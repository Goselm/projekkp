<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Chat</title>
    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"></script>
</head>
<body>
    <h1>Agent Chat Interface</h1>
    <input type="text" id="session-id" placeholder="Enter Customer Session ID">
    <button onclick="joinCustomerRoom()">Join Room</button>
    <div id="chat-box"></div>
    <input type="text" id="message-input" placeholder="Type your message here">
    <button onclick="sendMessage()">Send</button>

    <script>
        const socket = io('https://103.127.138.139:3000');

        // Bergabung ke room pelanggan
        function joinCustomerRoom() {
            const sessionId = document.getElementById('session-id').value;
            socket.emit('join-customer-room', sessionId);
            console.log('Joined room:', sessionId);
        }

        // Menerima pesan
        socket.on('receive-message', (data) => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<p><strong>${data.sender}:</strong> ${data.message}</p>`;
        });

        // Mengirim pesan ke pelanggan
        function sendMessage() {
            const sessionId = document.getElementById('session-id').value;
            const message = document.getElementById('message-input').value;
            socket.emit('send-agent-message', { sessionId, message });
            document.getElementById('message-input').value = ''; // Reset input
        }
    </script>
</body>
</html>