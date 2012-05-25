<?php /*
Template Name: Home
*/ ?>
<?php get_header(); ?>
<div id="content" class="full">

<?php $call_to_action_text = of_get_option('ttrust_cta_text'); ?>
<?php if($call_to_action_text) : ?>	
<div id="callToAction" class="clearfix">
	<p>	<?php echo $call_to_action_text; ?></p>
	<a href="<?php echo of_get_option('ttrust_cta_btn_link'); ?>" class="button"><?php echo of_get_option('ttrust_cta_btn_text'); ?></a>	
</div>
<?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
    <div id="home-intro" class="clearfix">
        
        <?php the_content(); ?>
        
    </div>
    <?php endwhile; ?>

<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	
<div id="projects" class="full homeSection clearfix">			
	<h3><span><?php echo of_get_option('ttrust_recent_projects_title'); ?></span></h3>		
	<?php
	query_posts( array(
		'ignore_sticky_posts' => 1,    			
    	'posts_per_page' => of_get_option('ttrust_home_project_count'),
    	'post_type' => array(				
		'project'					
		)
	));
	?>		
					
	<div class="thumbs masonry">			
		<?php  while (have_posts()) : the_post(); ?>			
			<?php get_template_part( 'part-project-thumb'); ?>
		<?php endwhile; ?>
		<?php wp_reset_query();	?>		
	</div>
</div>
<?php endif; ?>

<?php $home_post_count = intval(of_get_option('ttrust_home_post_count')); ?>
<?php if($home_post_count > 0) : ?>
<div id="posts" class="full homeSection clearfix">			
	<h3><span><?php echo of_get_option('ttrust_recent_posts_title'); ?></span></h3>		
	<?php
	query_posts( array(
		'ignore_sticky_posts' => 1,    			
    	'posts_per_page' => $home_post_count,
    	'post_type' => array(				
		'post'					
		)
	));
	?>
	<div class="homePosts">
	<?php while (have_posts()) : the_post(); ?>			    
		<div <?php post_class('small'); ?>>	
			<a class="thumb" href="<?php the_permalink() ?>" rel="bookmark" ><?php the_post_thumbnail("ttrust_one_fourth_short", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>			
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h1>
			<div class="meta clearfix">					
				<span class="date"><?php the_time( 'M j, Y' ); ?></span><span> | </span>				
				<a class="comments" href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'themetrust'), __('One Comment', 'themetrust'), __('% Comments', 'themetrust')); ?></a>
			</div>
			<?php print_excerpt(get_the_title()); ?>
			<?php //the_excerpt(); ?>
			<?php more_link(); ?>		
		</div>
	<?php endwhile; ?>
	<?php wp_reset_query();	?>
	</div>
</div>
<?php endif; ?>

<?php $clients_content = of_get_option('ttrust_clients_content'); ?>
<?php if ($clients_content) :?>
<div id="clients" class="full homeSection clearfix">
	<h3><span><?php echo of_get_option('ttrust_clients_title'); ?></span></h3>
	<?php echo $clients_content; ?>
</div>
<?php endif; ?>

</div>

<?php get_footer(); ?>	