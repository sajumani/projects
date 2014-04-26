<?php // Creating the widget 
class subpost_widget extends WP_Widget {

function __construct() {
parent::__construct('subpost_widget',__('Stay In Touch', 'subpost_widget_domain'), array( 'description' => __( 'This widget Display social icons', 'subpost_widget_domain' ), ) 
);
}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
	 $facebook = esc_attr($instance['facebook']);
     $twitter = esc_attr($instance['twitter']);
	 $linked = esc_attr($instance['linked']);
	 $rss = esc_attr($instance['rss']);
} else {
     $title = __( 'Stay In Touch', 'subpost_widget_domain' );
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Facebook', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('linked'); ?>"><?php _e('Linked In:', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('linked'); ?>" name="<?php echo $this->get_field_name('linked'); ?>" type="text" value="<?php echo $linked; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS:', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
</p>


<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
	  $instance['title'] = strip_tags($new_instance['title']);
      $instance['facebook'] = strip_tags($new_instance['facebook']);
      $instance['twitter'] = strip_tags($new_instance['twitter']);
	   $instance['linked'] = strip_tags($new_instance['linked']);
      $instance['rss'] = strip_tags($new_instance['rss']);
     return $instance;
}

// display widget
function widget($args, $instance) {
	// these are the widget options
	$title = apply_filters('widget_title', $instance['title']);
	$facebook = $instance['facebook'];
	$twitter = $instance['twitter'];
	$linked = $instance['linked'];
	$rss = $instance['rss'];
	
	
	$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	echo '<ul class="socialicon">';
	if ( ! empty( $facebook ) )
     echo '<li class="facebook"><a href="'.$facebook.'" target="_blank">Facebook</a> </li>';
	 if ( ! empty( $twitter ) )
     echo '<li class="twitter"><a href="'.$twitter.'" target="_blank">Twitter</a> </li>';
	 if ( ! empty( $linked ) )
     echo '<li class="linked"><a href="'.$linked.'" target="_blank">Linked In</a> </li>';
	 if ( ! empty( $rss ) )
     echo '<li class="rss"><a href="'.$rss.'" target="_blank">Rss</a> </li>';
	echo '</ul>';
	// This is where you run the code and display the output
	echo $args['after_widget'];

}

}

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'subpost_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );



// Creating the widget 
class postexpaned_widget extends WP_Widget {

function __construct() {
parent::__construct('postexpaned_widget',__('Display Latest News', 'postexpaned_widget_domain'), array( 'description' => __( 'This widget Display created post from selected category', 'postexpaned_widget_domain' ), ) 
);
}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $count = esc_attr($instance['count']);
	 $cate = esc_attr($instance['cate']);
} else {
     $title = __( 'Latest News', 'postexpaned_widget_domain' );
     $count = 0;
}
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'postexpaned_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('No of Projects to display:', 'postexpaned_widget'); ?></label>
<?php wp_dropdown_categories(array('show_option_all'=> 'Select Category','selected'=> $cate,'taxonomy'=> 'category','hide_if_empty' => false,'hierarchical'=>1,'name'=>$this->get_field_name('cate'))); ?>
</p>
<p>
<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('No of Post to display:', 'postexpaned_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" />
</p>

<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['count'] = strip_tags($new_instance['count']);
	  $instance['cate'] = strip_tags($new_instance['cate']);
     return $instance;
}

// display widget
function widget($args, $instance) {
	// these are the widget options
	$title = apply_filters('widget_title', $instance['title']);
	$count = $instance['count'];
	$cate = $instance['cate'];
	
	$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	echo '<ul>';
	
	 $newsargs = array( 'post_type'=>'post','numberposts' => $count,'orderby'=>'ID','order'=>'DESC','category'=>$cate);
            
            $mynews = wp_get_recent_posts( $newsargs );
            foreach ( $mynews as $mynew ): ?>
            
          <li><a href="<?php echo get_permalink($mynew["ID"]); ?>"><?php echo esc_attr($mynew["post_title"]); ?></a></li>
         <?php  endforeach; 
	echo '</ul>';
	// This is where you run the code and display the output
	echo $args['after_widget'];

}

}

// Register and load the widget
function postexpaned_load_widget() {
	register_widget( 'postexpaned_widget' );
}
add_action( 'widgets_init', 'postexpaned_load_widget' );