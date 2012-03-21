<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

/* FANCY PANTS ACCORDION */

defined('_JEXEC') or die;

//add stylesheet
$doc =& JFactory::getDocument();
$doc->addStyleSheet(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/css/style.css', 'text/css' );
//include the class of the syndicate functions only once
require_once(dirname(__FILE__).'/helper.php');

//call to the class class
$list = mod_fancypantsaccordionHelper::getList($params);

//keeps module class suffix even if templateer tries to stop it
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

mod_fancypantsaccordionHelper::load_jquery($params);

$doc->addScript(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/js/jquery.easing.1.3.js');

if($params->get('poptotop','1')){
	$doc->addScript(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/js/jquery.accordion.js');
} else{
	$doc->addScript(JURI::base(true) . '/modules/mod_fancypantsaccordion/assets/js/jquery.accordion_noscroll.js');
}

require(JModuleHelper::getLayoutPath('mod_fancypantsaccordion'));
