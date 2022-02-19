<?php

function productsIdsDefaultValue( $current_value, $param_settings, $map_settings, $atts ) {
    $value = trim( $current_value );
    if ( strlen( trim( $value ) ) === 0 && isset( $atts['skus'] ) && strlen( $atts['skus'] ) > 0 ) {
        $data = array();
        $skus = $atts['skus'];
        $skus_array = explode( ',', $skus );
        foreach ( $skus_array as $sku ) {
            $id = $this->productIdDefaultValueFromSkuToId( trim( $sku ) );
            if ( is_numeric( $id ) ) {
                $data[] = $id;
            }
        }
        if ( ! empty( $data ) ) {
            $values = explode( ',', $value );
            $values = array_merge( $values, $data );
            $value = implode( ',', $values );
        }
    }

    return $value;
}
function productIdAutocompleteRender( $query ) {
    $query = trim( $query['value'] ); // get value from requested
    if ( ! empty( $query ) ) {
        // get product
        $product_object = wc_get_product( (int) $query );
        if ( is_object( $product_object ) ) {
            $product_sku = $product_object->get_sku();
            $product_title = $product_object->get_title();
            $product_id = $product_object->id;

            $product_sku_display = '';
            if ( ! empty( $product_sku ) ) {
                $product_sku_display = ' - ' . __( 'Sku', 'js_composer' ) . ': ' . $product_sku;
            }

            $product_title_display = '';
            if ( ! empty( $product_title ) ) {
                $product_title_display = ' - ' . __( 'Title', 'js_composer' ) . ': ' . $product_title;
            }

            $product_id_display = __( 'Id', 'js_composer' ) . ': ' . $product_id;

            $data = array();
            $data['value'] = $product_id;
            $data['label'] = $product_id_display . $product_title_display . $product_sku_display;

            return ! empty( $data ) ? $data : false;
        }

        return false;
    }

    return false;
}

function productIdAutocompleteSuggester( $query ) {
    global $wpdb;
    $product_id = (int) $query;
    $post_meta_infos = $wpdb->get_results(
        $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
					FROM {$wpdb->posts} AS a
					LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
					WHERE a.post_type = 'product' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )",
            $product_id > 0 ? $product_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

    $results = array();
    if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
        foreach ( $post_meta_infos as $value ) {
            $data = array();
            $data['value'] = $value['id'];
            $data['label'] = __( 'Id', 'js_composer' ) . ': ' .
                $value['id'] .
                ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'js_composer' ) . ': ' .
                    $value['title'] : '' ) .
                ( ( strlen( $value['sku'] ) > 0 ) ? ' - ' . __( 'Sku', 'js_composer' ) . ': ' .
                    $value['sku'] : '' );
            $results[] = $data;
        }
    }

    return $results;
}