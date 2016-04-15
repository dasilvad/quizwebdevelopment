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
    
    
	<div align="right">
		<form method="POST" action="logout.php">
			<input type="submit" name="log_out" value="logout">
		</form>
	</div>
	
	<h2 align="center">Quiz</h2>
	<div style="background-color:#E8E8E8  ; color:black; padding:20px; margin-left: 300px; margin-right: 300px">
	
	<h2>Pergunta 1</h2>
	  Qual é a pergunta? <br>
	  Resposta correta:  <br>
	  Resposta Errada 1:  <br>
	  Resposta Errada 2:  <br>
	  <?php $pergunta = "la pregunta";?>
	<button onclick="editarPergunta('<?php echo $pergunta;?>')">Editar</button>
	<button onclick="excluirPergunta('<?php echo $pergunta;?>')">Excluir</button>

	
	</div> <br><br>
	
	
	<div style="background-color:#E8E8E8 ; color:black; padding:20px; margin-left: 300px; margin-right: 300px">
	
	<h2>Pergunta 1</h2>
	  Qual é a pergunta? <br>
	  Resposta correta:  <br>
	  Resposta Errada 1:  <br>
	  Resposta Errada 2:  <br>
	
	</div> <br><br>
	
	
	<div id="perguntas" align="center" onsubmit="return validateFormPergunta()"> 
		<form method="POST" action="salvar.php" id="form_pergunta">
		  Qual é a pergunta? <input type="text" name="pergunta" id="pergunta"><br>
		  Resposta correta: <input type="text" name="resposta_correta"><br>
		  Resposta Errada 1: <input type="text" name="resposta_incorreta1"><br>
		  Resposta Errada 2: <input type="text" name="resposta_incorreta2" ><br>
		  <input type="submit" name="salvar" value="Salvar">
		  <input type="submit" name="proxima_pergunta" value="Próxima Pergunta">
		</form>
	</div>
	
	
	<script type="text/javascript">
          function editarPergunta(msg){
			document.getElementById("pergunta").value = msg;
			document.getElementById("form_pergunta").action = "editar_pergunta.php";
          }
          function excluirPergunta(){
              //set elements in the form
              document.getElementById("form_pergunta").action = "excluir_pergunta.php";
        	  document.getElementById("form_pergunta").submit;
         }
          
         function validateFormPergunta(){
			var pergunta = document.forms["form_pergunta"]["pergunta"].value;
			var resposta_correta = document.forms["form_pergunta"]["resposta_correta"].value;
			var resposta_incorreta1 = document.forms["form_pergunta"]["resposta_incorreta1"].value;
			var resposta_incorreta2 = document.forms["form_pergunta"]["resposta_incorreta2"].value;
			
			if (pergunta == "" || pergunta == null || resposta_correta == "" || resposta_correta == null || 
				resposta_incorreta1 == "" || resposta_incorreta1 == null || resposta_incorreta2 == "" || resposta_incorreta2 == null){
				alert("Preencha todos os campos!");
				return false;
			}
         } 
          
    </script>
    

<body>
</html>