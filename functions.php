<!-- 
Theme Name: Build Me a Site
Author: Zane Mountcastle
Version: 1.0 
 -->

<?php
add_theme_support( 'post-thumbnails' ); 
add_action( 'wp_enqueue_scripts()', 'bmas_script_enqueue()');