<script type="text/javascript">
	jQuery(document).ready(function(){
		
		jQuery.supersized({
		
			//Functionality
			slideshow               :   1,		//Slideshow on/off
			autoplay				:	0,		//Slideshow starts playing automatically
			start_slide             :   1,		//Start slide (0 is random)			
			pause_hover             :   0,		//Pause slideshow on hover
			keyboard_nav            :   0,		//Keyboard navigation on/off
			performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
			fit_portrait         	:   1,		//Portrait images will not exceed browser height
			fit_landscape			:   0,		//Landscape images will not exceed browser width			
			navigation              :   0,		//Slideshow controls on/off
			thumbnail_navigation    :   0,		//Thumbnail navigation
			slide_counter           :   0,		//Display slide numbers
			slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
			slides 					:  	[		//Slideshow Images
			
												<?php											
																						
												$posts = get_posts( array(
													'ignore_sticky_posts' => 1,
													'meta_key' => '_ttrust_in_home_slideshow_value',
													'meta_value' => 'true',
													'posts_per_page' => 20,
													'post_type' => array(
														'page',
														'post',
														'project'	
													)
												));
												?>
												<?php $c=0; ?>
												<?php $post_count = sizeof($posts); ?>	
												<?php foreach( $posts as $post ) : ?>
												<?php $c++; ?>													
												<?php $post_type = get_post_type($post->ID); ?>
															
												{image : '<?php echo MultiPostThumbnails::get_the_post_thumbnail_url($post_type, "background_image", $post->ID, "ttrust_background_image_full"); ?>'}<?php if($c < $post_count) echo',';?>  
												<?php endforeach; ?>
										]
										
		});
		
    });    
</script>