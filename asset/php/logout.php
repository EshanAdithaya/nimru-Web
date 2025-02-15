<?php
// auth/logout.php

// session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
// Logout/Session Destruction
// session_start();
session_destroy();
session_unset();
// session_regenerate_id(true); // This creates a new session ID

// When logging in again
// session_start();
// Rest of your login logic

// Determine if it's an AJAX request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Return JSON response for AJAX requests
    echo json_encode(['success' => true, 'message' => 'Logged out successfully']);
    exit;
}

// For non-AJAX requests, redirect to login page
header('Location: ../../index.php');
exit;
?>