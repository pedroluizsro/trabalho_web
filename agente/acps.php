<?php
include_once("includes/functions.php");


while(true){
	if (programaAtivo($ativo,$conexao) == 1) {
        if (pegaLoad($load) > 2.0) {
            $idProcessoTop = pegaProcessoTop();
            $nomeProcessoTop = str_replace("\n", "", pegaNomeProcessoTop());
            if($idProcessoTop){
                if(comparaExcecao($nome_processo = $nomeProcessoTop, $conexao) == 0){
                    echo "PID do Processo que foi finalizado: ".$idProcessoTop."\n";
                    echo "Nome do processo que foi finalizado: ".$nomeProcessoTop;
                    relatorioOcorrencia($nome_processo = $nomeProcessoTop,$conexao);
                    finalizaProcesso($pid = $idProcessoTop, $conexao);
                    var_dump($idProcessoTop);
                }
            }
        }
	}else{
		echo "Desativado";
	}
	sleep(defineTempo($tempo,$conexao));
}


?>