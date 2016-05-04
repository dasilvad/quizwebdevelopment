<?php
session_start();

//validacao dos dados e' feito no cliente
$pergunta = $_POST['pergunta'];
$resposta_correta = $_POST['resposta_correta'];
$resposta_incorreta1 = $_POST['resposta_incorreta1'];
$resposta_incorreta2 = $_POST['resposta_incorreta2'];

if (isset($_POST['salvar'])){//submit button
	$_SESSION['perguntas_temp'] = $_SESSION['perguntas_temp'].$pergunta."#".$resposta_correta."#".$resposta_incorreta1."#".$resposta_incorreta2."#";
	
	header('Location: http://localhost/Trabalho1/quiz.php');
}

?>