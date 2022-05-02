<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/nav.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/bliv_skole.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/hjem.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/sog_tilskud.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/projekter.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/unesco.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/skoler.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/footer.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/dry.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/om-oss.css">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
