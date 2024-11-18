export function initializeChatBox() {
    const chatBox = document.getElementById('chatBox');
    const toggleButton = document.getElementById('toggleChatSize');
    const toggleIcon = document.getElementById('toggleIcon');

    if (!chatBox || !toggleButton || !toggleIcon) return;

    let isSmall = false;

    toggleButton.addEventListener('click', () => {
        if (isSmall) {
            chatBox.style.width = '20rem';
            chatBox.style.height = 'auto';
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            `;
        } else {
            chatBox.style.width = '5rem';
            chatBox.style.height = '5rem';
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            `;
        }
        isSmall = !isSmall;
    });
}
