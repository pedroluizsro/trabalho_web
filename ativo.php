<?php
include_once("includes/functions.php");

$status = $_POST['ativo'];
trocarStatus($status,$conexao);
echo("teste gip");
Header("Location: index.php");

?>