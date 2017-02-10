<?php
global $wp_query;

if ( 1 === $wp_query->found_posts || ! woocommerce_products_will_display() ) {
	return;
}

$orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
	'menu_order' => __( 'Sản phẩm mới', 'woocommerce' ),
	'price'      => __( 'Giá tăng dần', 'woocommerce' ),
	'price-desc' => __( 'Giá giảm dần', 'woocommerce' )
) );

if ( ! $show_default_orderby ) {
	unset( $catalog_orderby_options['menu_order'] );
}

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	unset( $catalog_orderby_options['rating'] );
} ?>

<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>