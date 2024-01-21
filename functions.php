<?php
//support
function school_site_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    register_nav_menus(array(
        'primary' =>_('Primary Menu')
    ));
}
add_action('after_setup_theme', 'school_site_theme_support');
//widgets
function widgets() {
//main aside widget
    register_sidebar(array(
        'name' => 'Sidebar parents',
        'id' => 'sidebar-parents',
        'before_widget' => '<div class="warning-card">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar students',
        'id' => 'sidebar-students',
        'before_widget' => '<div class="warning-card">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar teachers',
        'id' => 'sidebar-teachers',
        'before_widget' => '<div class="warning-card">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
//First horizontal row
    register_sidebar(array(
        'name' => 'Topbar',
        'id' => 'topbar',
        'before_widget' => '<ul>',
        'after_widget' => '</ul>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
//Footer
    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'before_widget' => '<div class="social">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer-2',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Footer 3',
        'id' => 'footer-3',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Copyright',
        'id' => 'copyright',
        'before_widget' => '<p>',
        'after_widget' => '</p>',
    ));
// Logo image
    register_sidebar(array(
        'name' => 'Logo bar',
        'id' => 'logo-bar',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
    ));
}
add_action('widgets_init', 'widgets');
// excerpt
function new_excerpt_text() {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_text');
function set_excerpt_length() {
    return 55;
}
add_filter('excerpt_length', 'set_excerpt_length');
 //add submenu
function wpdocs_custom_dropdown_class( $classes ) {
    $classes[] = 'drop';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'wpdocs_custom_dropdown_class' );
// add styles
function add_theme_styles() {
    wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('style-fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
    wp_enqueue_style('style-fontawesome-1', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
    wp_enqueue_style('style-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), null, 'all');
    wp_enqueue_style('style-carousel-theme', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), null, 'all');
    wp_enqueue_style('style-aos', 'https://unpkg.com/aos@next/dist/aos.css');
}
add_action('wp_enqueue_scripts', 'add_theme_styles');
//add script
function add_theme_scripts_js() { 
    wp_register_script('script-js', get_template_directory_uri( ) . '/js/script.js', array('jquery'), '', true);
    wp_enqueue_script('script-jquery-cdn-counter', 'https://code.jquery.com/jquery-1.11.1.min.js', array( 'jquery' ), '', true);
    wp_enqueue_script('script-waypoint-counter', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ), '', true);
    wp_enqueue_script('script-inview-counter', get_template_directory_uri() . '/js/inview.min.js', array( 'jquery' ), '', true);
    wp_enqueue_script('script-jquery-cdn', 'https://code.jquery.com/jquery-3.6.3.min.js', array( 'jquery' ), '', true);
    wp_enqueue_script('script-js');
    wp_enqueue_script('script-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '', true);
    wp_enqueue_script('script-aos', 'https://unpkg.com/aos@next/dist/aos.js');
}
// add attribute type in <script>
function add_type_attribute($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( 'script-js' === $handle ) {
            // change the script tag by adding type="module" and return it.
        $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
        return $tag;
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);
add_action('wp_enqueue_scripts', 'add_theme_scripts_js');
//add active class in nav menu
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
//display a list of the latest posts
function list_latest_posts() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
    );
    $latest_posts = new WP_Query( $args );
    if ( $latest_posts->have_posts() ) {
        echo '<div class="latest-post">';
        while ( $latest_posts->have_posts() ) {
            $latest_posts->the_post();
            $post_title = get_the_title();
            $post_thumbnail = get_the_post_thumbnail();
            $post_author = get_the_author();
            $post_link = get_the_permalink();
            $post_date = get_the_date();
            echo '<div class="row">';
                echo '<div class="col">';
                    echo '<a href="' . $post_link . '" class="the-post-thumbnail">' . $post_thumbnail . '</a>';
                echo '</div>';    
                echo '<div class="col">';
                    echo '<h5 class="the-post"><a href="' . $post_link . '">' . $post_title . '</a></h5>';
                    echo '<span class="post-date">'.$post_date.'</span>';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    wp_reset_postdata();
}
add_filter('display_latets_post', 'list_latest_posts')
?>