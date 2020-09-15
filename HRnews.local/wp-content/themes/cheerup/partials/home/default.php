<?php 
/**
 * Template for home: Default Blog loop style
 */
?>

<div class="ts-row cf">
	<div class="col-8 main-content cf">
	
		<?php 
			// Render our loop
			Bunyad::helpers()->loop((!empty($loop) ? $loop : 'loop')); 
		?>
		
	</div>
	
	<?php Bunyad::core()->theme_sidebar(); ?>
</div>