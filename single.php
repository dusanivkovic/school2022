<?php get_header('blog'); ?>

<section class="container main-content">
    <!----- main content ------>
    <div class="main">
        <div class="bulletin-board">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <div class="bulletin-card">
                    <div class="bulletin-text">  
                        <a class="autor"><?php the_author(); ?></a> | <?php echo get_the_date(); ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; else:?>
                <?php _e('nothing to show'); ?>
            <?php endif;?>
        </div>
    </div>
    <!------ sidebar ------>
    <aside class="sidebar">
        <?php get_sidebar('post'); ?>
    </aside>
</section>
<?php get_footer(); ?>