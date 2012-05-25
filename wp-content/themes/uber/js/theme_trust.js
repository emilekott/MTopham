
///////////////////////////////		
// iPad and iPod Detection
///////////////////////////////
	
function isiPad(){
    return (navigator.platform.indexOf("iPad") != -1);
}

function isiPhone(){
    return (
        //Detect iPhone
        (navigator.platform.indexOf("iPhone") != -1) || 
        //Detect iPod
        (navigator.platform.indexOf("iPod") != -1)
    );
}


///////////////////////////////		
// Isotope Browser Check
///////////////////////////////

function isotopeAnimationEngine(){
	if(jQuery.browser.mozilla || jQuery.browser.msie){
		return "jquery";
	}else{
		return "css";
	}
}


///////////////////////////////
// Project Filtering 
///////////////////////////////

function projectFilterInit() {
	jQuery('#filterNav a').click(function(){
		var selector = jQuery(this).attr('data-filter');	
		jQuery('#projects .thumbs').isotope({
			filter: selector,			
			hiddenStyle : {
		    	opacity: 0,
		    	scale : 1
			}			
		});
	
		if ( !jQuery(this).hasClass('selected') ) {
			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
		}
	
		return false;
	});	
}


///////////////////////////////
// Project thumbs 
///////////////////////////////

function projectThumbInit() {
	
	if(!isiPad() && !isiPhone()) {		
		jQuery("#content.fullProjects .project.small img").hover(
			function() {
				jQuery(this).stop().fadeTo("fast", .5);
			},
			function() {
				jQuery(this).stop().fadeTo("fast", 1);
		});
	}
	
	jQuery('.thumbs.masonry').isotope({
		// options
		itemSelector : '.project.small',
		layoutMode : 'masonry',
		animationEngine: isotopeAnimationEngine()
	});	
	
	jQuery(".project.small").css("opacity", "1");
	
	jQuery('.homePosts').isotope({
		// options
		itemSelector : '.post.small',
		layoutMode : 'masonry',
		animationEngine: isotopeAnimationEngine()
	});	
	
}


	
	
jQuery.noConflict();
jQuery(document).ready(function(){
	
	
	projectThumbInit();	
	projectFilterInit();
	jQuery(".videoContainer").fitVids();	
	
});