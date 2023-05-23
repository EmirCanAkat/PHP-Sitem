<?php
include 'authentication.php';

// Header info for Temporarily service
header("HTTP/1.1 503 Service Temporarily Unavailable");
header("Status: 503 Service Temporarily Unavailable");

/**
 * Name: Crad - PHP Coming Soon and Maintenance Mode Admin Panel
 * URI: http://live.envalab.com/php/crad/
 * Description: Crad – is a creative, unique and universal coming soon template that specially designed for coming soon/under construction related websites. It can be use for any kind of Business, Agency, Hotel, Restaurant, Personal, Corporate, Gym, Contract, Maintenance, Tours & Travels, Product Launch, Service Launch etc related website landing.
 * Version: 1.0.0
 * Author: Envalab
 * Author URI: http://envalab.com/
 */

/**
 * Routing
 */
$page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : "general-settings";
$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');

// Get pages
switch ($page) {
	case 'design-templates':
		require_once('crad-design-templates.php');
		break;
	case 'about-page':
		require_once('crad-about-page.php');
		break;
	case 'contact-page':
		require_once('crad-contact-page.php');
		break;
	case 'subscribers':
		require_once('crad-subscribers.php');
		break;
	case 'seo-smtp':
		require_once('crad-seo-smtp.php');
		break;
	case 'user-pass':
		require_once('crad-user-pass.php');
		break;
	
	default:
		require_once('crad-general-settings.php');
		break;
}
