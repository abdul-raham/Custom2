<?php
/* Template Name: Team Members Page */

get_header(); ?>

<div class="container py-5">
    <h1 class="text-center mb-5">Meet Our Team</h1>
    <div class="row">
        <?php
        // Custom WP Query to fetch Team Members
        $args = array(
            'post_type'      => 'team_member',
            'posts_per_page' => -1,  
        );
        
        $team_members_query = new WP_Query($args);
        
        if ($team_members_query->have_posts()) :
            while ($team_members_query->have_posts()) : $team_members_query->the_post();
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <?php if (get_field('position')) : ?>
                                <p class="card-text"><strong>Position:</strong> <?php the_field('position'); ?></p>
                            <?php endif; ?>
                            <?php if (get_field('linkedin_profile')) : ?>
                                <a href="<?php the_field('linkedin_profile'); ?>" class="btn btn-primary" target="_blank">LinkedIn</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No team members found.</p>';
        endif;
        ?>
    </div>
</div>
 
<?php get_footer(); ?>
