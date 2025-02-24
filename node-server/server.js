const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const { v4: uuidv4 } = require('uuid');

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: '*',
    },
});

// Simpan sesi aktif
let activeSessions = {};

io.on('connection', (socket) => {
    console.log('User connected:', socket.id);

    // Terima session ID dari user (jika ada)
    socket.on('register-session', (sessionId) => {
        if (!sessionId) {
            sessionId = uuidv4();
        }
        activeSessions[sessionId] = { socketId: socket.id };
        socket.join(sessionId);
        socket.emit('session-id', sessionId);
        io.emit('active-sessions', Object.keys(activeSessions));
        console.log(`User registered with session: ${sessionId}`);
    });

    // Kirim pesan dari user
    socket.on('send-message', ({ sessionId, message }) => {
        console.log(`Customer message in session ${sessionId}: ${message}`);
        io.to(sessionId).emit('receive-message', { sender: 'Customer', message });
    });

    // Admin bergabung ke room user
    socket.on('join-customer-room', (sessionId) => {
        socket.join(sessionId);
        console.log(`Agent joined session: ${sessionId}`);
    });

    // Admin mengirim pesan
    socket.on('send-agent-message', ({ sessionId, message }) => {
        io.to(sessionId).emit('receive-message', { sender: 'Agent', message });
    });

    // Handle disconnect
    socket.on('disconnect', () => {
        const sessionId = Object.keys(activeSessions).find(key => activeSessions[key].socketId === socket.id);
        if (sessionId) {
            delete activeSessions[sessionId];
            io.emit('active-sessions', Object.keys(activeSessions));
        }
        console.log('User disconnected:', socket.id);
    });
});

server.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});
