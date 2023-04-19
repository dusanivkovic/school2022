<?php get_header(); ?>

<section class="container main-content">
    <!----- main content ------>
    <div class="main">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <article class="page">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <?php echo wp_apautop('Sorry, no posts were found'); ?>
        <?php endif; ?>
    </div>
    <!------ sidebar ------>
    <aside class="sidebar">
        <?php get_sidebar(); ?>
    </aside>
</section>
<?php get_footer(); ?>