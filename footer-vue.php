<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beetroot
 */

?>


<?php wp_footer(); ?>
<script src='<?php echo get_stylesheet_directory_uri().'/assets/dist/javascript/vue.js' ?>'></script>
<script src='<?php echo get_stylesheet_directory_uri().'/assets/dist/javascript/vue-resource.min.js' ?>'></script>
<script src='<?php echo get_stylesheet_directory_uri().'/assets/dist/javascript/vue-router.js' ?>'></script>
<script src="https://cdn.jsdelivr.net/vue2-filters/0.1.6/vue2-filters.min.js"></script>
<script src='<?php echo get_stylesheet_directory_uri().'/assets/dist/javascript/app.js' ?>'></script>
</body>
</html>
