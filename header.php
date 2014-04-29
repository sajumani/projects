<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if(get_option(tk_theme_name.'_general_favicon')!=''): ?>
                <link rel="icon" href="<?php echo get_option(tk_theme_name.'_general_favicon'); ?>" type="image/ico">
<?php else: ?>
            	<link rel="icon" href="<?php bloginfo('template_url');?>/images/favicon.ico" type="image/ico">
<?php endif; ?>
<link href="<?php bloginfo('template_url');?>/css/fonts.css" rel="stylesheet" />
<link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet" />
<?php wp_head(); ?>
</head>

<body>
<div class="mainwrapper"><!--mainwrapper-->
  <header><!--header-->
    <div class="container"><!--header container--> 
    <div class="logo"><!--logo--> 
    <a href="<?php bloginfo('url');?>">
        <?php if(get_option(tk_theme_name.'_general_header_logo')!=''): ?>
                <img src="<?php echo get_option(tk_theme_name.'_general_header_logo'); ?>" alt="footer-logo" />
                <?php else: ?>
            	<img src="<?php bloginfo('template_url');?>/images/logo.png" alt="logo" width="227" height="85"/>
        <?php endif; ?>
    </a>
    </div><!--logo--> 
    <div class="menu"><!--menu-->
     <?php wp_nav_menu(array('theme_location'=>'topmenu','container' => 'none','fallback_cb'=>'wp_page_menu','items_wrap'=>'<ul>%3$s</ul>'));?>
    </div><!--menu-->
    </div>
    <!--header container--> 
  </header>
  <!--header-->
