<?php
/**
 *
 *
 * @package   mod_riskprofiler
 * copyright Blackdale.com/Lukman Hussein
 * @license GPL3
 */

// no direct access
defined('_JEXEC') or die;


$script ="<script type='text/javascript' src='".$url."modules/mod_riskprofiler/js/jquery.validate.min.js'></script>";

$document =& JFactory::getDocument();
$document->addCustomTag($script);


    function runsql($itemid){
        $db =& JFactory::getDBO();
        $sql = "SELECT title, path FROM rlcb8_menu WHERE link LIKE 'index.php?option=com_content&view=article&id=".$itemid."' LIMIT 1";
        $db->setQuery($sql);
        $result = $db->loadObject();
        return $result;
    }

    function classized($var) {
    	return strtolower(str_replace(' ','_',$var));
    }