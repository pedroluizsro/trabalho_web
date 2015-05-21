<?php
	include_once("includes/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Página de configuração</title>
    <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<div id="draggable" style="height: auto; width: auto;">
    <div id="resizable" class="ui-widget-content" style="width: 800px; height: auto">
        <div id="tabs" class="ui-widget-content">
            <ul>
                <li><a href="#tabs-1">Configuração</a></li>
                <li><a href="#tabs-2">Processos</a></li>
                <li><a href="#tabs-3">Exceções</a></li>
            </ul>
            <div id="tabs-1">
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
                <form action="time.php" method="post">
                    Tempo entre cada scan: <input type="text" name="time" value="<?php echo verTime($time,$conexao); ?>" maxlength="2" size="2"> Segundos<br>
                    <input type="submit" value="Salvar">
                </form>
            </div>
            <div id="tabs-2">
                <p><?php echo relatorioOcorrencia($nome_processo = "teste2",$conexao); ?></p>
            </div>
            <div id="tabs-3">
                <p><?php echo comparaExcecao(); ?></p>
            </div>

            <br>
        </div>
    </div>
</div>
</body>
</html>