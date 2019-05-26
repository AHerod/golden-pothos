<?php get_header(); ?>

<div class="jumbotron d-flex">
    <div class="container-fluid text-center">
        <h1 class="display-1">Make your life
            <span class="title-highlight">
                            greener.

            </span>
        </h1>
        <p class="lead">A global community of
            <span class="font-weight-bolder">PLANT LOVERS.</span>
        </p>
        <p>Get daily news and tips from professionals and become one of them today.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>

<div class="container-fluid">
    <h1>Latest blog posts</h1>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="shadow-sm card mb-5 ">
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



<?php get_footer(); ?>
