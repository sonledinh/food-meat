<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mean
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/jquery.mmenu.all.css"> 
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/responsive.css">

    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header>
        <div class="header-menu header-rel">
            <div class="container">
                <div class="content-menu">
                    <div class="logo"><a href="/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo.png" class="img-fluid" alt=""></a></div>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                    <div class="hotline text-right">
                        <label>Hotline</label> <br>
                        <span><a href="tel: <?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-mobile" style="display: none;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-6">
                        <div class="logo"><a href="/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo.png" class="img-fluid" alt=""></a></div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="btn-menu">
                            <a title="" href="#menu"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav>
    </header> 



    