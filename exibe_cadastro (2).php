<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Listar Candidato</title>		
	</head>
	<body>
    <a href="cadastroCandidatos.php" class="animated-button1">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Cadastrar
</a>
		<h1>Listar Usuário</h1>
		<?php
    echo '<form action="BuscaCadastro.php" method="post">';
    echo '<label>Digite Nome ou CPF </label>';
    echo '<input type="text" name="palavra" oninput="this.value = this.value.toUpperCase()" />';
    echo '<input type="submit" Value="Buscar" />';
    echo '</form>';

    echo '<BR><BR>';

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    $qnt_result_pg = 5;

    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $result_carrouses = "SELECT * FROM candidato ORDER BY cod_candidato DESC LIMIT $inicio, $qnt_result_pg";
    $resultado_carrouses = mysqli_query($conn, $result_carrouses);
    while($row_carrouses = mysqli_fetch_assoc($resultado_carrouses)){
        echo "Codigo Candidato: " . $row_carrouses['cod_candidato'] . "<br>";
        echo "Nome: " . $row_carrouses['nome'] . "<br>";
        echo "Email: " . $row_carrouses['email'] . "<br>";
        echo "Data de Nascimento: " . $row_carrouses['datadenascimento'] . "<br>";
		echo "<button onclick=\"location.href='edit_cadastro.php?cod_candidato=" . $row_carrouses['cod_candidato'] . "'\">Editar</button>";
		echo "<button onclick=\"location.href='apagar_item.php?cod_candidato=" . $row_carrouses['cod_candidato'] . "'\">Apagar</button><br><hr>";
    }

    $result_pg = "SELECT COUNT(cod_candidato) AS num_result FROM candidato";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $max_links = 2;
    echo "<a href='exibe_cadastro.php?pagina=1'>Primeira</a> ";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo "<a href='exibe_cadastro.php?pagina=$pag_ant'>$pag_ant</a> ";
        }
    }

    echo "$pagina ";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){
            echo "<a href='exibe_cadastro.php?pagina=$pag_dep'>$pag_dep</a> ";
        }
    }

    echo "<a href='exibe_cadastro.php?pagina=$quantidade_pg'>Ultima</a>";

?>
	</body>
	<style>
    .carrousel-container { width: 30%; margin: 0 auto; overflow: hidden; }

    .carrousel-item { float: left; width: 10%; padding: 20px; box-sizing: border-box; text-align: center; }

    button { margin-top: 10px; padding: 10px 20px; font-size: 16px; cursor: pointer; }

    button:hover { background-color: black; color: white; }

    hr { border: 1px; border-top: 1px solid white; margin-top: 20px; }
		body {
    font-family: Arial, sans-serif;
    color :white;
    margin: 0;
    padding: 0;
    background-color: white;
}

h1 {
    color: white;
    text-align: center;
}

a {
    color: white;
    text-decoration: none;
}

