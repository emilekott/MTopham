<?php /*
Template Name: Portfolio
*/ ?>
<?php get_header(); ?>	
			<?php if(!is_front_page()):?>
			<div id="pageHead" class="withBorder">
				<h1><?php the_title(); ?></h1>
				<?php $page_description = get_post_meta($post->ID, "_ttrust_page_description_value", true); ?>
				<?php if ($page_description) : ?>
					<p><?php echo $page_description; ?></p>
				<?php endif; ?>				
			</div>
			<?php endif; ?>			

			<div id="content" class="fullProjects clearfix full">									
				<?php while (have_posts()) : the_post(); ?>											
					<?php the_content(); ?>														
				<?php endwhile; ?>				
				<?php get_template_part( 'part-projects'); ?>				
			</div>
	
<?php get_footer(); ?>