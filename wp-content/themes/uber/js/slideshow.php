<?php $slideshow_delay = of_get_option('ttrust_slideshow_delay'); ?>
<?php $autoPlay = ($slideshow_delay != "0") ? 1 : 0; ?>
<?php $slideshow_effect = of_get_option('ttrust_slideshow_effect'); ?>
<?php $before_action = (is_front_page() && of_get_option('ttrust_bkg_slideshow_enabled')) ? "api.goTo(slider.currentSlide+1);" : ""?>
<script type="text/javascript">
//<![CDATA[

jQuery(window).load(function() {			
	jQuery('.flexslider').flexslider({
		slideshowSpeed: <?php echo $slideshow_delay . '000'; ?>,  
		directionNav: true,
		slideshow: <?php echo $autoPlay; ?>,				 				
		animation: '<?php echo $slideshow_effect; ?>',
		animationLoop: true,
		after: function(slider) {				
				<?php if(!is_mobile()) echo $before_action; ?>						
		}	
	});  
});

//]]>
</script>