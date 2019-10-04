<?php 
try {
    $pdo = new PDO("mysql:dbname=u804468449_ponto;host=107.180.51.103", "u804468449_zbx", "48263590+l");
} catch(PDOException $e){
    echo "Erro:".$e->getMessage();
}
?>