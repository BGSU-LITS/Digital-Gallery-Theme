<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
	<title><?php echo option('site_title'); ?><?php if(isset($title)){ echo " » {$title}"; } ?></title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<meta name="keywords" content="<?php echo get_theme_option('keywords'); ?>" />
	<meta name="description" content="<?php echo option('description'); ?>" />
	<meta name="author" content="<?php echo option('author'); ?>" />

	<?php
		// This fuels my OCD. The auto_discovery_link_tags should take a separator argument
		$tags = array_filter(explode(" />", auto_discovery_link_tags()));
		echo join(" />\n\t", $tags). " />";
	?>

	<?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

	<!-- CSS -->
	<?php
		queue_css_file('style');
		echo head_css();
	?>


	<!-- JS -->
	<?php echo js_tag('digitalGallery.min'); ?>
</head>
<body>
	<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

	<section class="container">
		<header class="row">
			<div class="span12">
				<div class="mobile right mobile-nav-btn">
					<a href="#">Navigation</a>
				</div>

				<h1 class="heading"><?php echo link_to_home_page('Digital <span class="primary">Gallery</span>');?></h1>
				<h2 class="tagline">Digital Collections of the University Libraries</h2>
			</div>

			<div class="span12" id="main-nav">
				<div id="search-box">
					<form action="<?php echo url('items/browse'); ?>" method="get">
						<label for="simple-search" class="hidden">Search</label>
						<input type="text" name="search" id="simple-search" placeholder="Search" value="<?php echo input_get_value('search'); ?>" class="input long shadow" />
						<input type="submit" value="Go!" class="button hide-mobile" />
					</form>
					<div class="push-down text-right gray-link hide-mobile">
						<a href="<?php echo url('items/search'); ?>">Advanced Search</a>
					</div>
				</div>
				<nav id="site-navigation">
					<?php echo public_nav_main(); ?>
				</nav>
			</div>
		</header>

		<div class="content">
