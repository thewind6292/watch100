<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<div >
		<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
			<div class="row">
				<div class="col-sm-9">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/post/content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;

					endwhile; // End of the loop.
				?>
				</div>
				<div class="col-sm-3">
					<?php 
						$cat = get_the_category();
						$cat_id = $cat[0]->cat_ID;
					 $args_post = array(
						'posts_per_page'   => 5,
						'offset'           => 0,
						'category'         => $cat_id,
						'orderby'          => 'date',
						'order'            => 'DESC',
						'include'          => '',
						'exclude'          => '',
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'post_mime_type'   => '',
						'post_parent'      => '',
						'author'	   => '',
						'author_name'	   => '',
						'post_status'      => 'publish',
						'suppress_filters' => true 
					);
					$posts_array = get_posts( $args_post );
					?>

					<div class="news_home_right">
					    <div class="box-news-right">
					        <div class="title-news-right"><span>Các bài viết liên quan</span></div>
					        <?php foreach ($posts_array as $post) {
								?>
								<div class="news_list_body">
									<div class="news-hot"><a href="<?php echo get_permalink($post->ID); ?>">
										<?php the_post_thumbnail( $size, $attr ); ?>
										</a>
										<a class="post-title" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID ); ?></a>
										<div class="clear"></div>
									</div>
							    </div>
							<?php }
							?>
				     </div>
				</div>
			</div>
	</div>
</div><!-- .wrap -->

<?php get_footer();
