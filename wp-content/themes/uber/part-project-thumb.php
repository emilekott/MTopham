<?php global $p; ?>
<div class="project small <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
	<a href="<?php the_permalink(); ?>" rel="bookmark" >	
		<?php the_post_thumbnail("ttrust_one_fourth_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		<span class="title"><?php the_title(); ?></span>
	</a>																																
</div>