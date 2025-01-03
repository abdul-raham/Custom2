<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <p>By <?php the_author(); ?> on <?php the_date(); ?></p>
                <div><?php the_content(); ?></div>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
