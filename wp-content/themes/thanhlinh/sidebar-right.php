<?php get_sidebar(); ?>
<script>
	waitJquery(function(){
		jQuery('#sibar-left').addClass('sidebar-right');
		setTimeout(function(){ jQuery('#sibar-left').addClass('sidebar-right'); },5000);
	});

</script>