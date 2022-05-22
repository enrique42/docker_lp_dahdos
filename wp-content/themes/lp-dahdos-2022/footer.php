	</main>

	<footer class='section footer'>
		<?php $idhome = id_slug('home'); ?>
		<div class='container'>
			<div class="lf aic jcsb">
				<div class="coluna-logo">
					<a href="" class="logo"><img src='<?php echo get_template_directory_uri(); ?>/img/logo-dahdos-rodape.svg' alt=''></a>
				</div>

				<div class="coluna-mapa">
					<?php if (get_field('mostrar_agendamento', $idhome)) { ?>
					<a href="#agende" class="botao bg-bege">
						<span><?php the_field('menu_agende', $idhome) ?></span>
						<div class="hexagono">
							<?php echo get_template_part('img/hex', 'base'); ?>
							<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-agende.svg' alt=''></div>
						</div>
					</a>
					<?php } ?>

					<ul class="mapa-site">
						<?php if (get_field('mostrar_plataforma', $idhome)) { ?>
							<li><a href="#plataforma"><?php the_field('menu_plataforma', $idhome) ?></a></li>
						<?php } ?>
						<?php if (get_field('mostrar_porque', $idhome)) { ?>
							<li><a href="#porque"><?php the_field('menu_porque', $idhome) ?></a></li>
						<?php } ?>
						<?php if (get_field('mostrar_faq', $idhome)) { ?>
							<li><a href="#faq"><?php the_field('menu_faq', $idhome) ?></a></li>
						<?php } ?>
						<?php foreach(get_field('rodape_links', $idhome)?:[] as $cada) { ?>
							<li><a href="<?php echo esc_url($cada['link']) ?>"><?php echo $cada['texto'] ?></a></li>
						<?php } ?>
					</ul>	

					<div class="disclaimer"><?php the_field('rodape_informacoes', $idhome) ?></div>
				</div>

				<div class="coluna-final">
					<a href="#main" class="voltar">
						<span><?php the_field('botao_voltar', $idhome) ?></span> 
						<div class="hexagono">
							<?php echo get_template_part('img/hex', 'base'); ?>
							<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-up.svg' alt=''></div>
						</div>
					</a>
					<div class="parceria">
					<?php foreach(get_field('rodape_logos')?:[] as $cada) { ?>
						<a target="_blank" href="<?php echo esc_url($cada['link']) ?>" class="parc"><img src='<?php echo $cada['logo'] ?>' alt=''></a>
					<?php } ?> 
					</div>
				</div>
			</div>					
		</div>
	</footer>

    <?php wp_footer(); ?>
        
	</body>
</html>