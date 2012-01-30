<?php

/* FANCY PANTS ACCORDION */

defined('_JEXEC') or die;

//add stylesheet
$doc =& JFactory::getDocument();
$doc->addStyleSheet(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/css/style.css', 'text/css' );
$doc->addScript(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/js/jquery.easing.1.3.js');
$doc->addScript(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/js/jquery.accordion.js');
//include the class of the syndicate functions only once
require_once(dirname(__FILE__).'/helper.php');

//call to the class class
$list = mod_fancypantsaccordionHelper::getList($params);

//keeps module class suffix even if templateer tries to stop it
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require(JModuleHelper::getLayoutPath('mod_fancypantsaccordion'));
