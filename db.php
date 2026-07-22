<?php
// db.php
// データベース接続設定
$host = 'localhost';
$dbname = 'game_db';
$user = 'root'; // Laragonのデフォルトユーザー名
$pass = ''; // Laragonのデフォルトパスワードは空

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // エラー発生時に例外を投げるように設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース接続失敗: " . $e->getMessage());
}
?>
