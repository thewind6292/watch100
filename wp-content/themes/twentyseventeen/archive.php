<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="container">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		    <?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>
		<br>
		<div class="col-sm-9">
			<div class="row">
				<?php echo '<h2 class="title-page">'.get_the_category()[0]->name.'</h2>'; ?>
			<?php
			while ( have_posts() ) : the_post();?>
				<div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 blog-post">
                    <div class="first-item-nh">
                        
                        <a href="<?php the_permalink(); ?>" title="">
                        	<?php the_post_thumbnail( $size, $attr ); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>" class="title-first-nh" title=""><?php the_title(); ?></a>
                        <div class="date-nh">
                            <?php echo get_the_date('d/m/y',get_the_id()); ?> </div>
                        <div class="summary-nh">
                            <span><?php the_excerpt(); ?></span>
                        </div>
                    </div>
                </div>
			<?php endwhile; // End of the loop.
			?>
			</div>	
		</div>
		<div class="col-sm-3">
			<div class="news_home_right danh-muc">
			    <div class="box-news-right">
			        <div class="title-news-right"><span>Các danh mục</span></div>
					<?php
					$categories = get_categories( array(
					    'orderby' => 'name',
					    'order'   => 'ASC',
					    'hide_empty'   => 0
					) );
					echo "<ul>"; 
					foreach( $categories as $category ) {
					    $category_link = sprintf( 
					        '<a href="%1$s" alt="%2$s">%3$s</a>',
					        esc_url( get_category_link( $category->term_id ) ),
					        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
					        esc_html( $category->name )
					    );

					    echo '<li>'.$category_link.'('.$category->count.')</li>';   
					}
					echo "</ul>"; 
					?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();
