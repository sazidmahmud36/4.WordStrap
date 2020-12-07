<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name');?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head();?>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => false,
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
	    <form method="get" class="form-inline my-2 my-lg-0" action="<?php echo esc_url(home_url('/')); ?>">
	      <label for="navbar-search" class="sr-only"><?php _e('Search','textdomain'); ?></label>
	      <div class="form-group">
	      	<input type="text" class="form-control" name="s" id="navbar-search">
	      </div>
	      <button type="submit" class="btn btn-default"><?php _e('Search','textdomain'); ?></button>
	    </form>
	  </div>
	</nav>
