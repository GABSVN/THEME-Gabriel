<?php
get_header();
?>
<section id="primary">
 <?php
 if ( have_posts() ) {
 while ( have_posts() ) {
 the_post();
 ?>
 <h2><?php the_title(); ?></h2>
 <?php
 if ( has_post_thumbnail() ) {
 the_post_thumbnail('thumbnail');
 }
 ?>
 <?php the_excerpt(); ?>
 <a href="<?php the_permalink(); ?>">Lire la suite</a>
 <?php
 }
 } else {
 ?>
 <p>Aucun article</p>
 <?php
 }
 ?>
</section>


<!-- ------------------------------INSERTION SLIDER------------------------------ -->
<div id="slider">
   <div id="prevSlide">
      <img src="previous.jpg" />
   </div>

   <div id="slider-window">
      <ul id="slides">
         <?php query_posts('posts_per_page=5&meta_key=thumb&meta_compare=!=&meta_value= ');
         while ( have_posts() ) : the_post(); ?>
            <li>
               <img src="<?php echo get_post_meta($post->ID, 'thumb', true) ?>" />
               <div>
                  <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                  <?php the_excerpt(); ?>
               </div>
            </li>
         <?php endwhile;
         wp_reset_query();?>
      </ul>
   </div><!-- #slider-window -->

   <div id="nextSlide">
      <img src="next.jpg" />
   </div>
</div><!-- #slider -->
<!-- ----------------------------FIN SLIDER----------------------------- -->

</section>
<?php
get_footer();
?>



