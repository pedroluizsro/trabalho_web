# trabalho_web
trabalho_web

ACPS(Aumatic Control Proccess System)

Sistema que controlar� a utiliza��o de recursos do servidor. Quando o servidor tiver excedido um n�vel prejudicial de seus recursos, o sistema buscar� o processo ou servi�o no qual est� prejudicando o servidor e ir� recicla-lo ou finaliza-lo. A forma como foi realizado a a��o contra o processo ser� mantida em relat�rios no banco de dados.


- Relat�rios de A��o
	- Identifica��o da A��o; # ID
	- Tipo de a��o; # Processo finalizado ou reiniciado;
	- Hora da a��o;	# Hor�rio em que ocorreu a a��o;
	- Alvo da a��o; # Processo que foi finalizado ou reiniciado;

- Relat�rios de Ocorr�ncias
	- Identifica��o da ocorr�ncias;
	- Nome do processo;
	- Quantidade de ocorr�ncias;

- Exce��es
	- Identifica��o da exce��o;
	- Nome do Processo;

- Servidor
	- Carga do servidor;
	- Uso de mem�ria;
	- Uptime;


Exemplifica��o:

while(true){
	sleep(20); // Processo parado;

	//Capturar dados do servidor.
		//Carga - "/proc/loadavg"
		//Processo mais utilizado - "ps -eo pid --sort pcpu"
		//Comando utilizando excessivamente do processador - "ps -eo cmd --sort pcpu"
		//
}

*Adicionar exce��es atrav�s das ocorr�ncias;