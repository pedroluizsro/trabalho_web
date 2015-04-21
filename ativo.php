<?php
include_once("includes/functions.php");

$status = $_POST['ativo'];
trocarStatus($status,$conexao);

Header("Location: index.php");

?>