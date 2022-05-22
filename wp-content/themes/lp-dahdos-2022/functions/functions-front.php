<?php

/*------------------------------------*\
  FUNÇÕES USADAS NO FRONT
\*------------------------------------*/


/**
* Função get_slug
* @param id - aceita um id de um tipo_produto
* @return o slug do post
**/

function get_slug($id) {
    $post_data = get_post($id, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}

/**
* Função url_slug
* @param title - aceita uma string, slug de uma página
* @return o permalink dessa página
**/

function url_slug( $title ) {

    // Initialize the permalink value
    $permalink = null;
	$page = get_page_by_path( strtolower( $title ) );
	if (function_exists('pll_current_language')) {
		$lingua = pll_current_language();
	}

    if (function_exists('pll_get_post_translations')) {
		// If the page exists, then let's get its permalink
		if( null != $page ) {
			if ($lingua == 'pt') {
			$permalink = get_permalink( $page->ID );
			} else {
			$linguas = pll_get_post_translations($page->ID) ?: [];
			$permalink = array_key_exists($lingua, $linguas) ? get_permalink($linguas[$lingua]) : get_permalink( $page->ID );
			}   
		}
	} else {
		// If the page exists, then let's get its permalink
		if( null != $page ) {
			$permalink = get_permalink( $page->ID );
		} // end if
	}

    return $permalink;
}

function id_slug( $title ) { 
	$pid = null;
	$page = get_page_by_path( strtolower( $title ) );
	if (function_exists('pll_current_language')) {
		$lingua = pll_current_language();
	}

	if (function_exists('pll_get_post_translations')) {
		// If the page exists, then let's get its permalink
		if( null != $page ) {
			if ($lingua == 'pt') {
				$pid = $page->ID;
			} else {
				$linguas = pll_get_post_translations($page->ID) ?: [];
				$pid = array_key_exists($lingua, $linguas) ? $linguas[$lingua] : $page->ID;
			}   
		}

	} else {
		// If the page exists, then let's get its permalink
		if( null != $page ) {
			$pid = $page->ID;
		} // end if
	}
	
	return $pid;
}


function simple_md($field){
  $field = str_replace(PHP_EOL, '', $field); // só para quando tem br
  $field = preg_replace('/\*\*\*(.*?)\*\*\*/', '<strong><span>$1</span></strong>', $field);
  $field = preg_replace('/\*\*(.*?)\*\*/', '<span>$1</span>', $field);
  $field = preg_replace('/\*(.*?)\*/', '<strong>$1</strong>', $field);
  $field = preg_replace('/\#(.*?)\#/', '<sub>$1</sub>', $field);
  return $field;
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );