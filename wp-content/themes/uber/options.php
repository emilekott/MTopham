<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Home Content
	$home_content = array("projects" => "Projects ", "posts" => "Posts");	
	
	// Home Project Type
	$home_project_type = array("all" => "All projects", "featured" => "Featured");
	
	// Project Thumb Layout
	$project_thumb_layout = array("masonry" => "Masonry", "grid" => "Grid");
	
	// Post Featured Image Size
	$post_featured_image_size = array("large" => "Large", "small" => "Small");
	
	// Slideshow Transition Effect
	$slideshow_effect = array("slide" => "Slide", "fade" => "Fade");
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => __('General','themetrust'),
						"type" => "heading");	
	
	$options[] = array( "name" => __('Logo','themetrust'),
						"desc" => __('Upload a custom logo.','themetrust'),
						"id" => "logo",
						"type" => "upload");
						
	$options[] = array( "name" => __('Favicon','themetrust'),
						"desc" => __('Upload a custom favicon.','themetrust'),
						"id" => "ttrust_favicon",
						"type" => "upload");					
		
	
	$options[] = array( "name" => __('Custom CSS','themetrust'),
						"desc" => __('Enter custom CSS here.','themetrust'),
						"id" => "ttrust_custom_css",
						"std" => "",
						"type" => "textarea");					
					
						
	$options[] = array( "name" => __('Appearance','themetrust'),
						"type" => "heading");	
						
	$options[] = array( "name" => __('Menu Color','themetrust'),
						"desc" => __('Select a color for your menu links.','themetrust'),
						"id" => "ttrust_color_menu",
						"std" => "#8f8f8f",
						"type" => "color");
						
	$options[] = array( "name" => __('Menu Hover Color','themetrust'),
						"desc" => __('Select a hover color for your menu links.','themetrust'),
						"id" => "ttrust_color_menu_hover",
						"std" => "#2e2e2e",
						"type" => "color");
						
	$options[] = array( "name" => __('Button Color','themetrust'),
						"desc" => __('Select a color for your buttons.','themetrust'),
						"id" => "ttrust_color_btn",
						"std" => "#757575",
						"type" => "color");
						
	$options[] = array( "name" => __('Button Hover Color','themetrust'),
						"desc" => __('Select a hover color for your buttons.','themetrust'),
						"id" => "ttrust_color_btn_hover",
						"std" => "#595959",
						"type" => "color");
						
	$options[] = array( "name" => __('Link Color','themetrust'),
						"desc" => __('Select a color for your links.','themetrust'),
						"id" => "ttrust_color_link",
						"std" => "#77a7b9",
						"type" => "color");

	$options[] = array( "name" => __('Link Hover Color','themetrust'),
						"desc" => __('Select a hover color for your links.','themetrust'),
						"id" => "ttrust_color_link_hover",
						"std" => "#8dc7dc",
						"type" => "color");
						
	$options[] = array( "name" => __('Font for Headings','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for headings.','themetrust'),
						"id" => "ttrust_heading_font",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Font for Body Text','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the body text.','themetrust'),
						"id" => "ttrust_body_font",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Font for Call to Action Box','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the call to action box text.','themetrust'),
						"id" => "ttrust_call_to_action_font",
						"std" => "",
						"type" => "text");
						
	
						
	$options[] = array( "name" => __('Home Page','themetrust'),
						"type" => "heading");
						
	$options[] = array( "name" => __('Enable Slideshow','themetrust'),
						"desc" => __('Check this box to enable the home page slideshow.','themetrust'),
						"id" => "ttrust_slideshow_enabled",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Deactivate Slideshow Links','themetrust'),
						"desc" => __('Check this box to disable the links of slideshow images.','themetrust'),
						"id" => "ttrust_slide_deactivate_links",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Enable Background Slideshow','themetrust'),
						"desc" => __('Check this box to enable the home page background slideshow.','themetrust'),
						"id" => "ttrust_bkg_slideshow_enabled",
						"std" => "0",
						"type" => "checkbox");
						
						
	$options[] = array( "name" => __('Call to Action Text','themetrust'),
						"desc" => __('Enter text that will appear in the call to action box.','themetrust'),
						"id" => "ttrust_cta_text",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Call to Action Button Text','themetrust'),
						"desc" => __('Enter text that will appear in the call to action button.','themetrust'),
						"id" => "ttrust_cta_btn_text",
						"std" => "Learn More",
						"type" => "text");
						
	$options[] = array( "name" => __('Call to Action Button Link','themetrust'),
						"desc" => __('Enter the URL that you want the call to action button to link to.','themetrust'),
						"id" => "ttrust_cta_btn_link",
						"std" => "#",
						"type" => "text");
						
	$options[] = array( "name" => __('Recent Projects Title','themetrust'),
						"desc" => __('Enter the title that will appear above the recent projects section on the home page.','themetrust'),
						"id" => "ttrust_recent_projects_title",
						"std" => "Recent Projects",
						"type" => "text");	
						
	$options[] = array( "name" => __('Number of Projects to Show','themetrust'),
						"desc" => __('Enter the number of project to show on the home page.','themetrust'),
						"id" => "ttrust_home_project_count",
						"std" => "4",
						"type" => "text");
						
	$options[] = array( "name" => __('Recent Posts Title','themetrust'),
						"desc" => __('Enter the title that will appear above the recent posts section on the home page.','themetrust'),
						"id" => "ttrust_recent_posts_title",
						"std" => "Recent Posts",
						"type" => "text");
						
	$options[] = array( "name" => __('Number of Posts to Show','themetrust'),
						"desc" => __('Enter the number of posts to show on the home page.','themetrust'),
						"id" => "ttrust_home_post_count",
						"std" => "4",
						"type" => "text");
						
	$options[] = array( "name" => __('Clients Section Title','themetrust'),
						"desc" => __('Enter the title that will appear above the clients section on the home page.','themetrust'),
						"id" => "ttrust_clients_title",
						"std" => "Our Clients",
						"type" => "text");
						
	$options[] = array( "name" => __('Clients Section Content','themetrust'),
						"desc" => __('Enter content for the clients section. You can enter HTML here.','themetrust'),
						"id" => "ttrust_clients_content",
						"std" => "",
						"type" => "textarea");
						
						
	$options[] = array( "name" => __('Slideshow','themetrust'),
						"type" => "heading");


	

	$options[] = array( "name" => __('Slideshow Delay','themetrust'),
						"desc" => __('Enter the delay in seconds between slides. Enter 0 to disable auto-playing.','themetrust'),
						"id" => "ttrust_slideshow_delay",
						"std" => "6",
						"type" => "text");

	$options[] = array( "name" => __('Slideshow Effect','themetrust'),
						"desc" => __('Select the type of transition effect for the slideshow.','themetrust'),
						"id" => "ttrust_slideshow_effect",
						"std" => "fade",
						"type" => "select",
						"options" => $slideshow_effect);	
						
						
	$options[] = array( "name" => __('Posts','themetrust'),
						"type" => "heading");
						
	$options[] = array( "name" => __('Show Author','themetrust'),
						"desc" => __('Check this box to show the author.','themetrust'),
						"id" => "ttrust_post_show_author",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Date','themetrust'),
						"desc" => __('Check this box to show the publish date.','themetrust'),
						"id" => "ttrust_post_show_date",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Category','themetrust'),
						"desc" => __('Check this box to show the category.','themetrust'),
						"id" => "ttrust_post_show_category",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Comment Count','themetrust'),
						"desc" => __('Check this box to show the comment count.','themetrust'),
						"id" => "ttrust_post_show_comments",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Featured Image Size','themetrust'),
						"desc" => __('Select the size of the post featured image.','themetrust'),
						"id" => "ttrust_post_featured_img_size",
						"std" => "large",
						"type" => "select",
						"options" => $post_featured_image_size);
						
	$options[] = array( "name" => __('Show Featured Image on Single Posts','themetrust'),
						"desc" => __('Check this box to show the featured image on single post pages.','themetrust'),
						"id" => "ttrust_post_show_featured_image",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Select a Page",
						"desc" => "Select the page you're using as your blog page. This is used to show the blog title at the top of your posts.",
						"id" => "ttrust_blog_page",
						"type" => "select",
						"options" => $options_pages);
						
	$options[] = array( "name" => __('Footer','themetrust'),
						"type" => "heading");
						
	$options[] = array( "name" => __('Left Footer Text','themetrust'),
						"desc" => __('This will appear on the left side of the footer.','themetrust'),
						"id" => "ttrust_footer_left",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => __('Right Footer Text','themetrust'),
						"desc" => __('This will appear on the right side of the footer.','themetrust'),
						"id" => "ttrust_footer_right",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Integration','themetrust'),
						"type" => "heading");	
						
	$options[] = array( "name" => __('Analytics','themetrust'),
						"desc" => __('Enter your custom analytics code. (e.g. Google Analytics).','themetrust'),
						"id" => "ttrust_analytics",
						"std" => "",
						"type" => "textarea",
						"validate" => "none");
						
	
	
						
	
	return $options;
}