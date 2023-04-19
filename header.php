<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">  -->
    <!-- <script src='script.js'></script> -->
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