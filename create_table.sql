-- create_table.sql

-- データベースがまだ存在しない場合は作成する
CREATE DATABASE IF NOT EXISTS game_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- 作成したデータベースを使用する
USE game_db;

-- ranking テーブルを作成する
-- ※元のゲームにステージ（1〜3）が存在するため、stageカラムを追加しています
CREATE TABLE IF NOT EXISTS ranking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    player_name VARCHAR(30) NOT NULL,
    score INT NOT NULL,
    stage INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
