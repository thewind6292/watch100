<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="row">
		<?php echo '<h2 class="title-page">'.get_the_title().'</h2>'; ?>
		<div class="main-content col-sm-10 col-sm-offset-1">
			<?php
				the_content();
			?>
</article><!-- #post-## -->
