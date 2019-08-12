<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banco de Horas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tabelahoras.css">
</head>


<body>
    <div class="conteiner">
        <div class="bancodehoras">
            <div class="divlateral">
                <!-- <p>Banco de Horas</p> -->
            </div>
            <div class="divbodyhoras">
                <div class="pesquisatopo">
                    <form method="post" class="formulariobancodehoras">
                        <div class="box2019-pesquisa">
                            <div class="infostopobar">Data:<input type="date" name="datapesquisa"></div>
                            <div class="infostopobar">Empresa:
                                <select id="lojapesquisa" name="lojapesquisa">
                                    <option value="1">LOJA 1</option>
                                    <option value="2">LOJA 2</option>
                                    <option value="3">LOJA 3</option>
                                </select>
                            </div>
                            <div class="infostopobar2">Funcionario: <input type="text" name="pesquisanomefuncionario">
                            </div>
                        </div>
                        <div class="botaopesquisatopo"><input type="submit" value="Pesquisar" /></div>
                    </form>



                </div>
                <div class="quadradoshoras">
                    <div class="informacoeshoras">
                        <div class="horasextras">
                            <p>+24</p>
                            <p>EXTRAS</p>
                        </div>
                        <div class="totalhoras">
                            <p>+820H</p>
                            <p>TOTAL</p>
                        </div>
                        <div class="totalfaltas">
                            <p>10</p>
                            <p>FALTAS</p>
                        </div>
                        <div class="totalatestados">
                            <p>1</p>
                            <p>ATESTADOS</p>
                        </div>
                    </div>

                </div>

                <div class="infonomehoras">
                    <div class="tabelabancohoras">
                        <table cellspacing="0" cellpadding="0" class="tablehorasbody">
                            <tr>
                                <th>NOME</th>
                                <th>DATA</th>
                                <th>INICIO</th>
                                <th>PAUSA</th>
                                <th>VOLTA</th>
                                <th>SAIDA</th>
                                <th>TOTAL</th>
                                <th>EXTRA</th>
                            </tr>


                            <?php if (isset($_POST['pesquisanomefuncionario']) && empty($_POST['datapesquisa']) == false) {
   

require "../php/config.php";
$nomefuncionariopesquisa = $_POST['pesquisanomefuncionario'];
$datapesquisa = $_POST['datapesquisa'];
$loja = $_POST['lojapesquisa'];

// PEGA HORA ORGANIZA PARA FICAR TUDO DE ACORDO COM O QUE PE SALVO NO BANCO DE DADOS
$datapesquisa = explode("-", $datapesquisa);
list($ano, $mes, $dia) = $datapesquisa; 
$datapesquisa = "$ano-$mes-$dia-";


$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE nome LIKE :nomefuncionariopesquisa AND empresa = :loja ORDER BY id");
$sql->bindValue(":nomefuncionariopesquisa", "%$nomefuncionariopesquisa%", PDO::PARAM_STR);
$sql->bindValue(":loja", $loja);
$sql->execute();

if($sql->rowCount() > 0) {
	foreach ($dados = $sql->fetchAll() as $resultadofuncionario) {
			$idpesquisafuncionario = $resultadofuncionario['id'];
    $sql = $pdo->prepare("SELECT * FROM ponto WHERE funcionario = :idpesquisafuncionario AND data = :datapesquisa");
    $sql->bindValue(":idpesquisafuncionario", "$idpesquisafuncionario");
    $sql->bindValue(":datapesquisa", $datapesquisa);
    $sql->execute();
    if($sql->rowCount() > 0 ){
        
        $registrosdeponto = $sql->fetch();
        $dadosdata = $registrosdeponto['data'];
       $dadosentrada = $registrosdeponto['Entrada'];
       $dadospausa = $registrosdeponto['Pausa'];  
       $dadosretorno = $registrosdeponto['Retorno'];
       $dadosaida = $registrosdeponto['Saida'];
       
       
       ?>

<tr>
        <td><?php echo $resultadofuncionario['nome']; ?></td>
                                <td><?php  echo $dadosdata; ?></td>
                                <td><?php  echo $dadosentrada; ?></td>
                                <td><?php  echo $dadospausa; ?></td>
                                <td><?php  echo $dadosretorno; ?></td>
                                <td><?php  echo $dadosaida; ?></td>
                                <td>800h</td>
                                <td>+5</td>
                            </tr>
      
      
      <?php  
    }}}} 

?>
                         

                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>