<?php
header('Content-Type: application/json');

$host = 'localhost';
$db   = 'chat_system';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "DB Connection Failed"]); exit;
}

function censorText($text) {
    $badWords = ['badword1', 'badword2', 'spam']; // Add your words here
    foreach ($badWords as $word) {
        $pattern = '/\\b' . preg_quote($word, '/') . '\\b/i';
        $text = preg_replace($pattern, str_repeat('*', strlen($word)), $text);
    }
    return $text;
}

$action = $_GET['action'] ?? '';

if ($action === 'fetch') {
    $stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 30");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($messages as &$msg) { $msg['message'] = censorText($msg['message']); }
    echo json_encode(array_reverse($messages));
}

if ($action === 'send' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');
    if (!empty($msg)) {
        $stmt = $pdo->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
        $stmt->execute(['Guest_' . rand(100, 999), censorText($msg)]);
        echo json_encode(["status" => "success"]);
    }
}
?>