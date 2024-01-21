<?php get_header(); ?>

 <!-- board -->
 <section class="container board">
    <div class="role-board">
        <div>
            <h3><?php the_field('ucenik-tekst'); ?></h3>
            <div>
                <a href="<?php the_field('ucenik-link'); ?>"><i class="fas fa-user-graduate"></i></a>
                <a href="<?php the_field('roditelji-link'); ?>"><i class="fas fa-user-friends"></i></a>
                <a href="<?php the_field('nastavnici-link'); ?>"><i class="fas fa-chalkboard-teacher"></i></a>
            </div>
        </div>
        <div>
            <h3><label id="teachers-meetings" for="meetings"><?php the_field('raspored-info'); ?></label></h3>
            <select name="informative-meetings" id="meetings" class="box">
                <option value="choice-options"><?php the_field('izaberi-opciju'); ?></option>
            </select>
        </div>
        <div>
            <h3><label for="school-class" id="class-schedule"><?php the_field('raspored-casova')?></label></h3>
            <div>
                <select name="classes" id="school-class" class="box">
                    <option value="choice-options"><?php the_field('izaberi-razred'); ?></option>
                </select>
                <select name="departments-school" id="departments" class="box">
                    <option value="choice-options"><?php the_field('izaberi-odjeljenje'); ?></option>
                </select>
                <button id="show-schedule"><?php the_field('prikazi-raspored')?></button>
            </div>
        </div>
    </div>
</section>
<!-- bulletin -->
<section class="container">
    <div class="bulletin-board-title">
        <h2><?php the_field('naslov-bloga'); ?></h2>
        <hr>
    </div>
    <div class="slider bulletin">
    <?php
        // the query
        $args = array( 'posts_per_page' => 10 );
        $the_query = new WP_Query( $args );
    ?>
        <div class="owl-carousel owl-theme bulletin-board">
            <?php if($the_query->have_posts()): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="item bulletin-card">
                    <div class="bulletin-card-img bulletin-card-item">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="bulletin-text">
                        <h3><?php the_title(); ?></h3>
                            <a class="autor"><?php the_author(); ?></a> | <?php echo get_the_date(); ?>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>"><?php _e('[...]'); ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php
                // clean up after the query and pagination
                wp_reset_postdata();
            ?>
            <?php else: ?>
                <?php _e('nothing to show'); ?>
            <?php endif;?>
        </div>
    </div>
</section>
<!-- image-box -->
<section>
    <div id="inview-example" class="image-box counters">
        <img src="<?php the_field('slika-sredina')?>" alt="">
        <div class="common-box">
            <div class="counter-num">
                <span class="timer" data-count=""><?php the_field('tradition') ?></span>
            </div>
            <div class="counter-text"><?php the_field('years') ?></div>
        </div>
        <div class="common-box">
            <div class="counter-num">
                <span class="timer" data-count=""><?php the_field('num-students') ?></span>
            </div>
            <div class="counter-text"><?php the_field('students-text') ?></div>
        </div>
        <div class="common-box">
            <div class="counter-num">
                <span class="timer" data-count=""><?php the_field('num-teachers') ?></span>
            </div>
            <div class="counter-text"><?php the_field('teachers-text') ?></div>
        </div>
    </div>
</section>
<section class="container">
    <?php get_sidebar(); ?>
</section>
<div id="modal-meetings" class="modal">
    <div class="modal-content">

    </div>
</div>

<?php get_footer('front-page'); ?>