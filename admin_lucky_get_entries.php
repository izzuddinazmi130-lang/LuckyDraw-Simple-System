<?php
// admin_lucky_get_entries.php
session_start();
require_once 'config.php';
require_once 'admin_auth.php';

// Require admin login
requireAdminLogin();

$purchase_id = isset($_GET['purchase_id']) ? trim($_GET['purchase_id']) : '';

if (empty($purchase_id)) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Purchase ID required']);
    exit;
}

$stmt = $pdo->prepare("SELECT id, customer_name, customer_phone, ip_address, entry_date FROM lucky_draw_entries WHERE purchase_id = ? ORDER BY entry_date ASC");
$stmt->execute([$purchase_id]);
$entries = $stmt->fetchAll();

foreach ($entries as &$entry) {
    $entry['entry_date_formatted'] = date('d/m/Y H:i:s', strtotime($entry['entry_date']));
}

header('Content-Type: application/json');
echo json_encode(['success' => true, 'entries' => $entries]);
?>