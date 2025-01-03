<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
        <!-- Main Content Area -->
        <main class="col-md-8">
            <h1 class="text-center mb-5">Latest Blog Posts</h1>
            <div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="text-center">No posts available.</p>
                <?php endif; ?>
            </div>
        </main>

        <!-- Sidebar Area -->
        <aside class="col-md-4">
            <?php if (is_active_sidebar('main_sidebar')) : ?>
                <?php dynamic_sidebar('main_sidebar'); ?>
            <?php else : ?>
                <p>No widgets found. Please add some widgets in the WordPress dashboard.</p>
            <?php endif; ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
