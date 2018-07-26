<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<nav class="navbar navbar-expand-md navbar-dark navbar-trans fixed-top navbar-inverse pl-5 pr-5 pt-3">
    <a href="/" class="navbar-brand"><img src="/wp-content/uploads/haven-logo-white.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
wp_nav_menu( array(
	'theme_location'  => 'primary',
	'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse',
	'container_id'    => 'bs-example-navbar-collapse-1',
	'menu_class'      => 'navbar-nav mr-auto',
	'fallback_cb'     => 'understrap_WP_Bootstrap_Navwalker::fallback',
	'walker'          => new understrap_WP_Bootstrap_Navwalker(),
) );
    ?>    
</nav>
<div class="jumbotron text-white">
  <div class="container text-left h-100" style="margin-top: 12rem !important;">
  	<div class="row h-100">
  		<div class="col-md-6 offset-md-3">
		    <p class="lead mb-3">En tekst der appellerer til den ikke-kristne + hænger sammen med billedet</p>  	
		    <a href="#" class="btn btn-outline-light no-rounded">Læs mere</a> <a href="#" class="no-rounded ml-2 btn btn-outline-light">Call to action</a>
		    <p class="text-center col-md-12 mx-auto animated infinite pulse" style="margin-top: 30%;"><i class="material-icons" style="font-size: 6rem;">arrow_drop_down</i></p>
  		</div>
  	</div>

  </div>
</div>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
