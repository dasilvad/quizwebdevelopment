<?php
	require_once 'conectar.php';
	session_start();
	
	if (!isset($_SESSION['login'])){
		header('Location: http://localhost/Trabalho1/login.php');
	}
?>
<html>
<head><title></title></head>

<body>
<form method="POST" action="logout.php">
	<input type="submit" name="log_out" value="logout">
</form>

<div id="perguntas">
Pergunta x<br><br>

<form method="POST" action="salvar.php">
  Qual é a pergunta? <input type="text" name="pergunta"><br>
  Resposta correta: <input type="text" name="resposta_correta"><br>
  Resposta Errada 1: <input type="text" name="resposta_incorreta1"><br>
  Resposta Errada 2: <input type="text" name="resposta_incorreta2" ><br>
  <input type="submit" name="salvar" value="Salvar">
  <input type="submit" name="proxima_pergunta" value="Próxima Pergunta">
</form>
</div>

<body>
</html>

