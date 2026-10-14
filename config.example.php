<?php
// Copy this file to config.php and fill in your own values.
// config.php is ignored by Git, so your real settings are never uploaded.
// Campaign and WhatsApp settings are managed in the admin panel (Settings).
$host = '127.0.0.1';
$dbname = 'astech_lucky';
$username = 'root';     // your MySQL username
$password = '';         // your MySQL password

// Base URL used inside QR codes. It must be reachable from customers' phones.
// Local testing: use this computer's LAN IP, e.g. "http://192.168.0.100/astech_lucky"
// Live site: use the real address, e.g. "https://example.com"
$base_url = "http://YOUR-IP-OR-DOMAIN/astech_lucky";

// Admin sign-up (admin_register.php) is closed once an admin account exists.
// To add another admin: set to true, create the account, then set back to false.
$allow_admin_register = false;

// Errors are logged to logs/error.log and never shown to visitors
date_default_timezone_set('Asia/Kuala_Lumpur');
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/logs/error.log');

set_exception_handler(function ($e) {
    error_log('Uncaught ' . get_class($e) . ': ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
    http_response_code(500);
    echo 'Maaf, sistem mengalami masalah. Sila cuba sebentar lagi.';
});

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec("SET time_zone = '+08:00'");
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(503);
    exit('Sistem tidak dapat disambung buat masa ini. Sila cuba sebentar lagi.');
}

require_once __DIR__ . '/functions.php';