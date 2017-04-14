<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generate param type "number"
 *
 * @param $settings
 * @param $value
 *
 * @return string
 */

// get all files from a folder
if(! function_exists('pandora_get_all_files'))
{
	function pandora_get_all_files($dir)
	{
		$file_read = array( 'php' );
		$result = array();
		if(is_dir($dir)){
			$cdir  	= scandir($dir);

			foreach($cdir as $key => $value)
			{

				if(!in_array($value, array(".", "..")))
				{
					if(is_file($dir . DIRECTORY_SEPARATOR . $value))
					{
						$type = explode( '.', $value ); 
			            $type = array_reverse( $type );
			            if( !in_array( $type[0], $file_read ) ) {
			                continue;
			            }
						$result[] = $value;
					}			
				}
			}
		}
		return $result;
	}
}

function pandora_number_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$min        = isset( $settings['min'] ) ? $settings['min'] : '';
	$max        = isset( $settings['max'] ) ? $settings['max'] : '';
	$suffix     = isset( $settings['suffix'] ) ? $settings['suffix'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<input type="number" min="' . $min . '" max="' . $max . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" style="max-width:100px; margin-right: 10px;" />' . $suffix;

	return $output;
}

vc_add_shortcode_param( 'number', 'pandora_number_settings_field' );

/**
 * Generate param type "radioimage"
 *
 * @param $settings
 * @param $value
 *
 * @return string
 */
function pandora_radioimage_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$radios     = isset( $settings['options'] ) ? $settings['options'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<input type="hidden" name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '_field ' . $class . '" value="' . $value . '"  ' . $dependency . ' />';
	$output .= '<div id="' . $param_name . '_wrap" class="icon_style_wrap ' . $class . '" >';
	if ( $radios != '' && is_array( $radios ) ) {
		$i = 0;
		foreach ( $radios as $key => $image_url ) {
			$class   = ( $key == $value ) ? ' class="selected" ' : '';
			$image   = '<img id="' . $param_name . $i . '_img' . $key . '" src="' . $image_url . '" ' . $class . '/>';
			$checked = ( $key == $value ) ? ' checked="checked" ' : '';
			$output .= '<input name="' . $param_name . '_option" id="' . $param_name . $i . '" value="' . $key . '" type="radio" '
			           . 'onchange="document.getElementById(\'' . $param_name . '\').value=this.value;'
			           . 'jQuery(\'#' . $param_name . '_wrap img\').removeClass(\'selected\');'
			           . 'jQuery(\'#' . $param_name . $i . '_img' . $key . '\').addClass(\'selected\');" '
			           . $checked . ' style="display:none;" />';
			$output .= '<label for="' . $param_name . $i . '">' . $image . '</label>';
			$i ++;
		}
	}
	$output .= '</div>';

	return $output;
}

vc_add_shortcode_param( 'radioimage', 'pandora_radioimage_settings_field' );

/**
 * Generate param type "preview"
 *
 * @param $settings
 * @param $value
 *
 * @return string
 */

function pandora_preview_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );

	return ' <div class="images_preview" ><img src="' . $value . '" width="300px" height="250px" />
  		<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field"  type="hidden" value="' . $value . '" ' . $dependency . '/></div>';
}

vc_add_shortcode_param( 'preview', 'pandora_preview_settings_field' );


