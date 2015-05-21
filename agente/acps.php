<?php
include_once("includes/functions.php");


while(true){
	if (programaAtivo($ativo,$conexao) == 1) {
        if (pegaLoad($load) > 1.0) {
            $idProcessoTop = pegaProcessoTop();
            $nomeProcessoTop = str_replace("\n", "", pegaNomeProcessoTop());
            if($idProcessoTop){
                if(comparaExcecao($nome_processo = $nomeProcessoTop, $conexao) == 0){
                    echo $idProcessoTop."\n";
                    relatorioOcorrencia($nome_processo = $nomeProcessoTop,$conexao);
                    echo $nomeProcessoTop;
                }
            }
        }
	}else{
		echo "Desativado";
	}
	sleep(defineTempo($tempo,$conexao));
}


?>