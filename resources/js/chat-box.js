export function initializeChatBox() {
    const chatBox = document.getElementById('chatBox');
    const toggleButton = document.getElementById('toggleChatSize');
    const toggleIcon = document.getElementById('toggleIcon');

    if (!chatBox || !toggleButton || !toggleIcon) return;

    let isExpanded = false;

    toggleButton.addEventListener('click', () => {
        if (!isExpanded) {
            // Expand
            chatBox.classList.remove('w-20', 'h-20');
            chatBox.classList.add('w-80');
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            `;
            isExpanded = true;
        } else {
            // Collapse
            chatBox.classList.add('w-20', 'h-20');
            chatBox.classList.remove('w-80');
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            `;
            isExpanded = false;
        }
    });
}
