<?php /* Template Name: Home */ get_header(); ?>
<?php if ( have_posts() ) {	while ( have_posts() ) { the_post(); ?>

<div class='section lp-capa'>
	<div class="container-logo">
		<div class="lf aifs jcc">
			<div class="logo-bg"></div>
		</div>
	</div>
	<div class='container abertura'>
		<div class="lf aic jcc">
			<div class="coluna-10">
				<h1 class="titulo-sub"><?php echo simple_md(get_field('capa_subtitulo')) ?></h1>	

				<div class="alinha-botao">
					<a href="#intro" class="link-down">
						<div class="hexagono">
							<?php echo get_template_part('img/hex', 'base2'); ?>
							<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-down.svg' alt=''></div>
						</div>
					</a>
				</div>
			</div>
		</div>		
	</div>

	<?php if (get_field('mostrar_introducao')) { ?>

	<div class="container introducao observe-me" id="intro">
		<div class="coluna-10 bloco-texto config-texto">
			<h2 class="titulo t1"><?php echo simple_md(get_field('introducao_titulo')) ?></h2>
			<h2 class="titulo t2"><?php echo simple_md(get_field('introducao_titulo_2')) ?></h2>
			<div class="col-texto">
				<?php the_field('introducao_texto') ?>
			</div>

			<?php if (get_field('mostrar_agendamento')) { ?>
			<div class="alinha-botao">
				<a href="#agende" class="botao bg-roxo">
					<span><?php the_field('menu_agende') ?></span>
					<div class="hexagono">
						<?php echo get_template_part('img/hex', 'base2'); ?>
						<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-agende.svg' alt=''></div>
					</div>
				</a>
			</div>
			<?php } ?>
		</div>
		
	</div>

	<?php } ?>
</div>

<?php if (get_field('mostrar_plataforma')) { ?>

<div class='section lp-telas' id="plataforma">
	<div class='container'>
		<h2 class="titulo"><?php echo simple_md(get_field('plataforma_titulo')) ?></h2>
		<div class="desc"><?php the_field('plataforma_texto') ?></div>

		<div class="bloco-slideshow bloco-slideshow-telas">
			<div class="a-prev"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-right.svg' alt=''></div>
			<div class="a-next"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-right.svg' alt=''></div>
			<div class="slideshow-telas">
				<?php foreach(get_field('plataforma_carrossel')?:[] as $cada) { ?>
				<div class="slide-tela">
					<div class="inside-tela">
						<div class="frase"><p><?php echo simple_md($cada['texto']) ?></p></div>
						<div class="tela">
							<div class="box-branco">
								<?php if ($cada['arte']) { ?>
								<img src='<?php echo $cada['arte'] ?>' alt=''>
								<?php } ?>
							</div>
							<div class="hexagono">
								<?php echo get_template_part('img/hex', 'base2'); ?>
								<div class="icone"><?php echo $cada['numero'] ?></div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_processo')) { ?>

<div class='section lp-processo'>
	<div class='container'>
		<div class="centra">
			<h2 class="titulo t1"><?php echo simple_md(get_field('processo_titulo')) ?></h2>
			<h2 class="titulo t2"><?php echo simple_md(get_field('processo_titulo_2')) ?></h2>
		</div>
		<div class="desc"><?php the_field('processo_texto') ?></div>

		<h3 class="titulo-processo"><?php echo simple_md(get_field('processo_chamada')) ?></h3>

		<div class="cards-processo">
			<?php foreach(array_reverse(get_field('processo_camadas')?:[]) as $ordem=>$cada) { $svgs = ['tempo','diagn','paper','base']; ?>
			<div class="card-processo">
				<div class="in-hexagono">
					<?php echo get_template_part('img/hex', 'base2'); ?>
					<div class="inside">
						<div class="centro">
							<small><?php echo $cada['label'] ?></small>
							<?php echo get_template_part('img/ico', $svgs[$ordem%4]); ?>
							<h4><?php echo simple_md($cada['titulo']) ?></h4>
							<span><?php echo simple_md($cada['subtitulo']) ?></span>
						</div>
					</div>
				</div>
				<div class="barra"></div>
				<div class="texto-explicacao">
					<?php echo $cada['descricao'] ?>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="bloco-slideshow-processo bloco-slideshow">
			<div class="a-prev"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-right-roxo.svg' alt=''></div>
			<div class="a-next"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-right-roxo.svg' alt=''></div>
			<div class="slideshow-processo">
				<?php foreach(array_reverse(get_field('processo_camadas')?:[]) as $ordem=>$cada) { $svgs = ['tempo','diagn','paper','base']; ?>
				<div class="slide-processo">
					<div class="card-processo ativo">
						<div class="in-hexagono">
							<?php echo get_template_part('img/hex', 'base2'); ?>
							<div class="inside">
								<div class="centro">
									<small><?php echo $cada['label'] ?></small>
									<?php echo get_template_part('img/ico', $svgs[$ordem%4]); ?>
									<h4><?php echo simple_md($cada['titulo']) ?></h4>
									<span><?php echo simple_md($cada['subtitulo']) ?></span>
								</div>
							</div>
						</div>
						<div class="barra"></div>
						<div class="texto-explicacao">
							<?php echo $cada['descricao'] ?>
						</div>
					</div>
				</div>
				<?php } ?>	
			</div>	
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_clientes')) { ?>

<div class='section lp-parceiros'>
	<div class='container'>
		<div class="lf aic jcc">
			<div class="coluna-12">
				<h2 class="titulo"><?php echo simple_md(get_field('clientes_titulo')) ?></h2>
		
				<ul class="grid-logos">
					<?php foreach(get_field('clientes_logos')?:[] as $cada) { ?>
					<li><a target="_blank" href="<?php echo esc_url($cada['link']) ?>"><img src='<?php echo $cada['logo'] ?>' alt=''></a></li>
					<?php } ?> 
				</ul>
			</div>
		</div>		
	</div>
	<div class="fundo-cam-1"></div>
	<div class="fundo-cam-2"></div>
</div>

<?php } ?>

<?php if (get_field('mostrar_indicadores')) { ?>

<?php $indicadores = get_field('indicadores'); $ind1 = $indicadores[0]; $ind2 = $indicadores[1]; $ind3 = $indicadores[2];?>

<div class='section lp-indicadores observe-indica'>
	<div class='container'>
		<div class="lf aic jcsb">
			<div class="coluna-6">
				<h2 class="titulo"><?php echo simple_md(get_field('indicadores_titulo')) ?></h2>
			</div>

			<div class="grid-indicadores">
				<div class="indica ind-l1-c1">
					<div class="inside">
						<div class="circulo"></div>
					</div>
				</div>
				<div class="indica ind-l1-c2">
					<div class="inside">
						<div class="circulo"></div>
					</div>
				</div>
				<div class="indica preenchida ind-l1-c3">
					<div class="inside">
						<div class="circulo">
							<span><?php echo simple_md($ind1['numero']) ?></span>
							<div><?php echo $ind1['descricao'] ?></div>
						</div>
					</div>
				</div>
				<div class="indica ind-l2-c1">
					<div class="inside">
						<div class="circulo"></div>
					</div>
				</div>
				<div class="indica preenchida ind-l2-c2">
					<div class="inside">
						<div class="circulo">
							<span><?php echo simple_md($ind2['numero']) ?></span>
							<div><?php echo $ind2['descricao'] ?></div>
						</div>
					</div>
				</div>
				<div class="indica ind-l2-c3">
					<div class="inside">
						<div class="circulo"></div>
					</div>
				</div>
				<div class="indica ind-l3-c1">
					<div class="inside">
						<div class="circulo"></div>
					</div>
				</div>
				<div class="indica ind-l3-c2">
					<div class="inside">
						<div class="circulo"></div>
					</div>
				</div>
				<div class="indica preenchida ind-l3-c3">
					<div class="inside">
						<div class="circulo">
							<span><?php echo simple_md($ind3['numero']) ?></span>
							<div><?php echo $ind3['descricao'] ?></div>
						</div>
					</div>
				</div>
				<div class="linha-cima">
					<?php for ($i = 1; $i <= 5; $i++) { ?>
					<div class="indica"><div class="inside"><div class="circulo"></div></div></div>
					<?php } ?>
				</div>
				<div class="linha-baixo">
					<?php for ($i = 1; $i <= 5; $i++) { ?>
					<div class="indica"><div class="inside"><div class="circulo"></div></div></div>
					<?php } ?>
				</div>
				<div class="linha-lado">
					<?php for ($i = 1; $i <= 3; $i++) { ?>
					<div class="indica"><div class="inside"><div class="circulo"></div></div></div>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="grid-indicadores-mobile">
			<div class="inside">
				<div class="circulo">
					<span><?php echo simple_md($ind1['numero']) ?></span>
					<div><?php echo $ind1['descricao'] ?></div>
				</div>
			</div>

			<div class="inside">
				<div class="circulo">
					<span><?php echo simple_md($ind2['numero']) ?></span>
					<div><?php echo $ind2['descricao'] ?></div>
				</div>
			</div>

			<div class="inside">
				<div class="circulo">
					<span><?php echo simple_md($ind3['numero']) ?></span>
					<div><?php echo $ind3['descricao'] ?></div>
				</div>
			</div>

			<div class="arte-bg">
				<div class="circulo"></diV>	
				<div class="spacer"></div>
				<div class="circulo"></diV>
				<div class="circulo"></diV>
				<div class="spacer"></div>
				<div class="circulo"></diV>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_porque')) { ?>

<div class='section lp-porquedahdos' id="porque">
	<div class='container'>
		<h2 class="titulo"><?php the_field('porque_titulo'); ?></h2>
		<div class="desc"><?php the_field('porque_texto'); ?></div>

		<div class="bloco-grid-colmeia">

		<div class="grid-colmeia">
			<div class="item-colmeia nomob"><?php echo get_template_part('img/hex', 'linha'); ?></div>
			<?php if( have_rows('colmeia_linha_1') ): ?>
			<?php while( have_rows('colmeia_linha_1') ): the_row(); ?>
			<div class="item-colmeia comhover">
				<?php echo get_template_part('img/hex', 'linha'); ?>
				<div class="texto"><div><?php echo simple_md(get_sub_field('texto')) ?></div></div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<div class="item-colmeia nomob"></div>
			<div class="item-colmeia nomob"><?php echo get_template_part('img/hex', 'linha'); ?></div>
		</div>
		<div class="grid-colmeia colmeia-2">
			<div class="item-colmeia nomob"><?php echo get_template_part('img/hex', 'linha'); ?></div>
			<div class="item-colmeia nomob"></div>
			<?php if( have_rows('colmeia_linha_2') ): ?>
			<?php while( have_rows('colmeia_linha_2') ): the_row(); ?>
			<div class="item-colmeia comhover">
				<?php echo get_template_part('img/hex', 'linha'); ?>
				<div class="texto"><div><?php echo simple_md(get_sub_field('texto')) ?></div></div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<div class="item-colmeia nomob"><?php echo get_template_part('img/hex', 'linha'); ?></div>
			<div class="item-colmeia nomob"><?php echo get_template_part('img/hex', 'linha'); ?></div>
		</div>

		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_tradicao')) { ?>

<div class='section lp-parceria'>
	<div class='container'>
		<div class="lf aic jcc">
			<div class="coluna-10 col-conteudo">
				<h2 class="titulo"><?php echo simple_md(get_field('tradicao_titulo')) ?></h2>

				<div class="bloco-parceria observe-me">
					<div class="circulo-a"></div>
					<div class="circulo-b"></div>
					<div class="parceiro parceiro-1">
						<?php $cada = get_field('bloco_falconi') ?>
						<h3><?php echo simple_md($cada['titulo']) ?></h3>
						<?php echo $cada['texto'] ?>
						<a href="<?php echo esc_url($cada['link']) ?>" target="_blank" class="botao invertido menorainda bg-roxo-b">
							<span><?php echo $cada['botao'] ?></span>
							<div class="hexagono">
								<?php echo get_template_part('img/hex', 'base2'); ?>
								<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-mais.svg' alt=''></div>
							</div>
						</a>
					</div>
					
					<span class="mais">+</span>

					<div class="parceiro parceiro-2">
						<?php $cada = get_field('bloco_minehr') ?>
						<h3><?php echo simple_md($cada['titulo']) ?></h3>
						<?php echo $cada['texto'] ?>
						<a href="<?php echo esc_url($cada['link']) ?>" target="_blank" class="botao invertido menorainda bg-roxo-b">
							<span><?php echo $cada['botao'] ?></span> 
							<div class="hexagono">
								<?php echo get_template_part('img/hex', 'base2'); ?>
								<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-mais.svg' alt=''></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_depoimentos')) { ?>

<div class='section lp-depoimentos'>
	<div class="fundo-cam-1"></div>
	<div class="fundo-cam-2"></div>
	<div class='container'>
		<h2 class="titulo"><?php echo simple_md(get_field('depoimentos_titulo')) ?></h2>	
		<div class="bloco-slideshow bloco-slideshow-depoimentos">
			<div class="a-prev"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-right.svg' alt=''></div>
			<div class="a-next"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-seta-right.svg' alt=''></div>
			<div class="slideshow-depoimentos">
				<?php foreach(get_field('depoimentos')?:[] as $cada) { ?>
				<div class="slide-depo">
					<div class="inside-depo">
						<div class="info">
							<?php echo $cada['texto'] ?>
							<span class="autor"><?php echo simple_md($cada['autor']) ?></span>
						</div>
						<div class="foto">
							<div class="mascara-foto" style='background-image: url(<?php echo $cada['foto'] ?>);'></div>
						</div>
					</div>
				</div>
				<?php } ?> 
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_agendamento')) { ?>

<div class='section lp-agende-visita' id="agende">
	<div class="fundo-agende"></div>
	<div class='container'>
		<div class="lf aic jcsb">
			<div class="coluna-6 col-texto">
				<h2><?php echo simple_md(get_field('agendamento_titulo')) ?></h2>
				<p><?php echo simple_md(get_field('agendamento_chamada')) ?></p> 
			</div>

			<div class="coluna-5 bloco-formulario place-white">
				<div class="campo-input">
					<input type="text" placeholder="Nome">
				</div>
				<div class="campo-input">
					<input type="text" placeholder="Email">
				</div>
				<div class="campo-input">
					<input type="text" placeholder="Telefone">
				</div>
				<div class="campo-input">
					<input type="text" placeholder="Empresa">
				</div>
				<div class="campo-input">
					<input type="text" placeholder="Cargo">
				</div>
				<div class="campo-cols">
					<div class="campo-input">
						<select name="" id="">
							<option value="">Porte da empresa</option>
						</select>
					</div>
					<div class="campo-input">
						<select name="" id="">
							<option value="">Área de Atuação</option>
						</select>
					</div>
				</div>
				<div class="campo-submit">
					<input type="submit" value="Agende uma demonstração">
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_faq')) { ?>

<div class='section lp-faq' id="faq">
	<div class='container' id="vue-faq">
		<div class="card-faq">
			<h2 class="titulo"><?php echo simple_md(get_field('faq_titulo')) ?></h2>
			<div class="intro"><?php the_field('faq_texto') ?></div>

			<div class="centraliza">
				<div class="modulo-busca">
					<img src='<?php echo get_template_directory_uri(); ?>/img/ico-busca.svg' alt=''>
					<input type="text" placeholder="<?php the_field('faq_busca') ?>" v-model="busca"> 
				</div>
			</div>

			<ul class="navegacao-faq" v-show="busca==''">
				<li v-for="cada in temas_disponiveis" @click.prevent="tema=cada"><a href="" :class="{'ativo':cada==tema}">{{cada}}</a></li>
			</ul>

			<div class="faq-gavetas">
				<div class="gaveta" v-for="cada in perguntas_filtradas">
					<div class="gaveta-titulo" @click.prevent="abregaveta">   
						<h3>{{cada.pergunta}}</h3> 
						<div class="hexagono">
							<?php echo get_template_part('img/hex', 'base2'); ?>
							<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-mais.svg' alt=''></div>
						</div>
					</div>
					<div class="gaveta-conteudo">
						<div class="inside-gaveta" v-html="cada.resposta"></div>
					</div>
				</div>
			</div>

		</div>	
	</div>
</div>

<?php } ?>

<?php if (get_field('mostrar_ebook')) { ?>

<div class='section cta-ebook'>
	<div class='container'>
		<div class="lf aic jcsb">
			<div class="coluna-4 intro">
				<h2><?php echo simple_md(get_field('ebook_titulo')) ?></h2>
				<?php the_field('ebook_texto') ?>
			</div>

			<div class="coluna-7 download-book">
				<?php $cada = get_field('bloco_ebook') ?>
				<div class="capa"><img src='<?php echo $cada['capa'] ?>' alt=''></div>
				<div class="info">
					<h3><?php echo simple_md($cada['titulo']) ?></h3>
					<?php echo $cada['descricao'] ?>
					<a href="<?php echo esc_url($cada['link']) ?>" class="botao invertido menor bg-roxo"> 
						<span><?php echo $cada['botao'] ?></span>
						<div class="hexagono">
							<?php echo get_template_part('img/hex', 'base2'); ?>
							<div class="icone"><img src='<?php echo get_template_directory_uri(); ?>/img/ico-download.svg' alt=''></div>
						</div>
					</a>
				</div>
			</div>
		</div>	
	</div>
</div>

<?php } ?>

<?php } } ?>
<?php get_footer(); ?>