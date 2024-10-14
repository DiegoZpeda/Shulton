document.addEventListener('DOMContentLoaded', function() {
    const socket = io('http://localhost:3000');

    let unreadMessages = 0; // Contador de mensajes sin leer

    // Solicitar permiso para enviar notificaciones
    Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        }
    });

    // Ruta de la imagen para la notificación
    const notificationIcon = 'img/3.png';

    socket.on('connect', () => {
        console.log('Connected to chat server');
    });

    socket.on('chat history', (messages) => {
        messages.forEach(addMessage);
    });

    socket.on('new message', (message) => {
        addMessage(message);
        // Incrementar contador de mensajes sin leer si el chat no está activo
        if (!chatModalOpen()) {
            unreadMessages++;
            updateUnreadMessagesBadge();
        }
        // Mostrar notificación al recibir un nuevo mensaje
        if (Notification.permission === 'granted') {
            const notification = new Notification('New Message', {
                body: `${message.username}: ${message.message}`,
                icon: notificationIcon,
            });
            // Redirigir al usuario al chat al hacer clic en la notificación
            notification.onclick = function() {
                window.focus(); // Enfocar la ventana actual
                chatModal.style.display = "block"; // Mostrar el chat
            };
        }
    });

    function sendMessage() {
        const messageInput = document.getElementById('message');
        const message = messageInput.value;
        const username = document.getElementById('username').value;
        socket.emit('new message', { username, message });
        messageInput.value = '';
    }

    function addMessage(message) {
        const chat = document.getElementById('chat');
        const messageElement = document.createElement('div');
        messageElement.textContent = `${message.username}: ${message.message}`;
        chat.appendChild(messageElement);
    }

    // Modal functionality
    const chatButton = document.getElementById('chatButton');
    const chatModal = document.getElementById('chatModal');
    const closeButton = document.getElementsByClassName('close')[0];
    const sendButton = document.querySelector('.chat-modal-content button');

    chatButton.onclick = function() {
        chatModal.style.display = "block";
        // Resetear el contador de mensajes sin leer al abrir el chat
        unreadMessages = 0;
        updateUnreadMessagesBadge();
    }

    closeButton.onclick = function() {
        chatModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == chatModal) {
            chatModal.style.display = "none";
        }
    }

    sendButton.onclick = sendMessage;

    // Función para verificar si el chat está activo
    function chatModalOpen() {
        return chatModal.style.display === "block";
    }

    // Función para actualizar el número de mensajes sin leer en el botón flotante
    function updateUnreadMessagesBadge() {
        const unreadMessagesBadge = document.getElementById('unreadMessagesBadge');
        unreadMessagesBadge.textContent = unreadMessages;
        unreadMessagesBadge.style.display = unreadMessages > 0 ? "block" : "none";
    }
});
