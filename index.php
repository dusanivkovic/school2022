<?php get_header(); ?>

<section class="container main-content">
    <!----- main content ------>
    <div class="main">
        <div class="bulletin-board-title">
            <h2><?php the_field('naslov-blog') ?></h2>
            <hr>
        </div>
        <div class="bulletin">
            <div class="bulletin-board blog">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <div class="bulletin-card">
                        <div class="bulletin-card-img bulletin-card-item">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="bulletin-text">  
                            <h4><?php the_title(); ?></h4>
                            <span class="autor"><?php the_author(); ?></span> | <span><?php echo get_the_date(); ?></span>
                            
                            <a class="permalink" href="<?php the_permalink(); ?>"><?php _e('[...]'); ?></a>
                        </div>
                    </div>
                <?php endwhile; ?>
                    <?php the_posts_pagination( array(
                        'mid_size' => 1,
                        'prev_text' => __( '<<', 'textdomain' ),
                        'next_text' => __( '>>', 'textdomain' ),
                    ) ); ?>
                <?php else: ?>
                    <?php _e('nothing to show'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!------ sidebar ------>
    <aside class="sidebar">
        <?php get_sidebar(); ?>
    </aside>
</section>

<?php get_footer(); ?>