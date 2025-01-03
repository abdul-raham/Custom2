<div class="sidebar">
    <h3>Recent Posts</h3>
    <ul>
        <?php 
        $recent_posts = wp_get_recent_posts( array( 'numberposts' => 5 ) );
        foreach ( $recent_posts as $post ) : ?>
            <li><a href="<?php echo get_permalink( $post['ID'] ); ?>"><?php echo $post['post_title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
