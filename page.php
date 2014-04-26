<?php get_header(); ?>
<?php $sliderenable= get_option(tk_theme_name.'_general_show_banner'); if($sliderenable[0]=='yes' || get_post_meta($post->ID,'tk_show_banner',true)==true) { ?>
  <div class="homeslider"><!--homeslider-->
    <div class="container"><!--homeslider container--> 
    <div id="slider1">
        <ul id="slider1Content">
        <?php $productargs = array( 'post_type'=>'pt_slides','posts_per_page' => '10','orderby'=>'menu_order','order'=>'ASC');
            
            $myproducts = get_posts( $productargs );
            foreach ( $myproducts as $post ) : setup_postdata( $post ); if(has_post_content_image() || has_post_thumbnail()): ?>
         
            <li class="slider1Image">
                <a href=""><?php if(has_post_thumbnail()): the_post_thumbnail('slider-image'); else:  ?><img src="<?php echo get_post_first_image(); ?>" alt="Slider" /><?php endif; ?></a>
                <span class="right"><strong><?php the_title(); ?></strong><br /><?php the_excerpt(); ?></span></li>
            <?php endif; endforeach; wp_reset_postdata(); ?>
            <div class="clear slider1Image"></div>
        </ul>
    </div>
    	<div class="naviicon">
            <a href="#" class="topnavi">top</a>
            <ul class="slide_dots"></ul>
            <a href="#" class="bottomnavi">bottom</a>
        </div>
    </div>
    <!--homeslider container--> 
  </div>
  <!--homeslider-->
  <?php } ?>
  <div class="hometab"><!--hometab-->
    <div class="container"><!--hometab container--> 
    <div class="vtab">
      <ul class="tabmenu">
            <li class="tabmenulist"><?php the_title(); ?></li>
      </ul>
			<div class="tabdiv">
                <div class="tabcontent">
                
                
                </div>
            </div>
    
 </div>
    </div>
    <!--hometab container--> 
  </div>
  <!--hometab-->
  <?php get_footer(); ?>