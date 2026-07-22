<?php
// save_score.php
require_once 'db.php';

// POSTデータを取得
$player_name = isset($_POST['player_name']) ? $_POST['player_name'] : 'プレイヤー';
$score = isset($_POST['score']) ? (int)$_POST['score'] : 0;
// ゲームの仕様上ステージが3つあるため、ステージ情報も保存します
$stage = isset($_POST['stage']) ? (int)$_POST['stage'] : 1; 

// スコアが0より大きい場合のみデータベースに保存
if ($score > 0) {
    // SQLインジェクション対策としてプリペアドステートメントを使用
    $stmt = $pdo->prepare("INSERT INTO ranking (player_name, score, stage) VALUES (:player_name, :score, :stage)");
    $stmt->bindValue(':player_name', $player_name, PDO::PARAM_STR);
    $stmt->bindValue(':score', $score, PDO::PARAM_INT);
    $stmt->bindValue(':stage', $stage, PDO::PARAM_INT);
    $stmt->execute();
}

// 成功レスポンスを返す
echo "success";
?>
