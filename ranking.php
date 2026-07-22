<?php
// ranking.php
require_once 'db.php';

// GETリクエストで指定されたステージ番号を取得（デフォルトは1）
$stage = isset($_GET['stage']) ? (int)$_GET['stage'] : 1;

// 指定されたステージのスコアを取得
// 点数が高い順（DESC）、同点の場合は登録日時が古い順（ASC）に並べ、上位10件を取得するSQL
$stmt = $pdo->prepare("SELECT player_name, score, created_at FROM ranking WHERE stage = :stage ORDER BY score DESC, created_at ASC LIMIT 10");
$stmt->bindValue(':stage', $stage, PDO::PARAM_INT);
$stmt->execute();

$rankings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON形式で結果をブラウザ（JavaScript）に返す
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rankings);
?>
