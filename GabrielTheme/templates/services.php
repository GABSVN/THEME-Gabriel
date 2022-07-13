<?php
/*
  Template Name: Services
*/
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<h1><?php the_title(); ?></h1>
    <div class="content">
    	<?php the_content(); ?>
    </div>
<?php
	endwhile; endif;
	get_footer();
?>

<!-- ----------------------------------SLIDER A-------------------------------------- -->
<?php

<section>
    
        <div class="container">

        <div class="row">
        <?php
        $arg = array(
        'post_type' => 'slider',
        'posts_per_page' => 5,
        'order' => 'ASC'
        );
        $slider = new WP_Query($arg);
        $j = 0;
        $post_count = wp_count_posts('slider')->publish;
        ?>
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php while($slider->have_posts()) : $slider->the_post(); ?>
        <div class="item<?php echo $j==0 ? ' active': '';?>">
        <?php if(has_post_thumbnail()): the_post_thumbnail('slider'); endif; ?>
        <!-- Static Header -->
        <div class="header-text hidden-xs">
        <div class="col-md-12 text-center">
        <h2>
        <?php the_title() ?>
        </h2>
        <br>
        <h3>
        <a href="<?php echo get_post_meta(get_the_ID(),'_slider_link_value_key', true); ?>"><span><?php the_excerpt(); ?></span></a>
        </h3>
        </div>
        </div><!-- /header-text -->
        </div>
        <?php $j++; endWhile; wp_reset_query(); ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        </div><!-- /carousel -->
        </div>
        </div>

</section>
?>


// <!-- ------------------------------------------FIN SLIDER A--------------------------------------- -->



// <!-- ------------------------------------------------SLIDER B---------------------------------------- -->
<?php
<section>

if (is_page_template('page-une.php')){$value='une';} //vos valeurs avec vos conditions qui sont reprises dans le champ ACF
if (is_page_template('page-deux.php')){$value='deux';} //vos valeurs avec vos conditions qui sont reprises dans le champ ACF
if (is_home()){$value='trois';} //vos valeurs avec vos conditions qui sont reprises dans le champ ACF

$arg = array(
'post_type' => 'slider',
'posts_per_page' => 5,
'order' => 'ASC',
'meta_query' => array(
array(
'key' => 'slide_in',
'value' => $value,
'compare' => 'LIKE',
),
),
);
$slider = new WP_Query($arg);
</section>
?>
// ----------------------------------------------FIN SLIDER B---------------------------------------------

// ------------------------------------------------SLIDER C------------------------------------------
<?php
<section>
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
    'key' => 'group_6113ddf38694e',
    'title' => 'slider',
    'fields' => array(
    array(
    'key' => 'field_6113ddf878173',
    'label' => 'Slider présent sur :',
    'name' => 'slide_in',
    'type' => 'checkbox',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
    'width' => '',
    'class' => '',
    'id' => '',
    ),
    'choices' => array(
    'une' => 'Page une', //vos valeurs
    'deux' => 'Page deux', //vos valeurs
    'trois' => 'Page trois', //vos valeurs
    ),
    'allow_custom' => 0,
    'default_value' => array(
    ),
    'layout' => 'vertical',
    'toggle' => 0,
    'return_format' => 'value',
    'save_custom' => 0,
    ),
    ),
    'location' => array(
    array(
    array(
    'param' => 'post_type',
    'operator' => '==',
    'value' => 'slider',
    ),
    ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    ));
    
    endif;
</section>
?>
    // -----------------------------------------FIN SLIDER C--------------------------------------

// ---------------------------------FIN SLIDER-------------------------------



