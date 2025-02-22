const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const { v4: uuidv4 } = require('uuid'); // Untuk membuat ID unik

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: '*',
    },
});

io.on('connection', (socket) => {
    console.log('User connected:', socket.id);

    // Generate session ID untuk pelanggan
    const sessionId = uuidv4();
    socket.emit('session-id', sessionId); // Kirim session ID ke pelanggan
    socket.join(sessionId); // Pelanggan bergabung ke room mereka
    console.log(`User ${socket.id} joined session: ${sessionId}`);

    // Pelanggan mengirim pesan
    socket.on('send-message', ({ sessionId, message }) => {
        console.log(`Customer message in session ${sessionId}: ${message}`);
        io.to(sessionId).emit('receive-message', { sender: 'Customer', message });
    });

    // Agen bergabung ke room pelanggan
    socket.on('join-customer-room', (sessionId) => {
        socket.join(sessionId);
        console.log(`Agent ${socket.id} joined session: ${sessionId}`);
    });

    // Agen mengirim pesan
    socket.on('send-agent-message', ({ sessionId, message }) => {
        console.log(`Agent message to session ${sessionId}: ${message}`);
        io.to(sessionId).emit('receive-message', { sender: 'Agent', message });
    });

    socket.on('disconnect', () => {
        console.log('User disconnected:', socket.id);
    });
});

server.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});
