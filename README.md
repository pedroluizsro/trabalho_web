# trabalho_web
trabalho_web

ACPS(Aumatic Control Proccess System)

Sistema que controlará a utilização de recursos do servidor. Quando o servidor tiver excedido um nível prejudicial de seus recursos, o sistema buscará o processo ou serviço no qual está prejudicando o servidor e irá recicla-lo ou finaliza-lo. A forma como foi realizado a ação contra o processo será mantida em relatórios no banco de dados.


- Relatórios de Ação
	- Identificação da Ação; # ID
	- Tipo de ação; # Processo finalizado ou reiniciado;
	- Hora da ação;	# Horário em que ocorreu a ação;
	- Alvo da ação; # Processo que foi finalizado ou reiniciado;

- Relatórios de Ocorrências
	- Identificação da ocorrências;
	- Nome do processo;
	- Quantidade de ocorrências;

- Exceções
	- Identificação da exceção;
	- Nome do Processo;

- Servidor
	- Carga do servidor;
	- Uso de memória;
	- Uptime;


Exemplificação:

while(true){
	sleep(20); // Processo parado;

	//Capturar dados do servidor.
		//Carga - "/proc/loadavg"
		//Processo mais utilizado - "ps -eo pid --sort pcpu"
		//Comando utilizando excessivamente do processador - "ps -eo cmd --sort pcpu"
		//
}

*Adicionar exceções através das ocorrências;