<?php

<section id="slideshow">
	<div class="container">
		<div class="c_slider"></div>
		<div class="slider">
			<a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 1</figcaption>
			</figure></a>
			<a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 2</figcaption>
			</figure></a>
			<a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 3</figcaption>
			</figure></a>
			<a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 4</figcaption>
			</figure></a>
		</div>
	</div>
</section>



<section id="slideshow">
	<div class="container">
		<div class="c_slider"></div>
		<div class="slider">
			<a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 1</figcaption>
			</figure></a><!--
			--><a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 2</figcaption>
			</figure></a><!--
			--><a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 3</figcaption>
			</figure></a><!--
			--><a href="#"><figure>
				<img src="http://fakeimg.pl/640x310/" alt="" width="640" height="310" />
				<figcaption>Fake image de 640x310px. Slide 4</figcaption>
			</figure></a>
		</div>
	</div>
	<span id="timeline"></span>
</section>





<!-- ----------------------boucle qui nous retournera les 4 premiers articles possédant une image--------------------- -->

<section id="slideshow">
    <div>
        <div></div>
        <div>
            <?php
            query_posts('posts_per_page=4&meta_key=_thumbnail_id&meta_compare=!=&meta_value= ');
                while ( have_posts() ) : the_post(); ?><a href="<?php echo the_permalink(); ?>" title="Lire l\'article"><figure><?php the_post_thumbnail( array(640,310) ); ?><figcaption><?php the_title(); ?></figcaption></figure></a>
                <?php endwhile;
            wp_reset_query(); ?>
        </div>
    </div>
    <span id="timeline"></span>
</section>


<?php
    query_posts('posts_per_page=4&meta_key=_thumbnail_id&meta_compare=!=&meta_value= ');
    while ( have_posts() ) : the_post(); ?>
        <a href="<?php echo the_permalink(); ?>" title="Lire l\'article">
            <figure>
                <?php the_post_thumbnail( array(640,310) ); ?>
               <figcaption><?php the_title(); ?></figcaption>
            </figure>
        </a>
    <?php endwhile;
    wp_reset_query();
?>