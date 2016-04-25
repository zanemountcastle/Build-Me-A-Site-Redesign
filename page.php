<?php get_header(); ?>

<div class="menu">
	<a href="localhost:8888/#splash">
		<img src="http://localhost:8888/wp-content/uploads/2016/03/build_me_a_site_logo_main.png">
	</a>
	<div class="buttons">
		<ul>
		  <li><a href = "localhost:8888/#about_us">about us</a></li>
		  <li><a href = "localhost:8888/#portfolio">portfolio</a></li>
		  <li><a href = "localhost:8888/#FAQ">FAQ</a></li>
		  <!-- hidden until screen width = 1000px -->
		  <li class="get_a_quote"><a href="localhost:8888/#quote_form">get a quote</a>
		</ul>
	</div>
	
	<div id="quote_button">
		<a href = "localhost:8888/#quote_form">get a quote</a>
	</div>

	<div id="menu_footer">
		<p>	
			London,<br>
			United Kingdom<br>
		</p>
		<img src="http://localhost:8888/wp-content/uploads/2016/03/small_menu_logo-1.png">
	</div>
</div>

<div class="content">
	<div id="splash">
		<div id="blog">
			<h1 id="section_title"><?php the_title();?></h1>
		</div>
	</div>

	<div id = "blog">
		<?php 
			$args = array(
					"post_type" => "post",
					'posts_per_page' => -1,
					"category_name" => "blog"
				);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : 
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
		?>
					<div class = "container">
						<div class="post_content">
							<a href = "<?php echo get_permalink(); ?>">
								<h2> <?php the_title(); ?> </h2>
							</a>
						</div>
					</div>
		<?php 	
				endwhile;

			else : 
		?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php
			wp_reset_postdata(); 
			endif;
		?>
	</div>
</div>
	
</body>

<?php get_footer(); ?>