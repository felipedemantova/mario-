<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ceep.css">
    <title>Inscrição</title>
</head>

<?php
session_start();
include_once("conexao.php");
$cod_candidato = filter_input(INPUT_GET, 'cod_candidato', FILTER_SANITIZE_NUMBER_INT);
$result_carrouses = "SELECT * FROM candidato WHERE cod_candidato = '$cod_candidato'";
$resultado_carrouses = mysqli_query($conn, $result_carrouses);
$row_carrouses = mysqli_fetch_assoc($resultado_carrouses);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Lista - Candidato</title>		
	</head>
	<body>
	<a href="cadastroCandidatos.php" class="animated-button1">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Cadastrar
</a><a href="exibe_cadastro.php" class="animated-button1">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Listar
</a>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		
		<form method="POST" action="proc_edit_cadastro.php" enctype="multipart/form-data">
        <h1>Editar Candidato</h1>
        <div class="cod">
        <?php echo "Cadastro: "; ?>
		<?php echo $cod_candidato; ?>
		<?php echo "<br>" ?>
    </div>
			<input type="hidden" name="cod_candidato" value="<?php echo $row_carrouses['cod_candidato']; ?>">

            
            <fieldset class="rg">
<label>Nome: <input type="text" oninput="this.value = this.value.toUpperCase()" name="nome" value="<?php echo $row_carrouses['nome']; ?>"></label>

                <label>RG: <input oninput="this.value = this.value.toUpperCase()" required pattern="(^\d{1,2}).?(\d{3}).?(\d{3})-?(\d{1}|X|x$)" name="RG"
                        type="text" value="<?php echo $row_carrouses['RG']; ?>"></label>
                <label>Expedido por: <input oninput="this.value = this.value.toUpperCase()" required name="expedido_por" type="text" value="<?php echo $row_carrouses['expedido_por']; ?>"></label>
                <label>CPF: <input oninput="this.value = this.value.toUpperCase()" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" name="CPF" type="text" value="<?php echo $row_carrouses['CPF']; ?>"></label>
                <label>Data de nascimento: <input oninput="this.value = this.value.toUpperCase()" required name="datadenascimento" type="date-value" value="<?php echo $row_carrouses['datadenascimento']; ?>"></label>
                <label>N° de dependentes: <input oninput="this.value = this.value.toUpperCase()" required name="numero_dependentes" type="text" value="<?php echo $row_carrouses['numero_dependentes']; ?>"></label>
                <label>Bairro: <input oninput="this.value = this.value.toUpperCase()" required name="bairro" type="text" value="<?php echo $row_carrouses['bairro']; ?>"></label>
            </fieldset>

            <fieldset class="endereco">
                <label>Endereço: <input oninput="this.value = this.value.toUpperCase()" required name="endereco" type="text" value="<?php echo $row_carrouses['endereco']; ?>"></label>
                <label>N°: <input oninput="this.value = this.value.toUpperCase()" required name="numero" type="number" value="<?php echo $row_carrouses['numero']; ?>"></label>
                <label>Município: <input oninput="this.value = this.value.toUpperCase()" required name="municipio" type="text" value="<?php echo $row_carrouses['municipio']; ?>"></label>
                <label>UF: <input oninput="this.value = this.value.toUpperCase()" required name="uf" type="text" maxlength="2" value="<?php echo $row_carrouses['uf']; ?>"></label>
            </fieldset>

            <label>Fone: <input oninput="this.value = this.value.toUpperCase()" name="telefone" pattern="(^[0-9]{2})?(\s|-)?(9?[0-9]{4})-?([0-9]{4}$)"
                    type="tel" placeholder="43 99999-9999" value="<?php echo $row_carrouses['telefone']; ?>"></label>
            <label>Celular/WhatsApp: <input oninput="this.value = this.value.toUpperCase()" required name="celular"
                    pattern="(^[0-9]{2})?(\s|-)?(9?[0-9]{4})-?([0-9]{4}$)" type="tel" placeholder="43 99999-9999" value="<?php echo $row_carrouses['celular']; ?>"></label>
            <label>Telefone para recado: <input oninput="this.value = this.value.toUpperCase()" name="telefonepararecado"
                    pattern="(^[0-9]{2})?(\s|-)?(9?[0-9]{4})-?([0-9]{4}$)" type="tel" placeholder="43 99999-9999" value="<?php echo $row_carrouses['telefonepararecado']; ?>"></label>
            <label>Nome para recado: <input oninput="this.value = this.value.toUpperCase()" name="nomepararecado" type="text" value="<?php echo $row_carrouses['nomepararecado']; ?>"></label>

            <label>Email: <input type="email" name="email" value="<?php echo $row_carrouses['email']; ?>"></label>
			<br><br>
												
			<input type="submit" value="Editar">
		</form>
	</body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 0;
}
html {
  height: 100%;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  min-height: 100%;
  position: relative;
  padding-bottom: 3rem;
  margin: 0;
  padding: 0;
  text-align: left;
  width: 100%;
  background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.animated-button {
  background: linear-gradient(-30deg, #0b1b3d 50%, #08142b 50%);
  padding: 20px 40px;
  margin: 12px;
  display: inline-block;
  -webkit-transform: translate(0%, 0%);
          transform: translate(0%, 0%);
  overflow: hidden;
  color: #d4e0f7;
  font-size: 20px;
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
  width: 100%;
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
  width: 100%;
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
h1 {
    color: #333;
    text-align: center;
}

form {
    background-color: #fff;
    padding: 20px;
    max-width: 600px;
    margin: 20px auto;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"], input[type="email"], input[type="tel"], input[type="date"], select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #800000;
    color: white;
    padding: 14px 20px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: black;
}

fieldset {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
}

label {
    display: block;
    margin: 10px 0;
}

.rg, .endereco {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
    </style>
</html>