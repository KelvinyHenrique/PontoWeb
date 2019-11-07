<?php 
    require "../php/config.php";
    if(isset($_POST['pesquisanomefuncionario']) && isset($_POST['datafinal']) && empty($_POST['datainicial']) == false && empty($_POST['datafinal']) == false) {

$nomefuncionariopesquisa = $_POST['pesquisanomefuncionario'];
$datainicial = $_POST['datainicial'];
$datafinal = $_POST['datafinal'];
$loja = $_POST['lojapesquisa'];

// ATENÇÃO ESTE COMANDO DESATIVA TODOS OS ERROS NÃO ESQUECER QUE ESTÁ DANDO UM ERRO NO BANCO DE HORAS NA LINHA DA FUNÇÃO QUE CONVERTE A HORA
// error_reporting(0);

// PEGA HORA ORGANIZA PARA FICAR TUDO DE ACORDO COM O QUE PE SALVO NO BANCO DE DADOS
$datainicial = explode("-", $datainicial);
list($ano, $mes, $dia) = $datainicial; 
$datainicial = "$ano/$mes/$dia";

$datafinal = explode("-", $datafinal);
list($ano, $mes, $dia) = $datafinal; 
$datafinal = "$ano/$mes/$dia";


$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE nome LIKE :nomefuncionariopesquisa AND empresa = :loja ORDER BY id");
$sql->bindValue(":nomefuncionariopesquisa", "%$nomefuncionariopesquisa%", PDO::PARAM_STR);
$sql->bindValue(":loja", $loja);
$sql->execute();

if($sql->rowCount() > 0) {
?>
<div class="infonomehoras">
    <div class="tabelabancohoras">
        <table cellspacing="0" cellpadding="0" class="tablehorasbody">
            <tr>
                <th>NOME</th>
                <th>DATA</th>
                <th>INICIO</th>
                <th>PAUSA</th>
                <th>RETORNO</th>
                <th>SAIDA</th>
                <th>TOTAL</th>
                <th>EXTRA</th>
            </tr>
            <?php
foreach ($dados = $sql->fetchAll() as $resultadofuncionario) {
$idpesquisafuncionario = $resultadofuncionario['id'];
$sql = $pdo->prepare("SELECT * FROM ponto WHERE data BETWEEN :datainicial AND :datafinal AND funcionario = :idpesquisafuncionario");
$sql->bindValue(":idpesquisafuncionario", $idpesquisafuncionario);
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

            <tr>
                <td><?php echo $resultadofuncionario['nome']; ?></td>
                <td><?php  echo $dadosdata; ?></td>
                <td><?php  echo $dadosentrada; ?></td>
                <td><?php  echo $dadospausa; ?></td>
                <td><?php  echo $dadosretorno; ?></td>
                <td><?php  echo $dadosaida; ?></td>

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
                <td><?php 
if (empty($resultadopesquisadata['Entrada']) == false && empty($resultadopesquisadata['Pausa']) == false && empty($resultadopesquisadata['Retorno']) == false && empty($resultadopesquisadata['Saida']) == false) {
echo $horasTrabalhadas; } ?></td>
                <td><?php
if (empty($resultadopesquisadata['Entrada']) == false && empty($resultadopesquisadata['Pausa']) == false && empty($resultadopesquisadata['Retorno']) == false && empty($resultadopesquisadata['Saida']) == false) {
echo $horasextras; } ?></td>
            </tr>
            <?php

// ACIMA VAI O CONVERTER  QUE ESTA NO

}}}} 
?>
        </table>
    </div>
</div>
</div>
</div>