//Add fastex font icon
add_filter( 'vc_iconpicker-type-fastex', 'vc_iconpicker_type_fastex' );
function vc_iconpicker_type_fastex( $icons ) {
	$fastex_icons = array(
		array( 'fastexicon-2440' => esc_html__( '2440', 'pandora' ) ),
		array( 'fastexicon-2441' => esc_html__( '2441', 'pandora' ) ),
		array( 'fastexicon-2442' => esc_html__( '2442', 'pandora' ) ),
		array( 'fastexicon-air6' => esc_html__( 'Air6', 'pandora' ) ),
		array( 'fastexicon-airplane66' => esc_html__( 'Airplane66', 'pandora' ) ),
		array( 'fastexicon-airplane67' => esc_html__( 'Airplane67', 'pandora' ) ),
		array( 'fastexicon-airplane68' => esc_html__( 'Airplane68', 'pandora' ) ),
		array( 'fastexicon-airplane7' => esc_html__( 'Airplane7', 'pandora' ) ),
		array( 'fastexicon-barscode' => esc_html__( 'Barscode', 'pandora' ) ),
		array( 'fastexicon-baskets3' => esc_html__( 'Baskets3', 'pandora' ) ),
		array( 'fastexicon-black330' => esc_html__( 'Black330', 'pandora' ) ),
		array( 'fastexicon-black331' => esc_html__( 'Black331', 'pandora' ) ),
		array( 'fastexicon-boat17' => esc_html__( 'Boat17', 'pandora' ) ),
		array( 'fastexicon-box107' => esc_html__( 'Box107', 'pandora' ) ),
		array( 'fastexicon-box109' => esc_html__( 'Box109', 'pandora' ) ),
		array( 'fastexicon-box49' => esc_html__( 'Box49', 'pandora' ) ),
		array( 'fastexicon-boxes1' => esc_html__( 'Boxes1', 'pandora' ) ),
		array( 'fastexicon-boxes16' => esc_html__( 'Boxes16', 'pandora' ) ),
		array( 'fastexicon-boxes18' => esc_html__( 'Boxes18', 'pandora' ) ),
		array( 'fastexicon-boxes2' => esc_html__( 'Boxes2', 'pandora' ) ),
		array( 'fastexicon-calendar30' => esc_html__( 'Calendar30', 'pandora' ) ),
		array( 'fastexicon-call36' => esc_html__( 'Call36', 'pandora' ) ),
		array( 'fastexicon-call37' => esc_html__( 'call37', 'pandora' ) ),
		array( 'fastexicon-cargo6' => esc_html__( 'Cargo6', 'pandora' ) ),
		array( 'fastexicon-check23' => esc_html__( 'Check23', 'pandora' ) ),
		array( 'fastexicon-chronometer10' => esc_html__( 'Chronometer10', 'pandora' ) ),
		array( 'fastexicon-clipboard52' => esc_html__( 'Clipboard52', 'pandora' ) ),
		array( 'fastexicon-clock214' => esc_html__( 'Clock214', 'pandora' ) ),
		array( 'fastexicon-commercial15' => esc_html__( 'Commercial15', 'pandora' ) ),
		array( 'fastexicon-container5' => esc_html__( 'Container5', 'pandora' ) ),
		array( 'fastexicon-container6' => esc_html__( 'Container6', 'pandora' ) ),
		array( 'fastexicon-containers' => esc_html__( 'Containers', 'pandora' ) ),
		array( 'fastexicon-crane6' => esc_html__( 'Crane6', 'pandora' ) ),
		array( 'fastexicon-crane7' => esc_html__( 'Crane7', 'pandora' ) ),
		array( 'fastexicon-delivered' => esc_html__( 'Delivered', 'pandora' ) ),
		array( 'fastexicon-delivery' => esc_html__( 'Delivery', 'pandora' ) ),
		array( 'fastexicon-delivery16' => esc_html__( 'Delivery16', 'pandora' ) ),
		array( 'fastexicon-delivery17' => esc_html__( 'Delivery17', 'pandora' ) ),
		array( 'fastexicon-delivery19' => esc_html__( 'Delivery19', 'pandora' ) ),
		array( 'fastexicon-delivery20' => esc_html__( 'Delivery20', 'pandora' ) ),
		array( 'fastexicon-delivery21' => esc_html__( 'Delivery21', 'pandora' ) ),
		array( 'fastexicon-delivery22' => esc_html__( 'Delivery22', 'pandora' ) ),
		array( 'fastexicon-delivery23' => esc_html__( 'Delivery23', 'pandora' ) ),
		array( 'fastexicon-delivery24' => esc_html__( 'Delivery24', 'pandora' ) ),
		array( 'fastexicon-delivery25' => esc_html__( 'Delivery25', 'pandora' ) ),
		array( 'fastexicon-delivery26' => esc_html__( 'Delivery26', 'pandora' ) ),
		array( 'fastexicon-delivery27' => esc_html__( 'Delivery27', 'pandora' ) ),
		array( 'fastexicon-delivery28' => esc_html__( 'Delivery28', 'pandora' ) ),
		array( 'fastexicon-delivery29' => esc_html__( 'Delivery29', 'pandora' ) ),
		array( 'fastexicon-delivery30' => esc_html__( 'Delivery30', 'pandora' ) ),
		array( 'fastexicon-delivery31' => esc_html__( 'Delivery31', 'pandora' ) ),
		array( 'fastexicon-delivery32' => esc_html__( 'Delivery32', 'pandora' ) ),
		array( 'fastexicon-delivery33' => esc_html__( 'Delivery33', 'pandora' ) ),
		array( 'fastexicon-delivery34' => esc_html__( 'Delivery34', 'pandora' ) ),
		array( 'fastexicon-delivery35' => esc_html__( 'Delivery35', 'pandora' ) ),
		array( 'fastexicon-delivery36' => esc_html__( 'Delivery36', 'pandora' ) ),
		array( 'fastexicon-delivery37' => esc_html__( 'Delivery37', 'pandora' ) ),
		array( 'fastexicon-delivery38' => esc_html__( 'Delivery38', 'pandora' ) ),
		array( 'fastexicon-delivery39' => esc_html__( 'Delivery39', 'pandora' ) ),
		array( 'fastexicon-direction105' => esc_html__( 'Direction105', 'pandora' ) ),
		array( 'fastexicon-factories1' => esc_html__( 'Factories1', 'pandora' ) ),
		array( 'fastexicon-factory' => esc_html__( 'Factory', 'pandora' ) ),
		array( 'fastexicon-flying6' => esc_html__( 'Flying6', 'pandora' ) ),
		array( 'fastexicon-fragile' => esc_html__( 'Fragile', 'pandora' ) ),
		array( 'fastexicon-free6' => esc_html__( 'Free6', 'pandora' ) ),
		array( 'fastexicon-frontal19' => esc_html__( 'Frontal19', 'pandora' ) ),
		array( 'fastexicon-glasses41' => esc_html__( 'Glasses41', 'pandora' ) ),
		array( 'fastexicon-grid17' => esc_html__( 'Grid17', 'pandora' ) ),
		array( 'fastexicon-identification4' => esc_html__( 'Identification4', 'pandora' ) ),
		array( 'fastexicon-international11' => esc_html__( 'International11', 'pandora' ) ),
		array( 'fastexicon-international12' => esc_html__( 'International12', 'pandora' ) ),
		array( 'fastexicon-international13' => esc_html__( 'International13', 'pandora' ) ),
		array( 'fastexicon-international14' => esc_html__( 'International14', 'pandora' ) ),
		array( 'fastexicon-international15' => esc_html__( 'International15', 'pandora' ) ),
		array( 'fastexicon-laptop28' => esc_html__( 'Laptop28', 'pandora' ) ),
		array( 'fastexicon-loaded-truck' => esc_html__( 'Loaded truck', 'pandora' ) ),
		array( 'fastexicon-localization2' => esc_html__( 'Localization2', 'pandora' ) ),
		array( 'fastexicon-lock18' => esc_html__( 'Lock18', 'pandora' ) ),
		array( 'fastexicon-locked14' => esc_html__( 'Locked14', 'pandora' ) ),
		array( 'fastexicon-logistics-delivery' => esc_html__( 'Logistics delivery', 'pandora' ) ),
		array( 'fastexicon-logistics' => esc_html__( 'Logistics', 'pandora' ) ),
		array( 'fastexicon-logistics1' => esc_html__( 'Logistics1', 'pandora' ) ),
		array( 'fastexicon-logistics2' => esc_html__( 'Logistics2', 'pandora' ) ),
		array( 'fastexicon-logistics3' => esc_html__( 'Logistics3', 'pandora' ) ),
		array( 'fastexicon-logistics4' => esc_html__( 'Logistics4', 'pandora' ) ),
		array( 'fastexicon-logistics5' => esc_html__( 'Logistics5', 'pandora' ) ),
		array( 'fastexicon-logistics53' => esc_html__( 'Logistics53', 'pandora' ) ),
		array( 'fastexicon-logisticsdelivery' => esc_html__( 'Logisticsdelivery', 'pandora' ) ),
		array( 'fastexicon-lorry' => esc_html__( 'Lorry', 'pandora' ) ),
		array( 'fastexicon-lorry1' => esc_html__( 'Lorry1', 'pandora' ) ),
		array( 'fastexicon-lorry3' => esc_html__( 'Lorry3', 'pandora' ) ),
		array( 'fastexicon-man236' => esc_html__( 'Man236', 'pandora' ) ),
		array( 'fastexicon-map19' => esc_html__( 'Map19', 'pandora' ) ),
		array( 'fastexicon-notepad2' => esc_html__( 'Notepad2', 'pandora' ) ),
		array( 'fastexicon-ocean3' => esc_html__( 'Ocean3', 'pandora' ) ),
		array( 'fastexicon-oil' => esc_html__( 'Oil', 'pandora' ) ),
		array( 'fastexicon-package10' => esc_html__( 'Package10', 'pandora' ) ),
		array( 'fastexicon-package11' => esc_html__( 'Package11', 'pandora' ) ),
		array( 'fastexicon-package12' => esc_html__( 'Package12', 'pandora' ) ),
		array( 'fastexicon-package13' => esc_html__( 'Package13', 'pandora' ) ),
		array( 'fastexicon-package7' => esc_html__( 'Package7', 'pandora' ) ),
		array( 'fastexicon-package8' => esc_html__( 'Package8', 'pandora' ) ),
		array( 'fastexicon-package9' => esc_html__( 'Package9', 'pandora' ) ),
		array( 'fastexicon-packages1' => esc_html__( 'Packages1', 'pandora' ) ),
		array( 'fastexicon-packages2' => esc_html__( 'Packages2', 'pandora' ) ),
		array( 'fastexicon-padlock94' => esc_html__( 'Padlock94', 'pandora' ) ),
		array( 'fastexicon-person279' => esc_html__( 'Person279', 'pandora' ) ),
		array( 'fastexicon-petrol3' => esc_html__( 'Petrol3', 'pandora' ) ),
		array( 'fastexicon-phone322' => esc_html__( 'Phone322', 'pandora' ) ),
		array( 'fastexicon-phone323' => esc_html__( 'Phone323', 'pandora' ) ),
		array( 'fastexicon-placeholder8' => esc_html__( 'Placeholder8', 'pandora' ) ),
		array( 'fastexicon-protection3' => esc_html__( 'Protection3', 'pandora' ) ),
		array( 'fastexicon-sea35' => esc_html__( 'Sea35', 'pandora' ) ),
		array( 'fastexicon-sea8' => esc_html__( 'Sea8', 'pandora' ) ),
		array( 'fastexicon-sea9' => esc_html__( 'Sea9', 'pandora' ) ),
		array( 'fastexicon-search51' => esc_html__( 'Search51', 'pandora' ) ),
		array( 'fastexicon-sign47' => esc_html__( 'Sign47', 'pandora' ) ),
		array( 'fastexicon-stopwatch12' => esc_html__( 'Stopwatch12', 'pandora' ) ),
		array( 'fastexicon-storage17' => esc_html__( 'Storage17', 'pandora' ) ),
		array( 'fastexicon-talking2' => esc_html__( 'Talking2', 'pandora' ) ),
		array( 'fastexicon-telephone50' => esc_html__( 'Telephone50', 'pandora' ) ),
		array( 'fastexicon-telephone90' => esc_html__( 'Telephone90', 'pandora' ) ),
		array( 'fastexicon-telephone91' => esc_html__( 'Telephone91', 'pandora' ) ),
		array( 'fastexicon-three110' => esc_html__( 'Three110', 'pandora' ) ),
		array( 'fastexicon-thumb5' => esc_html__( 'Thumb5', 'pandora' ) ),
		array( 'fastexicon-time74' => esc_html__( 'Time74', 'pandora' ) ),
		array( 'fastexicon-train20' => esc_html__( 'Train20', 'pandora' ) ),
		array( 'fastexicon-transport17' => esc_html__( 'Transport17', 'pandora' ) ),
		array( 'fastexicon-transport18' => esc_html__( 'Transport18', 'pandora' ) ),
		array( 'fastexicon-transport2' => esc_html__( 'Transport2', 'pandora' ) ),
		array( 'fastexicon-transport75' => esc_html__( 'Transport75', 'pandora' ) ),
		array( 'fastexicon-triangular42' => esc_html__( 'Triangular42', 'pandora' ) ),
		array( 'fastexicon-truck6' => esc_html__( 'Truck6', 'pandora' ) ),
		array( 'fastexicon-umbrella4' => esc_html__( 'Umbrella4', 'pandora' ) ),
		array( 'fastexicon-up72' => esc_html__( 'Up72', 'pandora' ) ),
		array( 'fastexicon-uparrow55' => esc_html__( 'Uparrow55', 'pandora' ) ),
		array( 'fastexicon-upload19' => esc_html__( 'Upload19', 'pandora' ) ),
		array( 'fastexicon-upload21' => esc_html__( 'Upload21', 'pandora' ) ),
		array( 'fastexicon-vehicle43' => esc_html__( 'Vehicle43', 'pandora' ) ),
		array( 'fastexicon-vehicle43' => esc_html__( 'Vehicle43', 'pandora' ) ),
		array( 'fastexicon-view10' => esc_html__( 'View10', 'pandora' ) ),
		array( 'fastexicon-weight10' => esc_html__( 'Weight10', 'pandora' ) ),
		array( 'fastexicon-weight11' => esc_html__( 'Weight11', 'pandora' ) ),
		array( 'fastexicon-weight3' => esc_html__( 'Weight3', 'pandora' ) ),
		array( 'fastexicon-weights8' => esc_html__( 'Weights8', 'pandora' ) ),
		array( 'fastexicon-woman16' => esc_html__( 'Woman16', 'pandora' ) ),
		array( 'fastexicon-woman93' => esc_html__( 'Woman93', 'pandora' ) ),
		array( 'fastexicon-wood5' => esc_html__( 'Wood5', 'pandora' ) ),
		array( 'fastexicon-world77' => esc_html__( 'World77', 'pandora' ) ),
		array( 'fastexicon-zoom9' => esc_html__( 'Zoom9', 'pandora' ) ),
	);

	return array_merge( $icons, $fastex_icons );
}


