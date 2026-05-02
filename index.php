<?php
// Edit these to match your MySQL setup
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'chat_app');
define('DB_USER', 'chat_user');
define('DB_PASS', 'your_password_here');
define('TOKEN_TTL_SECONDS', 60*60*6); // token lifetime (6 hours)

function getPDO(){
    static $pdo = null;
    if ($pdo === null) {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4";
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}
