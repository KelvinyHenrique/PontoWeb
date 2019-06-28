<?php 
try {
    $pdo = new PDO("mysql:dbname=ponto;host=localhost", "root");
} catch(PDOException $e){
    echo "Erro:".$e->getMessage();
}
?>