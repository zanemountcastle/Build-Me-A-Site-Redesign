<?php get_header(); ?>

<div class="menu">
	<a href="#splash">
		<img src="http://localhost:8888/wp-content/uploads/2016/03/build_me_a_site_logo_main.png">
	</a>
	<ul>
	  <li><a href = "#about_us">about us</a></li>
	  <li><a href = "#portfolio">portfolio</a></li>
	  <li><a href = "#FAQ">FAQ</a></li>
	  <li><a href = "#quote_form">contact us</a></li>
	</ul>
	<div id="quote_button">
		<a href = "#quote_form">get a quote</a>
	</div>
	<div id="menu_footer">
		<p>	
			Build Me A Site, Ltd. <br>
			Unit 9 Imperial Studios <br>
			3-7 Imperial Road, Fulham <br>
			London, SW6 2AG <br>
			United Kingdom <br>
		</p>
		<img src="http://localhost:8888/wp-content/uploads/2016/03/small_menu_logo-1.png">
	</div>
</div>

<div class="content">	

	<?php 	
		while(have_posts()) : the_post();
		endwhile; 
	?>
	<div id = "slash_wrapper">
		<div id="splash">
			<img src="http://localhost:8888/wp-content/uploads/2016/03/computer_illustration.png">
			<?php the_title();?>
			<?php the_content();?>
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
								<h2><?php the_sub_field("title"); ?></h2>
								<p><?php the_sub_field("content"); ?></p>
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
								<?php the_post_thumbnail(); ?> 
							</a>
						</div>
						<h2> <?php the_title(); ?> </h2>
						<p> <?php the_content(); ?> </p>
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
		<div id="section_title"> <?php the_field("FAQ_Title"); ?> </div>
		<div class="questions"> <?php the_field("content") ?> </div>
	</div>

	<div id = "quote_form">
		<h1 id = "section_title">get a quote</h1>
	</div>

</div>
	
</body>

<?php get_footer(); ?>