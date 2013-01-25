<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
	<title><?php echo option('site_title'); ?><?php if(isset($title)){ echo " » {$title}"; } ?></title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
	<?php echo head_js(); ?>

	<!--[if lt IE 9]>
	<?php echo js_tag('html5shiv'); ?>
	<![endif]-->
</head>
<body>
	<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

	<div class="orange top-bar">&nbsp;</div>

	<section class="container">
		<header>
			<div class="row header-blocks">
				<div class="home-slice orange">&nbsp;</div>
				<div class="home-slice orange">&nbsp;</div>
				<div class="home-slice orange">&nbsp;</div>
				<div class="home-slice orange">&nbsp;</div>
				<div class="home-slice orange">&nbsp;</div>
			</div>
			<div class="row">
				<div class="span7 branding">
					<h1 class="heading"><?php echo link_to_home_page('The <span class="primary">Gallery</span>');?></h1>
					<h2 class="tagline">Digital Collections of the University Libraries</h2>
				</div>
				<div class="span5">
					<nav id="site-navigation" class="row">
						<ul class="navigation right">
						<?php echo public_nav_main(); ?>
						</ul>
					</nav>
					<div id="search-box" class="row">
						<form action="<?php echo url('items/browse'); ?>" method="get">
							<label for="simple-search" class="hidden">Search</label>
							<input type="text" name="search" id="simple-search" placeholder="Search" value="<?php echo input_get_value('search'); ?>" class="input long shadow" />
							<input type="submit" value="Go!" class="button" />
						</form>
						<div class="push-down text-right gray-link">
							<a href="<?php echo url('items/search'); ?>">Advanced Search</a>
						</div>
					</div>
				</div>
			</div>
		</header>
