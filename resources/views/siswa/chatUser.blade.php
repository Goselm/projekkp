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
    <h2>Active Sessions</h2>
    <ul id="session-list"></ul>

    <input type="text" id="session-id" placeholder="Enter Customer Session ID">
    <button onclick="joinCustomerRoom()">Join Room</button>
    <div id="chat-box"></div>
    <input type="text" id="message-input" placeholder="Type your message here">
    <button onclick="sendMessage()">Send</button>

    <script>
        const socket = io('http://localhost:3000');

        // Update daftar sesi aktif
        // Update daftar sesi aktif
    socket.on('active-sessions', (sessions) => {
        const sessionList = document.getElementById('session-list');
        sessionList.innerHTML = ''; // Hapus semua, biar ga numpuk

        // Pastikan session ID unik
        const uniqueSessions = [...new Set(sessions)];

        uniqueSessions.forEach(sessionId => {
            const li = document.createElement('li');
            li.textContent = sessionId;
            li.onclick = () => {
                document.getElementById('session-id').value = sessionId;
                joinCustomerRoom();
            };
            sessionList.appendChild(li);
        });
    });


        // Bergabung ke room user
        function joinCustomerRoom() {
            const sessionId = document.getElementById('session-id').value;
            socket.emit('join-customer-room', sessionId);
            console.log('Joined room:', sessionId);
        }

        // Terima pesan
        socket.on('receive-message', (data) => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<p><strong>${data.sender}:</strong> ${data.message}</p>`;
        });

        // Kirim pesan ke user
        function sendMessage() {
            const sessionId = document.getElementById('session-id').value;
            const message = document.getElementById('message-input').value;
            socket.emit('send-agent-message', { sessionId, message });
            document.getElementById('message-input').value = '';
        }
    </script>
</body>
</html>
