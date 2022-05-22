<?php get_header(); ?>
<?php if ( have_posts() ) {	while ( have_posts() ) { the_post(); ?>

<div class='section pagina-main'>
	<div class='container'>
		<div class="lf aifs jcfs">
			<div class="coluna-10 config-post">
				<h1 class="titulo-main mb4"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php } } ?>
<?php get_footer(); ?>