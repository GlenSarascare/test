<?php
/**
 * Archives Page!
 * 
 * This page is used for all kind of archives from custom post types to blog to 'by date' archives.
 * 
 * Bunyad framework recommends this template to be used as generic template wherever any sort of listing 
 * needs to be done.
 * 
 * Types of archives handled:
 * 
 *  - Categories
 *  - Tags
 *  - Taxonomies
 *  - Author Archives
 *  - Date Archives
 * 
 * @link http://codex.wordpress.org/images/1/18/Template_Hierarchy.png
 */


// Set default loop template
$loop_template = Bunyad::options()->archive_loop;

// Have a sidebar preference for archives?
if (Bunyad::options()->archive_sidebar) {
	Bunyad::core()->set_sidebar(
		Bunyad::options()->archive_sidebar
	);
}

get_header();

// Defaults for archive header
$bg_text  = esc_html__('Browsing', 'cheerup');
$subtitle = esc_html__('Archive', 'cheerup');
$heading  = single_term_title('', false);

// For archives that support it
$description = get_the_archive_description();

?>

	<div class="archive-head ts-contain">
	
	<?php if (is_tag()): ?>
	
		<?php
		
		/**
		 * Setup heading for tags
		 */
		$subtitle = esc_html__('Tag', 'cheerup');
		
		?>
	
	<?php elseif (is_category()): // category page ?>
	
		<?php 
		
		/**
		 * Category archives setup
		 */
		
		$loop_template = Bunyad::options()->category_loop;
		
		$subtitle = $bg_text = esc_html__('Category', 'cheerup');
		
		?>

		
	<?php elseif (is_search()): // search ?>
	
		<?php 
		
		/**
		 * Search archives setup
		 */
		$loop_template = Bunyad::options()->search_loop;
		
		$heading   = get_search_query();
		$bg_text   = esc_html__('Search', 'cheerup');
		$subtitle  = sprintf(esc_html__('%s Results', 'cheerup'), intval($wp_query->found_posts)); 
		 
		?>
		
	<?php elseif (is_author()): // author archives ?>
		
		<?php 
		
		/**
		 * Setup author archives header
		 */
		
		$authordata = get_userdata(get_query_var('author'));
		$subtitle   = esc_html__('Author', 'cheerup');
		$heading    = get_the_author();
		
		?>	
		
		
	<?php else: ?>
	
		<?php
		
			/**
			 * Set heading based on archives, fallback to WordPress 4.1+ default
			 * 
			 * @see get_the_archive_title()
			 */
			
			if (is_day()) {
				$heading = get_the_date('F j, Y');
			}
			else if (is_month()) {
				$heading =  get_the_date('F Y');
			}
			else if (is_year()) {
				$heading = get_the_date('Y');
			}		
		?>
	
	<?php endif; ?>

		<span class="sub-title"><?php echo esc_html($subtitle); ?></span>
		<h2 class="title"><?php echo esc_html($heading); ?></h2>
		
		<i class="background"><?php echo esc_html($bg_text); ?></i>
		
		<?php if (!empty($description) && Bunyad::options()->archive_descriptions): ?>
		
			<div class="wrap description"><?php echo get_the_archive_description(); ?></div>
		
		<?php endif; ?>

		<?php Bunyad::helpers()->breadcrumbs(); ?>
	
	</div>


	<div class="main wrap">
		<div class="ts-row cf">
			<div class="col-8 main-content cf">
		
			<?php 
			
			if (is_search() && !have_posts()) {
			
				// Not found message
				get_template_part('partials/no-results');
				
			}
			else {
				// Render our loop
				Bunyad::helpers()->loop($loop_template);
			}
	
			?>
	
			</div> <!-- .main-content -->
			
			<?php Bunyad::core()->theme_sidebar(); ?>
			
		</div> <!-- .ts-row -->
	</div> <!-- .main -->

<?php get_footer(); ?>