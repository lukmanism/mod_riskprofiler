<?php
/**
 *
 *
 * @package   mod_riskprofiler
 * copyright Lukman Hussein
 * @license GPL3
 */

// no direct access
defined('_JEXEC') or die;


//Collect Parameters
$url = JURI::base();
$uri = $_SERVER['REQUEST_URI'];
$title      = $params->get('title');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

require JModuleHelper::getLayoutPath('mod_riskprofiler', $params->get('layout', 'default'));

