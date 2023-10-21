<?php
if(is_archive()){
	$page_layout = Tronix_options('Tronix_archive_layout', 'right-sidebar');
}else if(is_search()){
	$page_layout = Tronix_options('Tronix_search_layout', 'right-sidebar');
}else{
	$page_layout = Tronix_options('Tronix_blog_layout', 'right-sidebar');
}

if($page_layout == 'left-sidebar' && is_active_sidebar('sidebar') || $page_layout == 'grid-ls' && is_active_sidebar('sidebar') || $page_layout == 'right-sidebar' && is_active_sidebar('sidebar') || $page_layout == 'grid-rs' && is_active_sidebar('sidebar')){
	$page_column_class = 'col-lg-8';
}else{
	$page_column_class = 'col-lg-12';
}
$show_pagination = Tronix_options('Tronix_show_pagination', true );
?>
<div class="row content-<?php echo esc_attr($page_layout);?>">
	<?php if( $page_layout == 'left-sidebar' && is_active_sidebar('sidebar') || $page_layout == 'grid-ls' && is_active_sidebar('sidebar')) : ?>
		<?php get_sidebar();?>
	<?php endif ?>
	<div class="<?php echo esc_attr($page_column_class);?>">
		<div class="row all-posts-wrapper">
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif;

				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post/post-item-wrapper' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>

		<?php 
			if( $show_pagination == true  ){
				get_template_part( 'template-parts/post/post-pagination' );
			}
		?>
	</div>

	<?php if($page_layout == 'right-sidebar' && is_active_sidebar('sidebar') || $page_layout == 'grid-rs' && is_active_sidebar('sidebar')) : ?>
		<?php get_sidebar();?>
	<?php endif ?>
</div>
