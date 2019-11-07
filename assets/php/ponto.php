




<!-- VERIFICA A DATA E HORA 
VERIFICA O TURNO DO FUNCIONARIO

SEPARA O TURNO EM VARIAVEIS E DIMINUI 1 HORA  

INICIO 
PAUSA
RETORNO
SAIDA 

SE A HORA ATUAL ENTRE TURNO INICIO E FOR MENOR QUE A PAUSA  ENTÃO SELECIONAR O INTERVALO INICIO 
SE A HORA ATUAL ESTIVER ENTRE O TURNO PAUSA  -->


<?php




/* Inicia uma sessão */

session_start();
require 'config.php';
date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['senha']) && empty($_POST['senha']) == false){
  $senha = addslashes($_POST['senha']);

  $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE senha = :senha");
  $sql->bindValue(":senha", $senha);
  $sql->execute();

    if($sql->rowCount() > 0){

            $sql = $sql->fetch();
            $_SESSION['ponto'] = $sql['id'];
           
    } else {
      header("Location: ../html/ponto.html");
    } 

} else {
 header("Location: ../html/ponto.html");
}

/*Pega valor do intervalo selecionado */
/* $intervalo_selecinado='';
if(isset($_POST['btnvalue'])){
$intervalo_selecinado = $_POST['btnvalue'];
} */

//PEGA DATA ATUAL 
$data = date("d/m/Y");
  
$data = explode("/", $data);
   
list($dia, $mes, $ano) = $data;
   
$data = "$ano/$mes/$dia";
 //echo $data;

// FIM DATA


//PEGA HORA ATUAL



if(isset($_SESSION['ponto']) && empty($_SESSION['ponto']) == false){

    $id = $_SESSION['ponto'];
    $sql = $pdo->prepare("SELECT turno, id FROM funcionarios WHERE id = $id");
    $sql->execute();
    $pegaturno = $sql->fetch();
     $turnofuncionario = $pegaturno['turno'];
     $sql = $pdo->prepare("SELECT * FROM turnos WHERE nome = :turnofuncionario");
     $sql->bindValue(":turnofuncionario", $turnofuncionario);
     $sql->execute();

     $pegaturno = $sql->fetch();
    
     $horaatual = date('H:i:s', strtotime('-60 minute'));
     $turnoentrada = $pegaturno['entrada'];
     $turnopausa = $pegaturno['pausa'];
     $turnovolta = $pegaturno['volta'];
     $turnosaida = $pegaturno['saida'];
	 
	// A função abaixo diminui 60 minutos
    $turnoentrada = date('H:i:s', strtotime('+60 minute', strtotime($turnoentrada)));
    $turnopausa = date('H:i:s', strtotime('-60 minute', strtotime($turnopausa)));
    $turnovolta = date('H:i:s', strtotime('+60 minute', strtotime($turnovolta)));
    $turnosaida = date('H:i:s', strtotime('-60 minute', strtotime($turnosaida)));
    $vinte3horas = date('H:i:s', strtotime('23:00:00'));

    //Função Que verifica o dia da semana

    $meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");

$variavel = date("d/m/Y");
$variavel = str_replace('/','-',$variavel);

$hoje = getdate(strtotime($variavel));

$dia = $hoje["mday"];
$mes = $hoje["mon"];
$nomemes = $meses[$mes];
$ano = $hoje["year"];
$diadasemana = $hoje["wday"];
$nomediadasemana = $diasdasemana[$diadasemana];

echo $nomediadasemana;

    //FIM FUNÇÃO
    

    if ($nomediadasemana == "Sábado") {
        echo "ENTROU AQUI NÃO KKK";
    } else {
        if ($horaatual <=  $turnopausa ) {
        $intervalo_selecinado = "Entrada";
    } else {
        if ($horaatual <=  $turnovolta && $horaatual > $turnoentrada) {
        $intervalo_selecinado = "Pausa";
    } else {
        if ($horaatual <=  $turnosaida && $horaatual >  $turnopausa) {
        $intervalo_selecinado = "Retorno";
    } else {
         if ($horaatual >  $turnovolta &&  $horaatual < $vinte3horas) {
        $intervalo_selecinado = "Saida";  
    }}}}   
    ECHO "ENTROU AQUI KK";
    }


    
    $id = $_SESSION['ponto'];
    // SELECIONA TODOS OS CAMPOS DA TABELA PONTO ONDE O ID É IGUAL AO ID DO USUARIO E A DATA É IGUAL A DATA ATUAL
    $sql = $pdo->prepare("SELECT * FROM ponto WHERE funcionario = :id AND data = :data");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":data", $data);
    $sql->execute();


    //VERIFICA SE TEM ALGUMA LINHA
    if($sql->rowCount() == 1 ) {
        $dados = $sql->fetch();
        
        //LOGO TENDO UMA LINHA ENTÃO VERIFICA SE O CAMPO FOI SETADO E SE ESTÁ VAZIO
        if(isset($dados[$intervalo_selecinado]) && empty($dados[$intervalo_selecinado]) == true){
            
            //UPDATE `ponto` SET `Pausa` = '04-55' WHERE `ponto`.`id` = 17;
            $sql = $pdo->prepare("UPDATE ponto SET $intervalo_selecinado = :horaatual WHERE funcionario = :id AND data = :data" );
            $sql->bindValue(":data", $data);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":horaatual", $horaatual);
            $sql->execute();
           header("Location: ../html/sucesso.php");
            session_destroy(); 
        } else //SE NÃO FOI SETADO MAS ESTÁ PREENCHIDO ENTÃO PASSAR PARA A LiNHA DE BAIXO
        {   
            session_destroy();
            header("Location: ../html/erroponto.php");
            exit;
        }

    }else {
        echo $id;
        $sql = $pdo->prepare("INSERT INTO ponto SET $intervalo_selecinado = :horaatual, funcionario = :id, data = :data");
        $sql->bindValue(":horaatual", $horaatual);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":data", $data);
        $sql->execute();
         session_destroy();
        header("Location: ../html/sucesso.php"); 
        exit;
    } 
} else {
    echo "Não foi encontrado nenhuma sessão logada";
    exit;
}

?>