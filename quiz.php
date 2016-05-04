<?php
	require_once 'listar_perguntas.php';
	session_start();
	
	if (!isset($_SESSION['login'])){
		header('Location: http://localhost/Trabalho1/login.php');
	}
?>

<html>
<head>
  <title>Quiz</title>
	
	<script type="text/javascript">
	          function editarPergunta(numeroPergunta, pergunta, respostaCorreta, respostaIncorreta1, respostaIncorreta2){
				document.getElementById("pergunta").value = pergunta;
				document.getElementById("pergunta").focus();
				document.getElementById("pergunta").scrollIntoView();
				document.getElementById("form_pergunta").action = "editar_pergunta.php";
				document.getElementById("numero_pergunta").value = numeroPergunta;
				
				document.getElementById("resposta_correta").value = respostaCorreta;
				document.getElementById("resposta_incorreta1").value = respostaIncorreta1;
				document.getElementById("resposta_incorreta2").value = respostaIncorreta2;
	          }
	          function excluirPergunta(pergunta, respostaCorreta, respostaIncorreta1, respostaIncorreta2){
	        	document.getElementById("pergunta").value = pergunta;
				document.getElementById("resposta_correta").value = respostaCorreta;
				document.getElementById("resposta_incorreta1").value = respostaIncorreta1;
				document.getElementById("resposta_incorreta2").value = respostaIncorreta2;
	            document.getElementById("form_pergunta").action = "excluir_pergunta.php";
	        	document.getElementById("form_pergunta").submit();
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
			 function baixar_JSON(){
	 	        	document.getElementById("form_pergunta").action = "downloadFileJSON.php";
	 	        	document.getElementById("form_pergunta").submit();
			 }
			 
	         function exportarPerguntaJSON(pergunta, respostaCorreta, respostaIncorreta1, respostaIncorreta2){
	        	document.getElementById("pergunta").value = pergunta;
				document.getElementById("resposta_correta").value = respostaCorreta;
				document.getElementById("resposta_incorreta1").value = respostaIncorreta1;
				document.getElementById("resposta_incorreta2").value = respostaIncorreta2;
	            document.getElementById("form_pergunta").action = "exportarJSON.php";
	        	document.getElementById("form_pergunta").submit();
					        	
		     }

	         function exportarPerguntaXML(pergunta, respostaCorreta, respostaIncorreta1, respostaIncorreta2){
	        	 alert("to be done");
		     }
		     	
	          
	    </script>
	    
    	

</head>
<body>
    
   
	
	<div align="right">
		<form method="POST" action="logout.php">
			<input type="submit" name="log_out" value="logout">
		</form>
	</div>
	
	<h2 align="center">Quiz</h2>
	
	<?php 
		for ($index=0, $i=1; $index < count($perguntas) - 1; $index+=4, $i++):
	?>
	<div style="background-color:#E8E8E8  ; color:black; padding:20px; margin-left: 300px; margin-right: 300px">
	<h2>Pergunta <?php echo $i;?> </h2>
	  Pergunta: <?php echo $perguntas[$index];?>  <br>
	  Resposta correta:  <?php echo $perguntas[$index+1];?>  <br>
	  Resposta Errada 1: <?php echo $perguntas[$index+2];?>  <br>
	  Resposta Errada 2: <?php echo $perguntas[$index+3];?>  <br>
	 
	<button onclick="editarPergunta('<?php echo $index;?>','<?php echo $perguntas[$index];?>', '<?php echo $perguntas[$index+1];?>','<?php echo $perguntas[$index+2];?>', '<?php echo $perguntas[$index+3];?>')">Editar</button>
	<button onclick="excluirPergunta('<?php echo $perguntas[$index];?>', '<?php echo $perguntas[$index+1];?>','<?php echo $perguntas[$index+2];?>', '<?php echo $perguntas[$index+3];?>')">Excluir</button>
	<button onclick="exportarPerguntaJSON('<?php echo $perguntas[$index];?>', '<?php echo $perguntas[$index+1];?>','<?php echo $perguntas[$index+2];?>', '<?php echo $perguntas[$index+3];?>')">Exportar Para JSON</button>
	<button onclick="exportarPerguntaXML('<?php echo $perguntas[$index];?>', '<?php echo $perguntas[$index+1];?>','<?php echo $perguntas[$index+2];?>', '<?php echo $perguntas[$index+3];?>')">Exportar Para XML</button>
	
	</div> <br><br>
    <?php endfor;?>
	
	
	
	
	<div id="perguntas" align="center" onsubmit="return validateFormPergunta()"> 
		<form method="POST" action="salvar.php" id="form_pergunta">
		  Qual é a pergunta? <input type="text" name="pergunta" id="pergunta"><br>
		  Resposta correta: <input type="text" name="resposta_correta" id="resposta_correta"><br>
		  Resposta Errada 1: <input type="text" name="resposta_incorreta1" id="resposta_incorreta1"><br>
		  Resposta Errada 2: <input type="text" name="resposta_incorreta2" id="resposta_incorreta2"><br>
		  <input type="hidden" name="numero_pergunta" id="numero_pergunta">
		  <input type="submit" name="salvar" value="Salvar">
		</form>
	</div>
	 <div align="center">
		<form method="POST" action="index.php">
			<input type="submit" name="voltar" value="voltar">
		</form>
	</div>
	
	<?php 
    		if (isset($_GET['json_criado'])){
				echo "<script type=\"text/javascript\"> baixar_JSON();</script>";
			}
	?>
	

<body>
</html>