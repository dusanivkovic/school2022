                <!----- footer ------>
        <footer>
            <section class="container">
                <div class="social">
                    <?php if(is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if(is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if(is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php endif; ?>
                </div>            
            </section>
            <?php if(is_active_sidebar('copyright')) : ?>
                <?php dynamic_sidebar('copyright'); ?>
            <?php endif; ?>
            <?php wp_footer(); ?>
        </footer>
    </body>
</html>