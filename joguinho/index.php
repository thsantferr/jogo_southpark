<?php
	include_once('config.php');
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" href="css/style.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" />
<title>Entrada de South Park</title>
<script language="javascript">
	function validaform() {	
	atalho = document.form1
	if(atalho.nome.value == "" ){
		alert("Assim você me ferra")
		atalho.nome.focus();
		return false;
	}
	}
</script>
</head>
<div id="principal">
<header>
</header>
<body class=" font pginicio">
<form id="form1" name="form1" method="post" action="jogo.php" onSubmit="return validaform(); "  >
  <p>
    <label for="textfield">Antes de tudo, qual seu nome ou apelido:</label>
  </p>
    <p>
    <input name="nome" type="text"  required="required" id="nome" class="font" autofocus>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="COMEÇAR" class="font alinhamento"  >
  </p>
</form>
</div>
</body>
</html>