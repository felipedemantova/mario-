<?php
    include_once("conexao.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $expedido_por = $_POST['expedido_por'];
    $numero_dependentes = $_POST['numero_dependentes'];
    $CPF = $_POST['CPF'];
    $RG = $_POST['RG'];
    $datadenascimento = $_POST['datadenascimento'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $uf = $_POST['uf'];
    $municipio = $_POST['municipio'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $telefonepararecado = $_POST['telefonepararecado'];
    $nomepararecado = $_POST['nomepararecado'];
    $verificando_cpf = "SELECT * FROM candidato WHERE CPF = '$CPF'";
    $ver_cpf = mysqli_query($conn, $verificando_cpf);
    $verifica_cpf = mysqli_num_rows($ver_cpf);
    //$verifica_cpf = 1;    

    if($verifica_cpf >= 1){    
        //echo '<script> alert("CPF já cadastrado!");</script>';
        echo 'CPF já cadastrado';
        echo '<br>';
        echo '<button onclick="history.go(-1)"> Voltar ao Cadastro </button>' ;

       }
       else{
        $result_cadastro = "INSERT INTO candidato (nome, CPF, RG, 
datadenascimento, endereco, bairro, municipio, email, telefone, telefonepararecado, nomepararecado, expedido_por, numero_dependentes, numero, uf, celular) VALUES ('$nome', '$CPF', 
'$RG', '$datadenascimento', '$endereco', '$bairro', '$municipio','$email', '$telefone', '$telefonepararecado', '$nomepararecado', '$expedido_por', '$numero_dependentes', '$numero', '$uf', '$celular')";    

$resultado_cadastro = mysqli_query($conn, $result_cadastro);
$ultimo_id = mysqli_insert_id($conn);

echo "ID: $ultimo_id <br>";
       }


?>