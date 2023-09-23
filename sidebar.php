<div class="warning">
    <h2>Огласна табла</h2>
    <div class="warning-holder" data-aos="fade-right">
        <?php if(is_active_sidebar('sidebar-parents')) : ?>
            <?php dynamic_sidebar('sidebar-parents'); ?>
        <?php endif; ?>
        <?php if(is_active_sidebar('sidebar-students')) : ?>
            <?php dynamic_sidebar('sidebar-students'); ?>
        <?php endif; ?>
        <?php if(is_active_sidebar('sidebar-teachers')) : ?>
            <?php dynamic_sidebar('sidebar-teachers'); ?>
        <?php endif; ?>
    </div>
</div>
