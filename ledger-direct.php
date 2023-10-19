<?php
/**
 * Plugin Name: LedgerDirect
 * Plugin URI: https://ledger-direct.com
 * Description: A XRP Ledger integration.
 * Version: 0.0.1
 * Author: Alexander Busse | Hardcastle Technologies
 * Author URI: https://hardcastle.technology
 * Text Domain: ledger-direct
 * Domain Path: /i18n/languages/
 * Requires at least: 6.2
 * Requires PHP: 8.1
 *
 * @package LedgerDirect
 */

/**
 * Plugin deactivation hook.
 */
function ledger_direct_activate() {

}
register_activation_hook( __FILE__, 'ledger_direct_activate' );

/**
 * Plugin deactivation hook.
 */
function ledger_direct_deactivate() {

}
register_deactivation_hook( __FILE__, 'ledger_direct_deactivate' );

/**
 * Plugin deactivation hook.
 */
function ledger_direct_uninstall() {

}
register_uninstall_hook(__FILE__, 'ledger_direct_uninstall');