<?php
// secure centralized session management
$secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
ini_set('session.use_strict_mode', 1);
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => $secure,
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();

// require DB only if needed elsewhere; not required here
// check login
if (empty($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
    exit;
}

// inactivity timeout (30 minutes)
$timeout = 30 * 60;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    // destroy session and redirect to login
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'], $params['secure'], $params['httponly']
        );
    }
    session_destroy();
    header('Location: login.php?pesan=session_expired');
    exit;
}

// refresh activity timestamp
$_SESSION['last_activity'] = time();
?>