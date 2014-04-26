<?php
/* Template Name: Front Page */ 
get_header(); // Include the header
?>
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
  <div class="hometab"><!--hometab-->
    <div class="container"><!--hometab container--> 
    <div class="vtab">
      <ul class="tabmenu">
			<?php 
            $parentpages=get_pages(array('parent'=>$post->ID,'sort_column'=>'ID','sort_order'=>'ASC'));
            foreach($parentpages as $parentpage):
            echo '<li class="tabmenulist">'.$parentpage->post_title.'</li>';
            endforeach;
            ?>
      </ul>
			<?php
			foreach($parentpages as $parentpage){
			   echo '<div class="tabdiv"><div class="tabcontent"><ul>';
			$childpages=get_pages(array('child_of'=>$parentpage->ID,'sort_column'=>'ID','sort_order'=>'ASC'));
			foreach($childpages as $childpage){
			 ?>
        <li>
        <?php echo get_the_post_thumbnail($childpage->ID,'media-image'); ?>
        <h1><?php echo $childpage->post_title; ?></h1>
        <p><?php echo substr($childpage->post_excerpt,0,130); ?></p>
        </li>
       
        
        <?php } 
		echo '</ul></div></div>'; } ?>
    
 </div>
    </div>
    <!--hometab container--> 
  </div>
  <!--hometab-->
  <?php get_footer(); ?>