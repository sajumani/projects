<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div class="footersection"><!--footersection-->
    <div class="container"><!--footersection container--> 
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
    <!--footersection container--> 
  </div>
  <!--footersection-->
  <?php endif; ?>
  <footer><!--footer-->
    <div class="container footerwrap"><!--footer container-->
        <div class="footerleft"> 
            <?php wp_nav_menu(array('theme_location'=>'footermenu','container' => 'none','fallback_cb'=>'wp_page_menu','items_wrap'=>'<ul class="footermenu">%3$s</ul>'));?>
            <p><?php echo get_option(tk_theme_name.'_general_footer_copy'); ?></p>
        </div>
        <div class="footerlogo"><!--logo--> 
            <a href="<?php bloginfo('url'); ?>">
            	<?php if(get_option(tk_theme_name.'_general_footer_logo')!=''): ?>
                <img src="<?php echo get_option(tk_theme_name.'_general_footer_logo'); ?>" alt="footer-logo" width="194" height="60"/>
                <?php else: ?>
            	<img src="<?php bloginfo('template_url');?>/images/footer-logo.png" alt="logo"/>
                <?php endif; ?>
            </a>
        </div>
    </div>
    <!--footer container--> 
  </footer>
  <!--footer--> 
</div>
<!--mainwrapper-->
	
   <?php wp_footer(); ?>
</body>
</html>
