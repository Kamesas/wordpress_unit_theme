<?php 
	/*
		Template Name: Movie		
	*/
?>

<?php get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
	
			<?php
				// параметры по умолчанию
				$args = array(
					'numberposts' => 5,
					'category'    => 0,
					'orderby'     => 'date',
					'order'       => 'DESC',
					'include'     => array(),
					'exclude'     => array(),
					'meta_key'    => '',
					'meta_value'  =>'',
					'post_type'   => 'movie',
					'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
				);

				$posts = get_posts( $args );

				foreach($posts as $post){ setup_postdata($post);
					?>

				    <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				    <div>Стоимость сеанса: <?php the_field('price'); ?> $</div>
				    <div>Дата выхода: <?php the_field('дата_выхода'); ?> </div>
				    <?php the_excerpt(); ?>
				    <?php the_post_thumbnail(); ?> 

				<?php

				}
				wp_reset_postdata(); // сброс				
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


