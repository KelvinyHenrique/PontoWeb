<?php
/*Pega valor do botão selecionado */
$valorbtn='';
if(isset($_POST['btnvalue'])){
$valorbtn = $_POST['btnvalue'];
header("Location: ../html/$valorbtn.html");

} else {
    header("Location: ../html/index.html");
}
?>