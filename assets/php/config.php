<?php 
try {
    $pdo = new PDO("mysql:dbname=u804468449_ponto;host=sql171.main-hosting.eu", "u804468449_zbx", "48263590+l");
} catch(PDOException $e){
    echo "Erro:".$e->getMessage();
}
?>