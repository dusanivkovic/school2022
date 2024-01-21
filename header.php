<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <!-------- top bar -------->
    <section class="topBar">
        <?php if(is_active_sidebar('topbar')) : ?>
            <?php dynamic_sidebar('topbar'); ?>
        <?php endif; ?>
    </section>

    <!-- navbar -->

    <nav>
        <section class="container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo-removebg-preview.png" alt=""></a>
            </div>
                <?php wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'nav-bar-main',
                    'container_id'      => 'navbarNav',
                    'menu_class'        => 'menu',
                    'menu_id'           =>  'resMenu',
                    'fallback_cb'       => 'wp_page_menu',
                    'walker'            => '',
                )); ?>
            <button id="navbtn" class="hamburger">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </section>
    </nav>
    <!--header-->
    <header>
        <img src="<?php the_field('slika-header'); ?>" alt="">
        <section class="container hero">
            <div class="header-post">
                <h1><?php the_field('naslov-header'); ?></h1>
                <p><?php the_field('paragraf-header'); ?></p>
                <button><a href="<?php the_field('dugme-u-header'); ?>">Сазнај више</a></button>
            </div>
        </section>
    </header>