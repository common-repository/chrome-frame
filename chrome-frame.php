<?php
/**
 * Chrome Frame
 * 
 * Copyright 2010 by hakre <http::/hakre.wordpress.com>, some rights reserved.
 * 
 *            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
 *                     Version 2, December 2004 
 * 
 *  Copyright (C) 2010 hakre <http::/hakre.wordpress.com>
 * 
 *  Everyone is permitted to copy and distribute verbatim or modified 
 *  copies of this license document, and changing it is allowed as long 
 *  as the name is changed. 
 * 
 *             DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
 *    TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION 
 * 
 *   0. You just DO WHAT THE FUCK YOU WANT TO. 
 * 
 * Wordpress Plugin Header:
 * 
 *   Plugin Name:       Chrome Frame
 *   Plugin URI:        http://hakre.wordpress.com/plugins/chrome-frame/
 *   Version:           1.5
 *   Author:            hakre
 *   Author URI:        http://hakre.wordpress.com
 *   Description:       Google Chrome Frame (GCF) for Wordpress Admin / Backend. Dual Mode Plugin, can be used as a standard Plugin or as a Must-Use Plugin.
 *   Tags:              Google, Chrome, Frame, Chrome Frame, Google Chrome Frame, GCF, Google Chrome, IE, Internet Explorer, Microsoft, Windows, Developer, ActiveX
 *   Min WP Version:    2.4
 *   Requires at least: 2.4
 *   Tested up to:      3.1-alpha
 *   Stable tag:        1.5
 */


/* 
 * Simple browser detection 
 * fixed as in http://core.trac.wordpress.org/ticket/14954
 * resp as in http://core.trac.wordpress.org/ticket/14537
 */

if ( isset($_SERVER['HTTP_USER_AGENT']) ) {
	isset($is_chromeframe) || $is_chromeframe = false;
	if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'chromeframe' ) ) {
		$is_chromeframe = true;
	}
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Lynx') !== false ) {
		$is_lynx = true;
	} elseif ( stripos($_SERVER['HTTP_USER_AGENT'], 'chrome') !== false && false === $is_chromeframe ) {
		$is_chrome = true;
	} elseif ( stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false ) {
		$is_safari = true;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') !== false ) {
		$is_gecko = true;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Win') !== false ) {
		$is_winIE = true;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Mac') !== false ) {
		$is_macIE = true;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false ) {
		$is_opera = true;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Nav') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Mozilla/4.') !== false ) {
		$is_NS4 = true;
	}
}

if ( $is_safari && stripos($_SERVER['HTTP_USER_AGENT'], 'mobile') !== false )
	$is_iphone = true;

$is_IE = ( $is_macIE || $is_winIE );


/* offer for admin */
return (defined('WP_ADMIN') && WP_ADMIN && isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'chromeframe') !== false)
		? header('X-UA-Compatible: chrome=1')
		: null;

#EOF;