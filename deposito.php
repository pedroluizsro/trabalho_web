<?php

### ABERTURA DE CONEXÃO ###
	//Função 'include' inclui conteúdo de outro arquivo PHP;
	include "conexao.abre.php";
###########################


### VARIÁVEIS ###
	//Método POST para pegar informações do formulário em HTML;
	//$_POST['conta'] <= 'conta' é o name do input do formulário;
	$conta = $_POST['conta'];
	$senha = $_POST['senha'];
	$deposito = $_POST['deposito'];

	//Executa consulta por conta;
	$sqlConta = "SELECT `conta` FROM `contas`";
	$sqlContaExec = mysql_query($sqlConta, $conexao);

	//Verifica existência da conta;
	while ($sqlContaResult = mysql_fetch_array($sqlContaExec)) {
		if ($conta == $sqlContaResult[conta]) {

			//Executa colsulta de senha;
			$sqlSenha = "SELECT `senha` FROM `contas` WHERE `conta`=$conta";
			$sqlSenhaExec = mysql_query($sqlSenha, $conexao);
			$sqlSenhaResult = mysql_fetch_array($sqlSenhaExec);

			//Verificação de senhas;
			if ($senha == $sqlSenhaResult[senha]) {
				
				//Executa a consulta na conta;
				$sqlSaldo = "SELECT `saldo` FROM `contas` WHERE `conta`=$conta";
				$sqlSaldoExec = mysql_query($sqlSaldo, $conexao);
				$sqlSaldoResult = mysql_fetch_array($sqlSaldoExec);
				//Operação de saque;

				$depositoNew = $sqlSaldoResult[saldo] + $deposito;
				$sqlDeposito = "UPDATE `contas` SET `saldo`=$depositoNew  WHERE `conta`=$conta";
				mysql_query($sqlDeposito, $conexao);
				echo "Você realizou um depósito no valor de ".$deposito." R$ na conta ".$conta."<br>";
				echo "<a href='index.php'>Voltar para o Inicio</a><br>";
				$contaExistiu = 1;

			} else {
				
				echo "Senha incorreta!<br>";
				echo "<a href='index.php'>Voltar para o Inicio</a><br>";
				$contaExistiu = 1;
			}
		}
	}
	if ($contaExistiu != 1) {
		echo "A conta informada não existe<br>";
		echo "<a href='index.php'>Voltar para o Inicio</a><br>";
	}
#################


### FECHAMENTO DE CONEXÃO ###
	include "conexao.fecha.php";
#############################

?>