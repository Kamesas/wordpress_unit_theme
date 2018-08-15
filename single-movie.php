<?php get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">			
			
	    <?php while ( have_posts() ) : the_post(); ?>
				
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<?php the_terms( get_the_ID(), 'Genres', 'Жанры: ', '/', "." ); ?>
		    <?php the_content() ?>
		    <?php the_post_thumbnail(); ?>				

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


