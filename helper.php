<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.model');
JModel::addIncludePath(JPATH_SITE.'/components/com_content/models');

class mod_fancypantsaccordionHelper{
	
	public function load_jquery($params){
		$doc = JFactory::getDocument();
		$app = JFactory::getApplications();
		
		static $jqLoaded;
		
		if ($jqLoaded){
			return;
		}
		
		if ($params->get('load_jquery') && !$app->get('jQuery')){
			$file=JURI::root(true).'/modules/mod_fancypantsaccordion/assets/js/jquery-1.7.1.min.js';
			$app->set('jQuery',1);
			$doc->addScript($file);
			$doc->addScriptDeclaration("jQuery.noConflict();");
			$jqLoaded = TRUE;
		}
	}
	
	public function getList($params){
		$app = JFactory::getApplication();
		//calls to application
		
		$db = JFactory::getDBO();
		//connects to database
		
		//get an instance of generic article model
		$model = JModel::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		//set the application parameters
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params',$appParams);
		
		//start the list of content from the beginning
		$model->setState('list.start',0);
		
		//gets how many to stop at from parameters or sets as 5
		$model->setState('list.limit',(int) $params->get('count',5));
		
		//filters out unpublished content
		$model->setState('filter.published',1);
		
		//lists fields to return
		$model->setState('list.select','a.id, a.fulltext, a.title, a.alias, a.title_alias, a.introtext, a.state, a.catid');
		
		//sets access levels on articles for non registered etc
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access',$access);
		
		//filter out by category we defined in xml
		$model->setState('filter.category_id',$params->get('catid',array()));
		
		//filter out other languages
		$model->setState('filter.language',$app->getLanguageFilter());	
		
		$items = $model->getItems();
		return $items;
		
	}
	
}