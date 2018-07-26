<?php


/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();
?>
<link rel="stylesheet" href="/wp-content/themes/understrap/css/custom.css">
<nav class="bg-fadeout navbar navbar-expand-md navbar-dark navbar-trans fixed-top navbar-inverse pl-5 pr-5 pt-3 pb-4">
    <a href="/" class="navbar-brand"><img src="/wp-content/uploads/haven-logo-white.png"></a>
<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar7" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
          <span class="sr-only">Toggle navigation</span>
        </button>
    <?php
wp_nav_menu( array(
  'theme_location'  => 'primary',
  'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
  'container'       => 'div',
  'container_class' => 'collapse navbar-collapse mt-5 mt-md-2 mt-lg-2 mt-xl-2',
  'container_id'    => 'navbar7',
  'menu_class'      => 'navbar-nav ml-auto onemenu',
  'fallback_cb'     => 'understrap_WP_Bootstrap_Navwalker::fallback',
  'walker'          => new understrap_WP_Bootstrap_Navwalker(),
) );
    ?>
</nav>
<script>
  var opened = false;
  jQuery('#navbar7').on('show.bs.collapse', function() {
    hadclass = false;
    opened = true;
    console.log(enable_transparent);
    if(enable_transparent) {
      if(jQuery(".navbar").hasClass("navbar-trans"))
      {
        jQuery(".navbar").removeClass("navbar-trans");
        jQuery(".navbar").addClass("bg-dark");
        hadclass = true;
      }
    }
    //jQuery(".navbar").wrap( "<div class='vh-100 bg-dark'></div>" );
  }).on('hide.bs.collapse', function() {
    opened = false;
    console.log("hidden");
        //jQuery(".navbar").removeClass("vh-100");

    if(enable_transparent)
    {
      if(hadclass)
      {
        jQuery(".navbar").addClass("navbar-trans");
        jQuery(".navbar").removeClass("bg-dark");  
      }
    
    if((jQuery(document).scrollTop() > (jQuery(window).height() - 50)))
    {
        jQuery(".navbar").removeClass("navbar-trans");
        jQuery(".navbar").addClass("bg-dark");  
    }


    }


  });


  jQuery(".onemenu").append('            <li class="nav-item">                <a class="nav-link" href="#">&nbsp;</a>            </li>            <li class="nav-item">                <a href="https://www.facebook.com/HavenAarhus/" class="nav-link no-side-pad"><i class="fab fa-twitter"></i></a>            </li>            <li class="nav-item">                <a href="https://www.facebook.com/HavenAarhus" target="_blank" class="nav-link no-side-pad"><i class="fab fa-facebook"></i></a>            </li>            <li class="nav-item">                <!--<a href="https://www.facebook.com/HavenAarhus/" class="nav-link no-side-pad"><i class="fas fa-calendar"></i></a>-->            </li>');
</script>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'loop-templates/content', 'page' ); ?>

          <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
          ?>

        <?php endwhile; // end of the loop. ?>
<?php
$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">



			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

<script>
enable_scroll = function()
{
  jQuery(window).scroll(function(){
    if(!opened)
    {
    if((jQuery(document).scrollTop() > (jQuery(window).height() - 50)))
    {
      jQuery(".navbar").removeClass("navbar-trans");
      jQuery(".navbar").addClass("bg-dark");
    } else {
      jQuery(".navbar").addClass("navbar-trans");
      jQuery(".navbar").removeClass("bg-dark");        
    }
    }
  });
}

if(typeof enable_transparent === "undefined")
{
  var enable_transparent = false;
}
if("<?php if(is_front_page()) { echo "true"; } else { echo "false"; } ?>" == "true")
{
  var enable_transparent = true;
}

         jQuery(document).ready(function(){

    if((jQuery(document).scrollTop() > (jQuery(window).height() - 50)))
    {
        jQuery(".navbar").removeClass("navbar-trans");
        jQuery(".navbar").addClass("bg-dark");  
    }
  if(typeof enable_transparent !== "undefined" && enable_transparent == true)
  {
    enable_scroll();
  } else {
    setTimeout(function() {
      if(typeof enable_transparent !== "undefined" && enable_transparent == false)
      {
        jQuery(".navbar").removeClass("navbar-trans");
        jQuery(".navbar").addClass("bg-dark");
        jQuery("<div id='extrapad' style='margin-top: 74px !important'>&nbsp;<br>").insertAfter("nav");
      }
    }, 200);

  }




});



(function($) {
  $('a[href*=#]:not([href=#])').click(function() 
  {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) 
    {
      
      var target = $(this.hash),
      headerHeight = $("nav").height() + 5; // Get fixed header height
            
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              
      if (target.length) 
      {
        $('html,body').animate({
          scrollTop: target.offset().top - headerHeight
        }, 500);
        return false;
      }
    }
  });
})(jQuery);
</script>