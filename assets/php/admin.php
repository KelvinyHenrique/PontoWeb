<?php
/*Pega valor do intervalo selecionado */
$valorbtn='';
if(isset($_POST['btnvalue'])){
$valorbtn = $_POST['btnvalue'];
header("Location: ../html/$valorbtn.php");
} else {
    header("Location: ../html/admin.html");
}

?>