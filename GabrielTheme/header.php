<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 <meta charset="<?php bloginfo( 'charset' ); ?>" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<!-- ---------------------SLIDER----------------------------------- -->
 <script src= "//code.jquery.com/jquery-1.11.0.min.js "></script>
<link href= "//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css " rel= "stylesheet " id= "bootstrap-css ">
<script src= "//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js "></script>
<!-- --------------------------------FIN SLIDER------------------------ -->

 <?php wp_head(); ?>

<!-- ------------------------------- CRÉATION SLIDER TOP BILLETS ---------------------- -->

<div id="slider">
Top billets !

<?php $popular = new WP_Query('orderby=comment_count&posts_per_page=5'); ?>

	<?php while ($popular->have_posts()) : $popular->the_post(); ?>
		

		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail('thumb160'); ?>
		<?php else : ?>
			Pas d'illustration pour ce billet
		<?php endif; ?>
		
<?php the_title();?>

		<?php the_excerpt(); ?>
		Lire la suite...
		

	<?php endwhile; ?>

</div>

<!-- --------------------------------------- FIN SLIDER TOOP BILLETS-------------------- -->







</head>
<body <?php body_class(); ?>>
 <?php wp_body_open(); ?>
 <header class="header">
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/MonkeyCyclop-HD.svg" alt="Logo">
    </a> 
 <h1><a href="<?php bloginfo('url') ;?>"><?php bloginfo('name'); ?></a></h1>
 <nav class="menugauche">
 <?php
 if ( has_nav_menu( 'primary' ) ) {
 wp_nav_menu(
 array(
 'container'  => '',
 'items_wrap' => '%3$s',
 'theme_location' => 'primary',
 )
 );
 }
 ?>

<?php 
if ( is_user_logged_in() ):
	$current_user = wp_get_current_user(); 
?>
	<p>
        <?php echo $current_user->user_firstname; ?>
        <a href="<?php echo wp_logout_url(); ?>"> Déconnexion </a>
	</p>
<?php else: ?>
    <p>
        <a href="<?php echo wp_login_url(); ?>"> Connexion </a>
	</p>
<?php endif; ?>

 </nav>
 </header>
 <hr>