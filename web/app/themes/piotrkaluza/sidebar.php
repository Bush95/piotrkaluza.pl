<aside class="sidebar">
	<?php // Latest news list ?>
	<?php 
		$query_args = array(
			'posts_per_page' => 5
		);
		$latest_posts = new WP_Query( $query_args ); 
	?>
	
	<h2 class="sidebar-title">Najnowsze artykuły</h2>
	<ul class="post-list">
		<?php while ($latest_posts->have_posts()): $latest_posts->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
    <?php wp_reset_query(); ?>
	
	<?php // Popular news list ?>
	<?php 
		$query_args = array(
			'posts_per_page' => 4, 
			'meta_key' => 'wpb_post_views_count', 
			'orderby' => 'meta_value_num', 
			'order' => 'DESC' 
		);
		$popular_posts = new WP_Query( $query_args ); 
	?>
	
	<h2 class="sidebar-title">Najczęściej czytane</h2>
	<ul>
		<?php while ($popular_posts->have_posts()): $popular_posts->the_post(); ?>
			<li>
				<?php echo get_template_part('template-parts/block', 'post-small'); ?>
			</li>
		<?php endwhile; ?>
	</ul>
    <?php wp_reset_query(); ?>
	
	<?php // Category list ?>
	<?php $categories = get_categories(); ?>
	<h2 class="sidebar-title">Kategorie</h2>
	<ul class="category-list">
		<?php foreach ($categories as $category): ?>
			<li>
				<a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php // Popular news list ?>
	<h2 class="sidebar-title">Instagram</h2>
	<?php echo do_shortcode( '[instagram-feed]' ); ?>

	<?php // Search form ?>
	<h2 class="sidebar-title">Szukaj</h2>
	<?php echo get_search_form(); ?>


</aside>