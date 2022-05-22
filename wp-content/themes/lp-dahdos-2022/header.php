<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<?php get_template_part('modulos/header','meta'); ?>

		<link rel="stylesheet" href="https://use.typekit.net/pex5yvs.css">
		
		<?php wp_head(); ?>
		<link rel="preload" as="image" href='<?php echo get_template_directory_uri(); ?>/img/dahdos-logo-a.svg'>
		<link rel="preload" as="image" href='<?php echo get_template_directory_uri(); ?>/img/dahdos-logo-b.svg'>
		<link rel="preload" as="image" href='<?php echo get_template_directory_uri(); ?>/img/dahdos-logo-c.svg'>
		<link rel="preload" as="image" href='<?php echo get_template_directory_uri(); ?>/img/dahdos-logo-d.svg'>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php 
		//Inicializações básicas para o header
		$current_user = wp_get_current_user();
		$userid = get_current_user_id();
		$pageid = get_queried_object_id();
		date_default_timezone_set("America/Sao_Paulo");
		setlocale(LC_TIME, 'ptb', 'pt_BR', 'portuguese-brazil', 'bra', 'brazil', 'pt_BR.utf-8', 'pt_BR.iso-8859-1', 'br');
	?>


	<?php //echo get_template_part('modulos/guia', 'colunas'); ?>

	<?php $idhome = id_slug('home'); ?>
	<header class="section section-header fativo">
		<div class="centraliza-header">
			<div class="bloco-header">			
				<?php if (get_field('mostrar_plataforma', $idhome)) { ?>
					<a href="#plataforma"><?php the_field('menu_plataforma', $idhome) ?></a>
				<?php } ?>
				<?php if (get_field('mostrar_porque', $idhome)) { ?>
					<a href="#porque"><?php the_field('menu_porque', $idhome) ?></a>
				<?php } ?>
				<?php if (get_field('mostrar_faq', $idhome)) { ?>
					<a href="#faq"><?php the_field('menu_faq', $idhome) ?></a>
				<?php } ?>
				<?php if (get_field('mostrar_agendamento', $idhome)) { ?>
				<a href="#agende" class="botao bg-bege">
					<span><?php the_field('menu_agende', $idhome) ?></span>
					<div class="hexagono">
						<?php echo get_template_part('img/hex', 'base'); ?>
						<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-agende.svg' alt=''></div>
					</div>
				</a>
				<?php } ?>

				<a href="" class="js-menu-mob fechar"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-fecha-mob.svg' alt=''></a>
			</div>
		</div>
	</header>

	<a href="" class="burger js-menu-mob"><img src='<?php echo get_template_directory_uri(); ?>/img/hamburguer.svg' alt=''></a>

	<main class="site-content" id="main">	

