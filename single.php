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
	<div id="single-post">
		<div class="single">
			<?php if (have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<p> <?php the_content(); ?> </p>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
		<div class="recommended">
		<h2>related posts</h2>
			<h3 class="previous_post"><?php previous_post_link('%link', '%title', true); ?></h3>
			<h3 class="next_post"><?php next_post_link('%link', '%title', true); ?></h3>
		</div>
	</div>



</div>
	
</body>

<?php get_footer(); ?>