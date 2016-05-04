<?php
	session_start();
	if (isset($_POST['senha'])){
		$username = $_POST['user'];
		$senha = $_POST['senha'];
		
		if ($username == 'quiz' && $senha == 'quiz'){
			$_SESSION['login']='logado';
			header('Location: http://localhost/Trabalho1/index.php');
		}else{
			$status = 'Usuário ou senha incorreto! Tente novamente.';
		}
	}
?>
<html>
<head>
</head>

<body>
	<form method="POST" action='#'>
		<label>User</label> <input type="text" name="user"><br>
		<label>Senha</label> <input type="text" name="senha" ><br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
	<label><?php echo @$status;?></label>
</body>
</html>
