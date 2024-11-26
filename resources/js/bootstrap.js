import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    authEndpoint: '/broadcasting/auth' // For private channels
});

// Notification handling
function initNotifications() {
    // Fetch initial unread count
    fetchUnreadCount();

    // Listen for new notifications
    if (window.Echo && window.Laravel.user) {
        window.Echo.private(`notifications.${window.Laravel.user.id}`)
            .listen('NewNotificationEvent', (e) => {
                addNotification(e);
                updateUnreadCount(1);
            });
    }

    // Click event for notification icon
    $('#notification-icon').on('click', function() {
        $('#notification-dropdown').toggle();
    });
}

function fetchUnreadCount() {
    $.get('/notifications/unread-count', function(response) {
        updateUnreadCount(response.count);
    });
}

function updateUnreadCount(count) {
    $('#unread-count').text(count);

    if (count > 0) {
        $('#unread-count').show();
    } else {
        $('#unread-count').hide();
    }
}

function addNotification(notification) {
    const notificationHtml = `
        <div class="notification-item" data-id="${notification.id}">
            <div class="notification-content">
                <strong>${notification.title}</strong>
                <p>${notification.message}</p>
                <small>${notification.created_at}</small>
            </div>
            <button class="mark-as-read" data-id="${notification.id}">Mark as Read</button>
        </div>
    `;

    $('#notifications-list').prepend(notificationHtml);
}

// Mark notification as read
$(document).on('click', '.mark-as-read', function() {
    const notificationId = $(this).data('id');

    $.ajax({
        url: `/notifications/${notificationId}/read`,
        method: 'PUT',
        success: function() {
            $(`[data-id="${notificationId}"]`).remove();
            updateUnreadCount(-1);
        }
    });
});

// Initialize on document ready
$(document).ready(initNotifications);

