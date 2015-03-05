<?php
/**
 * @package minimalsimple
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __(',','minimalsimple'));

		if ( minimalsimple_categorized_blog()){
			echo'<div class="category-list">' . $category_list . '</div>';
		}
	?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php minimalsimple_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'minimalsimple' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<?php 
		echo get_the_tag_list ('<ul><li><i class="fa fa-tag"></i>','</li><li><i class="fa fa-tag"></i>','</li></ul>');
	?>
		<?php minimalsimple_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
