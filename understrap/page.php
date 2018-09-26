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
<link rel="stylesheet" href="//haven-aarhus.dk/wp-content/themes/understrap/css/custom.css">
<nav class="bg-fadeout navbar navbar-expand-md navbar-dark navbar-trans fixed-top navbar-inverse pl-5 pr-5 pt-2 pb-3">
    <a href="/" class="navbar-brand"><img src="https://haven.menuras.com/wp-content/uploads/haven-logo-white.png"></a>
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
<div class="pb-5 showineditor" id="showineditor" style="display:none;background-color:black;">&nbsp;</div>
<div class="pb-5 pl-5 pt-3 showineditor" id="showineditor" style="display:none;background-color:black;color:white;">This black bar is only visible in the editor.</div>

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




  jQuery(".onemenu").append('            <li class="nav-item">                <a class="nav-link" href="#">&nbsp;</a>            </li>            <li class="nav-item">                <a href="https://www.facebook.com/HavenAarhus" target="_blank" class="nav-link no-side-pad"><i class="fab fa-facebook"></i></a>            </li><li class="nav-item">                <a href="https://www.instagram.com/haven.aarhus/" target="_blank" class="nav-link no-side-pad"><i class="fab fa-instagram"></i></a>            </li><li class="nav-item">                <a href="https://havenaarhus.breezechms.com/embed/calendar/grid?size=medium&color=gray&calendars=SkiBQ0rKB8NqgyE862Gamo4QEngYDXl1aH5F7zWvbzWqOeJM%2Fjed%2FYc2wsuQrRubJbrhe3FUJQ5ByRYXomxRGA%3D%3D" target="_blank" class="nav-link no-side-pad"><i class="fas fa-calendar"></i></a>            </li><li class="nav-item">                <a href="javascript:void(0);" onclick="openModal(\'contactmodal\')" target="_blank" class="nav-link no-side-pad"><i class="fas fa-comment"></i></a>            </li>                        ');


  jQuery(document).ready(function(){
    if(jQuery(window).width() > 768)
    {
      jQuery(".partnerbox").css("flex", "none");
    }

  });

</script>

<div class="modal" tabindex="-1" role="dialog" id="contactmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title col-md-6 offset-md-3">Kontakt os</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-6 offset-md-3">
        Har du et spørgsmål? Vi ville elske at komme i kontakt med dig!
<form action="/#wpcf7-f119-p42-o1" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="119">
<input type="hidden" name="_wpcf7_version" value="5.0.4">
<input type="hidden" name="_wpcf7_locale" value="da_DK">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f119-p42-o1">
<input type="hidden" name="_wpcf7_container_post" value="42">
</div>
<p><label> Navn<br>
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </label></p>
<p><label> Alder<br>
    <span class="wpcf7-form-control-wrap your-age"><input type="number" name="your-age" value="" class="wpcf7-form-control wpcf7-number wpcf7-validates-as-required wpcf7-validates-as-number" aria-required="true" aria-invalid="false"></span> </label></p>
<p><label> Telefonnummer<br>
    <span class="wpcf7-form-control-wrap your-phone"><input type="number" name="your-phone" value="" class="wpcf7-form-control wpcf7-number wpcf7-validates-as-required wpcf7-validates-as-number" aria-required="true" aria-invalid="false"></span> </label></p>
<p><label> Email<br>
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label></p>
<p><label> Kommentarer<br>
    <span class="wpcf7-form-control-wrap your-comments"><textarea name="your-comments" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
<p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form>
      </div>
      </div>
    </div>
  </div>
</div>
<script>
openModal = function(modalid)
{
  console.log(modalid);
  jQuery("#"+modalid).appendTo("body").modal();
}
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

var queryparams = location.search.replace('?', '').split('&').map(function(val){
  return val.split('=');
});

if(queryparams[0][0] == "modal")
{
  setTimeout(function(){
  jQuery("#"+queryparams[0][1]).modal();
  }, 500);
}

jQuery(document).ready(function()
{
if(typeof Tailor.Api == "object")
{
  console.log("dhey");
  jQuery('.showineditor').each(function() {
  jQuery(this).show();
});
  
} else {
  console.log("hoy");
  jQuery('.showineditor').each(function() {
  jQuery(this).hide();
});
}
});
</script>