a:hover {
    color: white;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.animated-div {
    animation: fadeIn 2s;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    padding: 10px;
    font-size: 16px;
    width: 100%;
    max-width: 300px;
}

input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #800000;
    color: #fff;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: black;
}
html {
  height: 100%;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  min-height: 100%;
  position: relative;
  padding-bottom: 2rem;
  margin: 0;
  padding: 0;
  text-align: left;
  width: 100%;
  background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

/*
 * Animated CSS button
 * Copyright Alexander Bodin 2019-09-07
 *
 * Useage: .class {@import button($button-size, $hue, $sat);}
 */
.animated-button {
  background: linear-gradient(-30deg, #0b1b3d 50%, #08142b 50%);
  padding: 10px 20px;
  margin: 12px;
  display: inline-block;
  -webkit-transform: translate(0%, 0%);
          transform: translate(0%, 0%);
  overflow: hidden;
  color: #d4e0f7;
  font-size: 10px;
  letter-spacing: 2.5px;
  text-align: center;
  text-transform: uppercase;
  text-decoration: none;
  -webkit-box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
          box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
}

.animated-button::before {
  content: '';
  position: absolute;
  top: 0px;
  left: 0px;
  width: 50%;
  height: 100%;
  background-color: #8592ad;
  opacity: 0;
  -webkit-transition: .2s opacity ease-in-out;
  transition: .2s opacity ease-in-out;
}

.animated-button:hover::before {
  opacity: 0.2;
}

.animated-button span {
  position: absolute;
}

.animated-button span:nth-child(1) {
  top: 0px;
  left: 0px;
  width: 50%;
  height: 2px;
  background: -webkit-gradient(linear, right top, left top, from(rgba(8, 20, 43, 0)), to(#2662d9));
  background: linear-gradient(to left, rgba(8, 20, 43, 0), #2662d9);
  -webkit-animation: 2s animateTop linear infinite;
          animation: 2s animateTop linear infinite;
}

@-webkit-keyframes animateTop {
  0% {
    -webkit-transform: translateX(100%);
            transform: translateX(100%);
  }
  100% {
    -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
  }
}

@keyframes animateTop {
  0% {
    -webkit-transform: translateX(100%);
            transform: translateX(100%);
  }
  100% {
    -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
  }
}

.animated-button span:nth-child(2) {
  top: 0px;
  right: 0px;
  height: 100%;
  width: 2px;
  background: -webkit-gradient(linear, left bottom, left top, from(rgba(8, 20, 43, 0)), to(#2662d9));
  background: linear-gradient(to top, rgba(8, 20, 43, 0), #2662d9);
  -webkit-animation: 2s animateRight linear -1s infinite;
          animation: 2s animateRight linear -1s infinite;
}

@-webkit-keyframes animateRight {
  0% {
    -webkit-transform: translateY(100%);
            transform: translateY(100%);
  }
  100% {
    -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
  }
}

@keyframes animateRight {
  0% {
    -webkit-transform: translateY(100%);
            transform: translateY(100%);
  }
  100% {
    -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
  }
}

.animated-button span:nth-child(3) {
  bottom: 0px;
  left: 0px;
  width: 100%;
  height: 2px;
  background: -webkit-gradient(linear, left top, right top, from(rgba(8, 20, 43, 0)), to(#2662d9));
  background: linear-gradient(to right, rgba(8, 20, 43, 0), #2662d9);
  -webkit-animation: 2s animateBottom linear infinite;
          animation: 2s animateBottom linear infinite;
}

@-webkit-keyframes animateBottom {
  0% {
    -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
  }
  100% {
    -webkit-transform: translateX(100%);
            transform: translateX(100%);
  }
}

@keyframes animateBottom {
  0% {
    -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
  }
  100% {
    -webkit-transform: translateX(100%);
            transform: translateX(100%);
  }
}

.animated-button span:nth-child(4) {
  top: 0px;
  left: 0px;
  height: 100%;
  width: 2px;
  background: -webkit-gradient(linear, left top, left bottom, from(rgba(8, 20, 43, 0)), to(#2662d9));
  background: linear-gradient(to bottom, rgba(8, 20, 43, 0), #2662d9);
  -webkit-animation: 2s animateLeft linear -1s infinite;
          animation: 2s animateLeft linear -1s infinite;
}

@-webkit-keyframes animateLeft {
  0% {
    -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
  }
  100% {
    -webkit-transform: translateY(100%);
            transform: translateY(100%);
  }
}

@keyframes animateLeft {
  0% {
    -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
  }
  100% {
    -webkit-transform: translateY(100%);
            transform: translateY(100%);
  }
}

.animated-button1 {
  background: linear-gradient(-30deg, #3d0b0b 50%, #2b0808 50%);
  padding: 10px 20px;
  margin: 12px;
  display: inline-block;
  -webkit-transform: translate(0%, 0%);
          transform: translate(0%, 0%);
  overflow: hidden;
  color: #f7d4d4;
  font-size: 13px;
  letter-spacing: 2.5px;
  text-align: center;
  text-transform: uppercase;
  text-decoration: none;
  -webkit-box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
          box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
}

.animated-button1::before {
  content: '';
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-color: #ad8585;
  opacity: 0;
  -webkit-transition: .2s opacity ease-in-out;
  transition: .2s opacity ease-in-out;
}

.animated-button1:hover::before {
  opacity: 0.2;
}

.animated-button1 span {
  position: absolute;
}

.animated-button1 span:nth-child(1) {
  top: 0px;
  left: 0px;
  width: 100%;
  height: 2px;
  background: -webkit-gradient(linear, right top, left top, from(rgba(43, 8, 8, 0)), to(#d92626));
  background: linear-gradient(to left, rgba(43, 8, 8, 0), #d92626);
  -webkit-animation: 2s animateTop linear infinite;
          animation: 2s animateTop linear infinite;
}

@keyframes animateTop {
  0% {
    -webkit-transform: translateX(100%);
            transform: translateX(100%);
  }
  100% {
    -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
  }
}

.animated-button1 span:nth-child(2) {
  top: 0px;
  right: 0px;
  height: 100%;
  width: 2px;
  background: -webkit-gradient(linear, left bottom, left top, from(rgba(43, 8, 8, 0)), to(#d92626));
  background: linear-gradient(to top, rgba(43, 8, 8, 0), #d92626);
  -webkit-animation: 2s animateRight linear -1s infinite;
          animation: 2s animateRight linear -1s infinite;
}

@keyframes animateRight {
  0% {
    -webkit-transform: translateY(100%);
            transform: translateY(100%);
  }
  100% {
    -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
  }
}

.animated-button1 span:nth-child(3) {
  bottom: 0px;
  left: 0px;
  width: 100%;
  height: 2px;
  background: -webkit-gradient(linear, left top, right top, from(rgba(43, 8, 8, 0)), to(#d92626));
  background: linear-gradient(to right, rgba(43, 8, 8, 0), #d92626);
  -webkit-animation: 2s animateBottom linear infinite;
          animation: 2s animateBottom linear infinite;
}

@keyframes animateBottom {
  0% {
    -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
  }
  100% {
    -webkit-transform: translateX(100%);
            transform: translateX(100%);
  }
}

.animated-button1 span:nth-child(4) {
  top: 0px;
  left: 0px;
  height: 100%;
  width: 2px;
  background: -webkit-gradient(linear, left top, left bottom, from(rgba(43, 8, 8, 0)), to(#d92626));
  background: linear-gradient(to bottom, rgba(43, 8, 8, 0), #d92626);
  -webkit-animation: 2s animateLeft linear -1s infinite;
          animation: 2s animateLeft linear -1s infinite;
}

@keyframes animateLeft {
  0% {
    -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
  }
  100% {
    -webkit-transform: translateY(100%);
            transform: translateY(100%);
  }
}
	</style>


</html>
