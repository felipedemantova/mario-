<?php
session_start();
include_once("conexao.php");

$cod_candidato = filter_input(INPUT_POST, 'cod_candidato', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$CPF = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_STRING);
$datadenascimento = filter_input(INPUT_POST, 'datadenascimento', FILTER_SANITIZE_STRING);
$numero_dependentes = filter_input(INPUT_POST, 'numero_dependentes', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$telefonepararecado = filter_input(INPUT_POST, 'telefonepararecado', FILTER_SANITIZE_STRING);
$nomepararecado = filter_input(INPUT_POST, 'nomepararecado', FILTER_SANITIZE_STRING);


$result_carrouses = "UPDATE candidato SET nome='$nome', email='$email', CPF='$CPF',datadenascimento='$datadenascimento', numero_dependentes='$numero_dependentes'
,bairro='$bairro',endereco='$endereco',numero='$numero',municipio='$municipio',uf='$uf',telefone='$telefone',celular='$celular',telefonepararecado='$telefonepararecado',
nomepararecado='$nomepararecado' WHERE cod_candidato='$cod_candidato'";
$resultado_carrouses = mysqli_query($conn, $result_carrouses);
	echo "Ultimo Id Inserido: $cod_candidato <br>";
		

?>

