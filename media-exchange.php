<?php
/**
 * Plugin Name: Media Exchange
 * Plugin URI: -
 * Description: 動画と静止画を簡単に切り替えるためのプラグイン。
 * Version: 0.1.0
 * Author: Tatsuhiro Sakata
 * Author URI: https://grace-create.com/
 * Text Domain: gcme
 * Domain Path: /languages/
 * License: GPLv3

 * Copyright 2019  grace-create  (email: info@grace-create.com)

 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

 * @package media-exchange
 */

// 0.1.0
// 5.0
// full path
// media-exchange/media-exchange.php
// media-exchange
// ~\wp-content\plugins\media-exchange
// https://~/wp-content/plugins/media-exchange
define( 'GCME_VERSION', '0.1.0' );
define( 'GCME_REQUIRED_WP_VERSION', '5.0' );
define( 'GCME_PLUGIN', __FILE__ );
define( 'GCME_PLUGIN_BASENAME', plugin_basename( GCME_PLUGIN ) );
define( 'GCME_PLUGIN_NAME', trim( dirname( GCME_PLUGIN_BASENAME ), '/' ) );
define( 'GCME_PLUGIN_DIR', untrailingslashit( dirname( GCME_PLUGIN ) ) );
define( 'GCME_PLUGIN_URL', untrailingslashit( plugins_url( '', GCME_PLUGIN ) ) );

require_once GCME_PLUGIN_DIR . '/includes/admin-options.php';
require_once GCME_PLUGIN_DIR . '/includes/front-options.php';
require_once GCME_PLUGIN_DIR . '/includes/controller.php';
