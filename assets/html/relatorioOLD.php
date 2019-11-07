<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/relatorio.css">
</head>

<?php 
require '../php/config.php';
if (isset($_POST['datainicial']) && isset($_POST['datafinal']) && empty($_POST['datainicial']) == false && empty($_POST['datafinal']) == false ) {

    $informacoesfuncionario = $_COOKIE['funcionario'];
    $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :infofuncionario");
    $sql->bindValue(":infofuncionario",  $informacoesfuncionario);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $infofuncionario = $sql->fetch();
        $nomefuncionario = $infofuncionario['nome'];
        $funcao = $infofuncionario['funcao'];
        $empresa = $infofuncionario['empresa'];
        $nascimento = $infofuncionario['nascimento'];
        $email = $infofuncionario['email'];
        $infosenha = $infofuncionario['senha'];
        $usuario = $infofuncionario['usuario'];
        $pinuser =  $infofuncionario['pin']; 
        $cpfuser = $infofuncionario['cpf'];
        $datainicial = $_POST['datainicial'];
        $datafinal = $_POST['datafinal'];
        $datainicial = explode("-", $datainicial);
list($ano, $mes, $dia) = $datainicial; 
$datainicial = "$ano/$mes/$dia";

$datafinal = explode("-", $datafinal);
list($ano, $mes, $dia) = $datafinal; 
$datafinal = "$ano/$mes/$dia";

    }
else {
      header("location: funcionarios.php");
}
  
}
else {
    header("location: funcionarios.php");
}





?>
<body>
    <div class="conteinerrelatorio">
        <div class="toporelatorio">
            <div>Relatorio de Ponto</div>
            <div class="menutopofuncionariorelatorio">
                <div class="item-topo-relatorio">
                    <p>NOME: <?php echo $nomefuncionario?></p>
                    <p>EMPRESA: <?php echo $empresa?></p>
                </div>
                <div class="item-topo-relatorio">
                    <p>DATA: <?php echo $datainicial." - ".$datafinal?></p>
                    <p>CTPS: R54W3E52525624352</p>
                </div>

                <div class="item-topo-relatorio">
                    <p>TURNO: 8:30:00-12:00:00-18:30:00</p>
                </div>
            </div>

        </div>

        <div class="tabelarelatorioponto">
            <table class="relatoriopontobody" cellpadding="0" cellspacing="0">
                <thead>
                    <tr class="bordastabela">
                        <th>DIA</th>
                        <th>ENTRADA</th>
                        <th>PAUSA</th>
                        <th>RETORNO</th>
                        <th>SAÍDA</th>
                        <th>TOTAL</th>
                        <th>EXTRA</th>
                    </tr>
                </thead>

                <tbody>
                <?php
    $sql = $pdo->prepare("SELECT * FROM ponto WHERE data BETWEEN :datainicial AND :datafinal AND funcionario = :informacoesfuncionario");
    $sql->bindValue(":informacoesfuncionario", $informacoesfuncionario);
    $sql->bindValue(":datainicial", $datainicial);
    $sql->bindValue(":datafinal", $datafinal);
    $sql->execute();
        foreach ($registrosdeponto = $sql->fetchAll() as $resultadopesquisadata) {
        
        $dadosdata = $resultadopesquisadata['data'];
       $dadosentrada = $resultadopesquisadata['Entrada'];
       $dadospausa = $resultadopesquisadata['Pausa'];  
       $dadosretorno = $resultadopesquisadata['Retorno'];
       $dadosaida = $resultadopesquisadata['Saida'];
      ?>
                    <tr class="bordastabela">
                        <th scope="row"><?php echo $dadosdata;?></th>
                        <th><?php echo $dadosentrada;?></th>
                        <th><?php echo $dadospausa;?></th>
                        <th><?php echo $dadosretorno;?></th>
                        <th><?php echo $dadosaida;?></th>
                        <?php 

$horaInicial  = strtotime($dadosentrada);
$horaFinal    = strtotime($dadosaida);
$intervalo    = strtotime($dadosretorno);
$horaAuxuliar = strtotime($dadospausa);
/*
     Bom...agora é só dividir os valores...e você terá o total de segundos trabalhados
 */
$totalSegundos = ($horaFinal - $horaInicial);

/* Observe que...já que estamos falando de segundos e você quer 
     saber o total de horas trabalhas...então...você terá que dividir pela quantidade de segundos existente em 1 hora...que no caso é 3600 segundos ok*/
$totalHora = $totalSegundos / 3600; 

/*E não podemos esquecer a hora de intervalo né...observe que criei uma hora auxiliar para que possa ser interagaida com ele beleza...*/
$segundosIntervalo = $intervalo - $horaAuxuliar;
$horaIntervalo = $segundosIntervalo /3600;

/* E finalmente para que você saiba realmente quantas horas o fulano trabalhou...de acordo com as horas inseridas pelo usuario é claro...*/

$horasTrabalhadas = $totalHora - $horaIntervalo;
$segundosTotal = $totalSegundos - $segundosIntervalo;
$horasextras = $horasTrabalhadas - 8;

 /*E para que tudo saia num formato bunitinhu...te messa função aí para converter a parada ok...*/
?>
       <th><?php 
       if (empty($resultadopesquisadata['Entrada']) == false && empty($resultadopesquisadata['Pausa']) == false && empty($resultadopesquisadata['Retorno']) == false && empty($resultadopesquisadata['Saida']) == false) {
           echo $horasTrabalhadas; } ?></th>
       <th><?php
       if (empty($resultadopesquisadata['Entrada']) == false && empty($resultadopesquisadata['Pausa']) == false && empty($resultadopesquisadata['Retorno']) == false && empty($resultadopesquisadata['Saida']) == false) {
           echo $horasextras; }} ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>