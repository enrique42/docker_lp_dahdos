<?php
/*
 *  Functions.php - Funções e Customizações básicas do WP - Enrique@Caleidosdev
 */

/*------------------------------------*\
  ARQUIVOS INCLUÍDOS
\*------------------------------------*/

include 'functions/a_scripts.php';
include 'functions/b_configs.php';
include 'functions/functions-front.php';

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
?>