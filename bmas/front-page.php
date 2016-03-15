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
	<div class="quote_button">
		<a href = "#quote_form">get a quote</a>
	</div>

</div>

<div class="content">	

	<?php while(have_posts()) : the_post();?>
	<?php endwhile; ?>

	<div id="splash">
		<img src="http://localhost:8888/wp-content/uploads/2016/03/computer_illustration.png">
		<?php the_title();?>
		<?php the_content();?>
	</div>

	<div id = "about_us">
			<h1 class="section_title"> <?php the_field("What_We_Do_Title"); ?> </h1>
			
			<img class="about_us_main" src="http://localhost:8888/wp-content/uploads/2016/03/build_me_a_site_logo_icon_black.png">
			<div class="snippet"> <?php the_field("snippet"); ?> </div>
				<?php
					// check if the repeater field has rows of data
					if( have_rows('what_we_do') ):

					 	// loop through the rows of data
					    while ( have_rows('what_we_do') ) : the_row(); 
							$img = get_sub_field("image");
				?>
							<div class="section">
									<img src="<?php echo $img['url']; ?>">
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
		<h1 class = "section_title">some past work</h1>
	</div>

	<div id = "FAQ">
		<div class="section_title"> <?php the_field("FAQ_Title"); ?> </div>
		<div class="content"> <?php the_field("content") ?> </div>
	</div>

	<div id = "quote_form">
		<h1 class = "section_title">get a quote</h1>
	</div>


</div>
	
</body>

<?php get_footer(); ?>