/**
 * Register scripts
 */
function pandora_register_backend_scripts() {
	wp_register_style( 'pandora_fastexicon', PANDORA_URL . 'css/font-icon/fastex-icon/fastexicon.css', false, 'screen' );
	wp_register_style( 'pandora_iconbox', PANDORA_URL . 'css/icon-box/icon-box.css', false, 'screen' );
}

add_action( 'vc_base_register_front_css', 'pandora_register_backend_scripts' );
add_action( 'vc_base_register_admin_css', 'pandora_register_backend_scripts' );


/**
 * Include backend scripts
 */
function pandora_enqueue_backend_scripts() {
	wp_enqueue_style( 'pandora_fastexicon' );
	wp_enqueue_style( 'pandora_iconbox' );
}

add_action( 'vc_backend_editor_enqueue_js_css', 'pandora_enqueue_backend_scripts' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'pandora_enqueue_backend_scripts' );

/**
 * Include Fastex Icon CSS
 */
function pandora_enqueue_scripts() {
	wp_enqueue_style( 'pandora-fastexicon', PANDORA_URL . 'css/font-icon/fastex-icon/fastexicon.css', false, 'screen' );
}

add_action( 'init', 'pandora_enqueue_scripts' );

/**
 * Get post categories array
 *
 * @return array
 */
function pandora_get_categories() {
	$args       = array(
		'type'   => 'post',
		'parent' => 0,
	);
	$categories = get_categories( $args );
	$filter     = array(
		__( 'No filter', 'pandora' ) => '',
	);
	foreach ( $categories as $category ) {
		$filter[ $category->name ] = $category->term_id;
	}

	return $filter;
}

/**
 * Custom excerpt
 *
 * @param $length
 *
 * @return string
 */
function pandora_get_the_excerpt( $length ) {
	$excerpt = get_the_excerpt();

	if ( ! $excerpt ) {
		$excerpt = esc_html__( 'Sometimes, a picture is worth a thousand words.', 'pandora' );

		return $excerpt;
	} else {
		if ( strlen( $excerpt ) < $length ) {
			return $excerpt;
		}

		$words   = explode( ' ', $excerpt );
		$excerpt = '';

		foreach ( $words as $word ) {
			if ( strlen( $excerpt ) < $length ) {
				$excerpt .= $word . ' ';
			} else {
				break;
			}
		}
	}

	return $excerpt;
}