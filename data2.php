<?php 
$has = ceil($_GET['total']);
$rest = 10 - substr($has,-1);
$has = $has + $rest;

echo $has;
?>