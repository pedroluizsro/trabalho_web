<?php
include_once("includes/functions.php");


while(true){
	if (programaAtivo($ativo,$conexao) == 1) {		
		pegaProcessoTop($idProcessoTop);
			if (pegaLoad($load) > 1.0) {
				if($idProcessoTop){
					$ocorrencias = $ocorrencias + 1;
					echo $ocorrencias;
					if($ocorrencias == 3){
						echo pegaProcessoTop($idProcessoTop)."\n";
						$ocorrencias = null;
					}
				}
			}
	}else{
		echo "Desativado";
	}
	sleep(defineTempo($tempo,$conexao));
}


?>