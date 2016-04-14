<?php
	session_start();
	if (isset($_POST['log_out'])){
		session_destroy();
		header('Location: http://localhost/Trabalho1/quiz.php');
	}
	