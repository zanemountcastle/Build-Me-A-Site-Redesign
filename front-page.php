<?php get_header(); ?>

<div class="menu">
	<a href="#splash">
		<img src="http://localhost:8888/wp-content/uploads/2016/03/build_me_a_site_logo_main.png">
	</a>
	<div class="buttons">
		<ul>
		  <li><a href = "#about_us">about us</a></li>
		  <li><a href = "#portfolio">portfolio</a></li>
		  <li><a href = "#FAQ">FAQ</a></li>
		  <!-- hidden until screen width = 1000px -->
		  <li class="get_a_quote"><a href="#quote_form">get a quote</a>
		</ul>
	</div>
	
	<div id="quote_button">
		<a href = "#quote_form">get a quote</a>
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

	<?php 	
		while(have_posts()) : the_post();
		endwhile; 
	?>
	<div id = "splash_wrapper">
		<div id="splash">
			<div id="main">
				<img src="http://localhost:8888/wp-content/uploads/2016/03/computer_illustration.png">
				<?php the_title();?>
			</div>
			<div id="down-arrow">
				<img src="http://localhost:8888/wp-content/uploads/2016/04/down-arrow-01.png">
			</div>
		</div>
	</div>


	<div id = "about_us">
			<div class = "about_us_head">
				<h1 id="section_title"> <?php the_field("What_We_Do_Title"); ?> </h1>	
				<img src="http://localhost:8888/wp-content/uploads/2016/03/build_me_a_site_logo_icon_black.png">
				<p> <?php the_field("snippet"); ?></p>
			</div>

			<div class = "about_us_body">
				<?php 
					// check if the repeater field has rows of data
					if( have_rows('what_we_do') ):
					 	// loop through the rows of data
					    while ( have_rows('what_we_do') ) : the_row(); 
							$img = get_sub_field("image");
				?>
							<div class="container">
								<img src= "<?php echo $img['url']; ?>">
								<div class="text">
									<h2><?php the_sub_field("title"); ?></h2>
									<p><?php the_sub_field("content"); ?></p>
								</div>
							</div>
				<?php

						endwhile;

					else :
					    // no rows found

					endif;
				?>				 
			</div>
	</div>


	<div id = "portfolio">
		<h1 id = "section_title">some past work</h1>

		<?php 
			$args = array(
					"post_type" => "post",
					"numberposts" => -1
				);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : 
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
		?>
					<div class = "container">
						<div id="thumbnail"> 
							
							<a href="<?php echo get_field("portfolio_link"); ?>" target="_blank">
							<!-- <a href="<?php echo get_field("portfolio_link"); ?>" height="450" width="281"target="_blank"> -->
								<?php 
								//automatically resize tumbnail to 450x281 by cropping
							add_image_size('portfolio_thumbnail_size', 450, 281, true);
							the_post_thumbnail('portfolio_thumbnail_size')
							?>
							</a>
						</div>
						<div class="post_content">
							<h2> <?php the_title(); ?> </h2>
							<p> <?php the_content(); ?> </p>
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

	<div id = "FAQ">
		<?php 	
			while(have_posts()) : the_post();
		?>
		<h1 id = "section_title"><?php the_field("FAQ_Title") ?></h1>
		<div class="questions"> <?php the_field("content"); ?> </div>
		<?php
			endwhile; 
		?>
	</div>

	<div id = "quote_form">
		<h1 id = "section_title">get a quote</h1>
		<?php 	
			while(have_posts()) : the_post();
		?>

		<div class="contact_form"> <?php the_content();?> </div>

		<?php
			endwhile; 
		?>
	</div>

</div>
	
</body>

<?php get_footer(); ?>

















