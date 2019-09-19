<?php 
    require 'config.php';

        if( isset($_POST['rz_social']) && empty($_POST['rz_social']) == false) {

            $razaosocial = $_POST['rz_social'];
            $cnpj = $_POST['cnpj'];
            $ordem = $_POST['ordem'];

            $sql = $pdo->prepare("INSERT INTO `empresas` (`id`, `rz_social`, `cnpj`, `ordem`) VALUES (NULL, :rz_social, :cnpj, :ordem);");
            $sql->bindValue(":rz_social", $razaosocial);
            $sql->bindValue(":cnpj", $cnpj);
            $sql->bindValue(":ordem", $ordem);
            $sql->execute();
            header("Location: ../html/empresas.php");
        }
?>