<?php

// EAN field variable
add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );

function variation_settings_fields( $loop, $variation_data, $variation ) {
    woocommerce_wp_text_input(
        array(
            'id'            => "cod_ean{$loop}",
            'name'          => "cod_ean[{$loop}]",
            'value'         => get_post_meta( $variation->ID, 'cod_ean', true ),
            'label'         => __( 'EAN', 'simple-ean' ),
            'wrapper_class' => 'form-row form-row-full',
        )
    );
}

function save_variation_settings_fields( $variation_id, $loop ) {
    $text_field = $_POST['cod_ean'][ $loop ];

    if ( ! empty( $text_field ) ) {
        update_post_meta( $variation_id, 'cod_ean', esc_attr( $text_field ));
    }
}

// EAN field simple
add_action('woocommerce_product_options_inventory_product_data', 'product_inventory_data', 10, 0 );
add_action('woocommerce_process_product_meta', 'save_product_meta', 10, 2 );


function product_inventory_data() {
    woocommerce_wp_text_input(
        array(
            'id'            => "cod_ean",
            'name'          => "cod_ean",
            'value'         => get_post_meta( get_the_ID(), 'cod_ean', true ),
            'label'         => __( 'EAN', 'simple-ean' ),
        )
    );
}

function save_product_meta($id, $post) {
    $text_field = $_POST['cod_ean'];

    if ( ! empty( $text_field ) ) {
        update_post_meta( $id, 'cod_ean', esc_attr( $text_field ));
    }
}
