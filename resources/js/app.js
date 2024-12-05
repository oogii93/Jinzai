import './bootstrap';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';


import './three-background';
// import { initThreeBackground } from './three-background';
import { initializeChatBox } from './chat-box';  // Add this line


window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});


// Initialize when DOM is loaded
// document.addEventListener('DOMContentLoaded', initThreeBackground);


// Add this to initialize when the DOM is loaded
// document.addEventListener('DOMContentLoaded', initializeChatBox);
document.addEventListener('DOMContentLoaded', initializeChatBox);
