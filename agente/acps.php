<?php
include_once("includes/functions.php");


while(true){
	if (programaAtivo($ativo,$conexao) == 1) {
        if (pegaLoad($load) > 1.0) {
            $idProcessoTop = pegaProcessoTop();
            $nomeProcessoTop = pegaNomeProcessoTop();
            if($idProcessoTop){
                echo $idProcessoTop."\n";
                relatorioOcorrencia($nome_processo = $nomeProcessoTop,$conexao);
                echo $nomeProcessoTop;
            }
        }

	}else{
		echo "Desativado";
	}
	sleep(defineTempo($tempo,$conexao));
}


?>