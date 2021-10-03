<?php
//Meta metabox with all meta fields for admin (based on woocmmerce-jetpack plugin script) 

//create metabox
function create_meta_meta_box( $post ) {
	$html    = '';
	$post_id = get_the_ID();
	$product = wc_get_product( $post->ID );

	$meta = get_post_meta( $post_id );
	$table_data = array();
	foreach ( $meta as $meta_key => $meta_values ) {
		$table_data[] = array( $meta_key, esc_html( print_r( maybe_unserialize( $meta_values[0] ), true ) ) );
	}
	$html .= get_table_html( $table_data, array( 'table_class' => 'widefat striped', 'table_heading_type' => 'vertical' ) );

	//variations
	if ( 'product' === $post->post_type && $product->is_type( 'variable' ) ) {
		$variations = $product->get_available_variations();
		foreach ( $variations as $variable_array ) {
			$variation_id = $variable_array['variation_id'];
			$meta = get_post_meta( $variation_id );
			$table_data = array();
			$table_data[] = array('<span style="font-weight:bold;">Вариация: '.$variation_id.'</span>','');
			foreach ( $meta as $meta_key => $meta_values ) {
				$table_data[] = array( $meta_key, esc_html( print_r( maybe_unserialize( $meta_values[0] ), true ) ) );
			}
			$html .= get_table_html( $table_data, array( 'table_class' => 'widefat striped', 'table_heading_type' => 'vertical' ) );
		}
	}

	// items meta (for orders only)
	if ( 'shop_order' === $post->post_type ) {
		$_order = wc_get_order( $post_id );
		$table_data = array();
		foreach ( $_order->get_items() as $item_key => $item ) {
			foreach ( $item['item_meta'] as $item_meta_key => $item_meta_value ) {
				$table_data[] = array( $item_key, $item_meta_key, esc_html( print_r( maybe_unserialize( $item_meta_value ), true ) ) );
			}
		}
		if ( ! empty( $table_data ) ) {
			$html .= '<h3>Order Items Meta</h3>';
			$table_data = array_merge(
				array( array( 'Item Key', 'Item Meta Key', 'Item Meta Value' ) ),
				$table_data
			);
			$html .= get_table_html( $table_data, array( 'table_class' => 'widefat striped', 'table_heading_type' => 'horizontal' ) );
		}
	}
	echo $html;
}

//generate table
if ( ! function_exists( 'get_table_html' ) ) {
	function get_table_html( $data, $args = array() ) {
		$defaults = array(
			'table_class'        => '',
			'table_style'        => '',
			'row_styles'         => '',
			'table_heading_type' => 'horizontal',
			'columns_classes'    => array(),
			'columns_styles'     => array(),
		);
		$args = array_merge( $defaults, $args );
		extract( $args );
		$table_class = ( '' == $table_class ) ? '' : ' class="' . $table_class . '"';
		$table_style = ( '' == $table_style ) ? '' : ' style="' . $table_style . '"';
		$row_styles  = ( '' == $row_styles )  ? '' : ' style="' . $row_styles  . '"';
		$html = '';
		$html .= '<table' . $table_class . $table_style . '>';
		$html .= '<tbody>';
		foreach( $data as $row_number => $row ) {
			$html .= '<tr' . $row_styles . '">';
			foreach( $row as $column_number => $value ) {
				$th_or_td = ( ( 0 === $row_number && 'horizontal' === $table_heading_type ) || ( 0 === $column_number && 'vertical' === $table_heading_type ) ) ? 'th' : 'td';
				$column_class = ( ! empty( $columns_classes ) && isset( $columns_classes[ $column_number ] ) ) ? ' class="' . $columns_classes[ $column_number ] . '"' : '';
				$column_style = ( ! empty( $columns_styles ) && isset( $columns_styles[ $column_number ] ) ) ? ' style="' . $columns_styles[ $column_number ] . '"' : '';

				$html .= '<' . $th_or_td . $column_class . $column_style . '>';
				$html .= $value;
				$html .= '</' . $th_or_td . '>';
			}
			$html .= '</tr>';
		}
		$html .= '</tbody>';
		$html .= '</table>';
		return $html;
	}
}

//add metabox
add_action( 'add_meta_boxes', 'add_order_meta_meta_box' );
function add_order_meta_meta_box() {
	add_meta_box(
		'products-and-orders-meta-table',
		'Все мета поля:',
		'create_meta_meta_box',
		array('shop_order','product', 'user', 'netping_news'),
		'normal',
		'low'
	);
}

