<?php
	session_start();
	$perguntas = $_SESSION['perguntas_temp'];
	$perguntas = explode("#", $perguntas);

?>