<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="sticky-top">
    <nav class="navbar navbar-light navbar-expand-md" role="navigation" style="background-color: #f4f7e6;">
        <a class="navbar-brand d-flex justify-content-center align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="http://localhost/wordpress/wp-content/themes/golden-pothos/src/images/plant2.png" width="45"
                 height="60" class="d-inline-block align-center" alt="">
            <h1>
                <?php echo wp_get_theme()->name; ?>
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--
	Setting the location of header to 'top-menu'
	Adding new class
-->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'top-menu',
					'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'navbar-nav mr-auto ml-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker()
				)
			)
			?>
        </div>
    </nav>
    <div class="header-search">
		<?php get_search_form(); ?>
    </div>
</header>
