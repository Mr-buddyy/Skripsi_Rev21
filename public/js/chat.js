// Import Pusher
import Echo from "laravel-echo";

// Konfigurasi Pusher
window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: false,
});

// Menerima pesan dari Pusher
window.Echo.channel("chat").listen("ChatMessage", (e) => {
    // Menambah pesan ke daftar pesan
    appendMessageToChat(e.message);
});

// Fungsi untuk menambah pesan ke tampilan chat
function appendMessageToChat(message) {
    const chat = document.getElementById("chat");
    const messageDiv = document.createElement("div");
    messageDiv.innerText = message;
    chat.appendChild(messageDiv);
}

// Fungsi untuk mengirim pesan ke Pusher
function sendMessage() {
    const messageInput = document.getElementById("message-input");
    const message = messageInput.value;

    // Kirim pesan ke Pusher
    window.Echo.channel("chat").whisper("typing", {
        message: message,
    });

    // Clear input
    messageInput.value = "";
}
