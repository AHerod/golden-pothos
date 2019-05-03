<?php get_header(); ?>

<div class="container">
    <div class="container pt-5 pb-5">
        <!-- Title of the category with posts -->
        <h1><?php single_cat_title(); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="shadow-sm card mb-5">
                <div class="card-body">
                    <!-- Title of a post with posts -->
                    <h3><?php the_title(); ?></h3>

					<?php if ( has_post_thumbnail() ): ?>

                        <img src="<?php the_post_thumbnail_url( 'smallest' ) ?>" class="img-fluid"/>

					<?php endif; ?>

					<?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-success">Read more</a>
                </div>
            </div>

		<?php endwhile; endif; ?>
    </div>
	<?php
	function bootstrap_pagination( $echo = true ) {
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$pages = paginate_links( array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'type'      => 'array',
				'prev_next' => true,
				'prev_text' => __( '« Prev' ),
				'next_text' => __( 'Next »' ),
			)
		);

		if ( is_array( $pages ) ) {
			$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

			$pagination = '<ul class="pagination justify-content-center ">';

			foreach ( $pages as $page ) {
				$pagination .= "<li class='page-link'>$page</li>";
			}

			$pagination .= '</ul>';

			if ( $echo ) {
				echo $pagination;
			} else {
				return $pagination;
			}
		}
	}
	?>
	<?php echo bootstrap_pagination(); ?>
</div>
<?php get_footer(); ?>
