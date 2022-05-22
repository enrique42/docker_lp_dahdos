<!-- Meta dados -->
<?php  
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$description = get_bloginfo('description');
	$imagem = get_the_post_thumbnail_url($post->ID,'large') ?: get_template_directory_uri().'/img/share-default.jpg';
	if (is_singular('post')) {
		$description = get_resumo($post);
	}
	            
?>

<meta name="description" content="<?php echo $description; ?>">

<meta property="og:url" content="<?php echo $actual_link; ?>">		        
<meta property="og:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>">
<meta property="og:type" content="article">
<meta property="og:description" content="<?php echo $description; ?>">

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@" />
<meta name="twitter:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $description; ?>">

<?php if ($imagem) { ?>
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>">
<meta property="og:image:type" content="image/jpeg">
<?php } ?>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">