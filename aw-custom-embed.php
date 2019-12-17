<?php
/*
Plugin Name: AW Custom Embed
Plugin URI: https://careru.jp/
Description: Embedをカスタマイズしたもの
Author: Alternative Works
Version: 0.0.3
Author URI: https://careru.jp/
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( dirname( __FILE__ ) . '/update-checker/update-checker.php');
require_once( dirname( __FILE__ ) . '/common/main.php' );
require_once( dirname( __FILE__ ) . '/common/codepen.php' );
require_once( dirname( __FILE__ ) . '/common/chrome-webstore.php' );