<?php
/**
 * Template Name: Team Members
 */
get_header();
?>

<div class="container">
    <h1>Team Members</h1>
    <?php
    // Query for Team Members
    $args = array('post_type' => 'team_member');
    $team_members = new WP_Query($args);

    if ($team_members->have_posts()) {
        echo '<div class="row">';
        while ($team_members->have_posts()) {
            $team_members->the_post();
            ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_field('position'); ?></p>
                        <a href="<?php the_field('linkedin_profile'); ?>" class="btn btn-primary">LinkedIn</a>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p>No team members found.</p>';
    }
    wp_reset_postdata();
    ?>
</div>

<?php
get_footer();
