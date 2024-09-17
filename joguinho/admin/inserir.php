<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" href="../css/style.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" />
</head>
<body class="font paginsert">
	<p>&nbsp;</p>
    <p>&nbsp;</p>
<form name="form1" id="form1" action="inseri.php" method="post" class="text-center">
   	
    <p>
      <label for="textfield" style=" font-size: 5vh;">Pergunta:</label>
      <input type="text" maxlength="900" size="30px" name="pergunta" id="pergunta" class="font"  required>
    </p>
    <p>
	  <label for="textfield">Respostas:</label>
      <br />
      <label>
        <input type="radio" name="resp" value="resp1" id="resp" required>
 		<input type="text" maxlength="150" size="20px" name="resp1" id="resp1" class="font" required> 
      </label>
      <br />
      <br />
      <label>
        <input type="radio" name="resp" value="resp2" id="resp" required>
	    <input type="text" maxlength="150" size="20px" name="resp2" id="resp2" class="font" required>
       </label>
       <br />
       <br />
      <label>
        <input type="radio" name="resp" value="resp3" id="resp" required>
      	<input type="text" maxlength="150" size="20px" name="resp3" id="resp3" class="font" required>
      </label>
       <br />
       <br />
      <label>
        <input type="radio" name="resp" value="resp4" id="resp" required >
        <input type="text" maxlength="150" size="20px" name="resp4" id="resp4" class="font" required>
      </label>
    </p>
    <p>
      <input type="submit" value="Cadastrar" id="submit" name="submit" onClick="javascript: return verificar();" class=" font"  /> 
      &nbsp;
    <a href="paglogin.php" >Voltar</a> </p>
</form>
</body>
	<script language="javascript">
		function verificar(){
				atalho = document.form1;
				if(atalho.resp[0].checked == false && atalho.resp[1].checked == false && atalho.resp[2].checked == false && atalho.resp[3].checked == false ){ 
					alert("Selecione um das opções"); 
					atalho.resp.focus(); 
					return false;}
				if(atalho.pergunta.value == "" ){
					alert("Assim você me ferra")
					atalho.pergunta.focus();
					return false;}
				<?php
					for($i = 1; $i <= 4; $i ++){
						echo 'if(atalho.resp' . $i . '.value == "" ){';
						echo 'alert("Assim você me ferra")';
						echo 'atalho.resp' . $i . '.focus();';
						echo 'return false;';
						echo '}';
					}
				?>
		
    </script>
</html>