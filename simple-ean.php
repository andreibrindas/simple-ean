<?php
/**
 * Plugin Name
 *
 * @package           Simple Woocommerce EAN
 * @author            Andrei Brindas
 * @copyright         2021 Andrei Brindas
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Woocommerce EAN
 * Plugin URI:        https://andreibrindas.com/simple-ean
 * Description:       Ads EAN field for both Simple and Variable products
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Andrei Brindas
 * Author URI:        https://andreibrindas.com
 * Text Domain:       simple-ean
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function simple_ean_check_for_woo() {
    $active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
    if ( in_array( 'woocommerce/woocommerce.php', $active_plugins ) ) {
        // Plugin is active        
    } else {
        ?>
            <div class="updated notice is-dismissible">
                <p>You can't activate this plugin unles you have <strong>Woocommerce active</strong>. Please activate Woocommerce before trying to activate this plugin.</p>
            </div>
        <?php
    }
}



function simple_ean_activate() { 
    // Trigger our function that registers the custom post type plugin.
    simple_ean_check_for_woo();
}
register_activation_hook( __FILE__, 'simple_ean_activate' );

require_once plugin_dir_path( __FILE__ ) . "includes/ean.php";
