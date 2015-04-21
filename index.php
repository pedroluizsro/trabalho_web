<?php
	include_once("includes/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Página de configuração</title>
</head>
<body>
	<form method="POST" action="ativo.php">
		Status do programa: <?php echo verStatus($ativo,$conexao); ?>
		<?php
			if (verStatus($ativo,$conexao) == "Ligado") {
				echo "<input type=\"hidden\" name=\"ativo\" value=\"0\">";
				echo "<input type=\"submit\" value=\"Desligar\">";
			}else{
				echo "<input type=\"hidden\" name=\"ativo\" value=\"1\">";
				echo "<input type=\"submit\" value=\"Ligar\">";
			}
		?>
	</form>
	
	<br>

	<form>
		Tempo entre cada scan: <input type="text" name="time" maxlength="1" size="2"> Segundos<br>
		<input type="submit" value="Salvar">
	</form>
</body>
</html>