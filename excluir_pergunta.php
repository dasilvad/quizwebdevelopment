<?php
session_start();

$data= $_SESSION['perguntas_temp'];

$pergunta = $_POST['pergunta'];
$resposta_correta = $_POST['resposta_correta'];
$resposta_incorreta1 = $_POST['resposta_incorreta1'];
$resposta_incorreta2 = $_POST['resposta_incorreta2'];

$remove = $pergunta."#".$resposta_correta."#".$resposta_incorreta1."#".$resposta_incorreta2."#";

$substituir = "";
$novas_perguntas = str_replace($remove,$substituir,$data);
$_SESSION['perguntas_temp'] = $novas_perguntas;
header('Location: http://localhost/Trabalho1/quiz.php');

