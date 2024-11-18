import './bootstrap';

import './bootstrap';
import { initThreeBackground } from './three-background';
import { initializeChatBox } from './chat-box';  // Add this line

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initThreeBackground);


// Add this to initialize when the DOM is loaded
document.addEventListener('DOMContentLoaded', initializeChatBox);
