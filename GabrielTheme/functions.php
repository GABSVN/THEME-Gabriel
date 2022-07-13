<?php


// include_once('CPT.php');



// -----------------------------

function GabrielTheme_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://github.com/GABSVN
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'GabrielTheme-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on GabrielTheme, use a find and replace
	 * to change 'GabrielTheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'GabrielTheme' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', GabrielTheme_get_starter_content() );
	}

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new GabrielTheme_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}


// -----------------------------------




function reg_my_menu() {
  register_nav_menu('primary','Menu principal' );
}
add_action( 'after_setup_theme', 'reg_my_menu' );

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('align-wide');
add_theme_support('disable-custom-colors');








function reg_custom_post_type() {

// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
 
 $labels = array(
 'name'                => _x( 'Portfolio', 'Post Type General Name'),
 'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name'),
 'menu_name'           => __( 'Portfolio'),
 'archives'            => __( 'Toutes les réalisations'),
 'all_items'           => __( 'Toutes les réalisations'),
 'view_item'           => __( 'Voir les réalisations'),
 'add_new_item'        => __( 'Ajouter une nouvelle réalisation'),
 'add_new'             => __( 'Ajouter'),
 'edit_item'           => __( 'Editer les réalisations'),
 'update_item'         => __( 'Modifier les réalisations'),
 'search_items'        => __( 'Rechercher une réalisation'),
 'not_found'           => __( 'Non trouvée'),
 'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
 );

// https://generatewp.com/post-type/ -->

 $args = array(
 'label'               =>  'Réalisations',
 'description'         =>  'Toutes les réalisations',
 'labels'              => $labels,

// https://developer.wordpress.org/resource/dashicons/ -->

 'menu_icon'           => 'dashicons-nametag',

// Les champs disponibles dans l'éditeur : titre, auteur, résumé, révisions, image en une... -->

 'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'),

// Autres options -->

 'show_in_rest'    => true,
 'hierarchical'        => false,
 'public'              => true,

// Possède une page regroupant l'ensemble des CPT -->

 'has_archive'         => true,
 'rewrite'   => array( 'slug' => 'portfolio'),
 );

// On enregistre notre custom post type qu'on nomme ici "temoignages" et ses arguments -->

 register_post_type( 'portfolio', $args );
}
add_action( 'init', 'reg_custom_post_type', 0 );
add_theme_support( 'post-thumbnails', array( 'portfolio' ) );


function reg_ajouteCPT_a_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'portfolio' ) );
    return $query;
}
add_action( 'pre_get_posts', 'reg_ajouteCPT_a_query' );








function reg_display_portfolio() {
    $args = array(
    'post_type' => 'portfolio', // Nom du Custom Posty Type
    'post_status' => 'publish', // Status
    'posts_per_page' => 16, // Nombre maximum d'élément
    'order' => 'DESC', // Du plus grand au plus petit
    'orderby' => 'ID' // Ordonner par l'ID
    );
    $s = '';
    $query = new WP_Query( $args );
    if( $query->have_posts() ) {
    $nombreTemoignages = $query->found_posts;
    $s .= '<div class="realisations">';
    while( $query->have_posts() ) {
    $query->the_post();
    $s .= '<div class="realisation">';
    $s .= '<div class="wp-block-image">';
    $s .= '<figure class="aligncenter">';
    $s .= get_the_post_thumbnail();
    $s .= '</figure>';
    $s .= '</div>';
    $s .= '<p>';
    $s .= get_the_title();
    $s .= '</p>';
    // $s .= get_the_content();
    $s .= '</div>';
    }
    $s .= '</div>';
    }
    wp_reset_postdata();
    return $s;
   }
   add_shortcode( 'portfolio', 'reg_display_portfolio' );








    // --------------------------IMAGES EN VEDETTE----------------------

    add_action('after_theme_setup','gkp_add_post_thumbnail');
function gkp_add_post_thumbnail() {
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'portfolio' ) );
}

// -------------------------------------------------------------------------




// -------------------champ personnalisé pour le champ de lien dans un type de message de curseur----------------------------------------------------

function sliderLink_add_meta_box() {
    add_meta_box('slider_link','Slider Link','slider_link_callback','slider');
 }
 
 function slider_link_callback( $post ) {
 
    wp_nonce_field('slider_link_save','slider_link_meta_box_nonce');
    $value = get_post_meta($post->ID,'_slider_link_value_key',true);
    ?>
     <input type="text" name="slider_link_field" id="slider_link_field" value="<?php echo esc_attr( $value ); ?>" required="required" size="100" />
    <?php
 }
 add_action('add_meta_boxes','sliderLink_add_meta_box');
 
 
 function slider_link_save( $post_id ) {
    if( ! isset($_POST['slider_link_meta_box_nonce'])) {
       revenir;
    }
    if( ! wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], 'slider_link_save') ) {
       revenir;
    }
    if( défini('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
       revenir;
    }
    if( ! current_user_can('edit_post', $post_id)) {
       revenir;
    }
    if( ! isset($_POST['slider_link_field'])) {
       revenir;
    }
    $slider_link = sanitize_text_field($_POST['slider_link_field']);
    update_post_meta( $post_id,'_slider_link_value_key', $slider_link );
 }
 add_action('save_post','slider_link_save');

// -----------------------------------------------------------------------------




// -----------------------------------------------------------------------





//  ----------------------------------------------------------------------------------------


















   
