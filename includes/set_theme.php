<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set the theme in the session if provided
if (isset(['theme'])) {
    ['theme_active'] = ['theme'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'No theme specified']);
}
?>
