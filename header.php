<!-- 
Theme Name: Build Me a Site
Author: Zane Mountcastle
Version: 1.0 
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Build Me A Site</title>
		<?php wp_head(); ?>

		<?php if( is_page_template('functions.php')  ) :?>
			
			<!-- CSS -->
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css?<?php echo time(); ?>" media="screen" type="text/css" />
			
			<!-- Google Fonts: Roboto Light (300), Regular (400), Medium (500), Bold (700) -->
			<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700' rel='stylesheet' type='text/css'>

		<?php else:?>
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<?php endif;?>

	</head>

	<body>