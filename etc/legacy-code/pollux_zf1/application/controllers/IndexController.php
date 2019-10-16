<?php

class IndexController extends Pollux_Controller_Abstract
{

	public function init()
	{
//		$bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
//		$cfgPath = $bootstrap->getOption('configPath');
//		$config = new Zend_Config_Ini($cfgPath . 'navigation.ini', APPLICATION_ENV);
//
//		$this->view->navItems = $config->toArray();
//
//		$response = $this->view->getResponse();
//		$response->insert('_navigation', $this->view->render('navigation.html'));
	}

	public function indexAction()
	{
	}
}
