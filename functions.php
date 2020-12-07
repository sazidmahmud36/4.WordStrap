<?php

require_once('widgets/class-wp-widget-categories.php');
require_once('widgets/class-wp-widget-recent-comments.php');
require_once('widgets/class-wp-widget-recent-posts.php');
require_once('class-wp-bootstrap-navwalker.php');

	function theme_setup(){
		//Featured theme support
		add_theme_support('post-thumbnails');
		// Reg navbar
		register_nav_menus( array(
    	'primary' => __( 'Primary Menu' )
		));
	}
	add_action('after_setup_theme','theme_setup');

	//Widget Location
	function init_widgets($id){
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar',
			'before_widget' => '<div class = "panel Panel-default">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class = "panel-heading"><h3 class="panel-title">',
			'after_title' => '</h3></div><div class="panel-body">',
		));
	}
	add_action('widgets_init','init_widgets');

	// Ads 'list-group-item' to categories li
	function add_new_class_list_categories($list){
		$list = str_replace('cat-item','cat-item list-group-item',$list);
		return $list;
	}
	add_filter('wp_list_categories', 'add_new_class_list_categories');

	//Register widgets
	function wordstrap_register_widgets(){
		register_widget('WP_Widget_Categories_Custom');
		register_widget('WP_Widget_Recent_Comments_Custom');
		register_widget('WP_Widget_Recent_Posts_Custom');
		
	}
	add_action('widgets_init','wordstrap_register_widgets');

	//Add comments
	function add_theme_comments($comment,$args,$depth){
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ('div' == $args['style']) {
			$tag = 'div';
			$add_below = 'comment';
		}
		else{
			$tag = 'li class ="well comment-item"';
			$add_below = 'div-comment';
		}
	}	