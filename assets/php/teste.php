<?php 

$intervalo_selecinado='';
if(isset($_POST['btnvalue'])){
$intervalo_selecinado = $_POST['btnvalue'];
}
echo $intervalo_selecinado;

?>