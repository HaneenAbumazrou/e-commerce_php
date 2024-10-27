<?php

use Dotenv\Dotenv;

require "./vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV["DATABASE_HOST"];
$user = $_ENV["DATABASE_USERNAME"];
$password = $_ENV["DATABASE_PASSWORD"];
$database = $_ENV["DATABASE_NAME"];

// Corrected DSN for MySQL
$dsn = "mysql:host=$host;dbname=$database";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$query = "CREATE TABLE IF NOT EXISTS migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(248), 
    batch INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


$pdo->query($query);


$excutedMigrations = $pdo->query("SELECT migration FROM migrations")->fetchAll(PDO::FETCH_COLUMN);

$migrationFiles = scandir(__DIR__ . '\database\migrations');

$batch = (int)$pdo->query("SELECT MAX(batch) FROM migrations")->fetchColumn() + 1;




foreach ($migrationFiles as $file) {
    if ($file === "." || $file === "..") {
        continue;
    }

    $className = convertToClassName(pathinfo($file, PATHINFO_FILENAME));

    if(!in_array($className, $excutedMigrations)){
        require __DIR__."\database\migrations\\".$file;

        $migration = new $className();
        $pdo->exec($migration->up());
        $pdo->exec("INSERT INTO migrations (migration, batch) VALUES ('$className', $batch)"); 

        echo $file." ----------------- completed\n";
    }


}

// Move function outside of the loop
function convertToClassName($file) {
    $fileNameWithoutDate = preg_replace('/^(\d{4}_\d{2}_\d{2})_/', '', $file);
    $fileNameWithoutDate = preg_replace('/[0-9]+/', '', $fileNameWithoutDate);
    $fileNameParts = explode('_', pathinfo($fileNameWithoutDate, PATHINFO_FILENAME));

    $className = "";
    foreach ($fileNameParts as $part) {
        $className .= ucfirst($part);
    }

    return $className;
}






