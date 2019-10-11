<?php

/**
 * Application bootstrap.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	application
 * @package		Bootstrap
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Bootstrap autoloader for application resources
	 *
	 * @return Zend_Application_Module_Autoloader
	 */
	protected function _initAutoload()
	{
		$config = $this->getOption('autoloader');
		$autoloader = new Zend_Loader_Autoloader_Resource($config);

		return $autoloader;
	}

	/**
	 * Initialises the routes using the configuration file.
	 */
	protected function _initRouter()
	{
		$front = Zend_Controller_Front::getInstance();

		$cfgPath = $this->getOption('configPath');
		$config = new Zend_Config_Ini($cfgPath . 'routes.ini', 'production');

		$router = $front->getRouter();
		$router->addConfig($config, 'routes');
	}

	/**
	 * Initialises the view.
	 *
	 * @return Zend_View $view   The View Object.
	 */
	protected function _initView()
	{
		$view = new Zend_View();

		$view->doctype('HTML5');
		$view->headTitle('Pollux');

		$view->headMeta()->setCharset('UTF-8');

		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
		$viewRenderer->setView($view);

		// @todo set skin and sublayout dynamicaly
		$view->skin = 'default';
		$view->subLayout = 'standard';

		return $view;
	}

	protected function _initHelper()
	{
		Zend_Controller_Action_HelperBroker::addPrefix('Foo_Controller_Action_Helper');
		Zend_Controller_Action_HelperBroker::addPath(
			APPLICATION_PATH . '/../library/Foo/Controller/Action/Helper',
			'Foo_Controller_Action_Helper'
		);
	}

	/**
	 * Initialises the date/timezone settings.
	 *
	 * @return void
	 */
	protected function _initTimezone()
	{
		// Set date/time zone
		date_default_timezone_set('Europe/Berlin');
	}

//	protected function _initNav()
//	{
//		$view = $this->bootstrap('view')->getResource('view');
//
//		$cfgPath = $this->getOption('configPath');
//		$config = new Zend_Config_Ini($cfgPath . 'navigation.ini', APPLICATION_ENV);
//
//		$response = $view->getResponse();
//		$response->insert('_navigation', $view->render('navigation.html'));
//	}

	/**
	 * Initalises the navigation, and stores it
	 * into the view.
	 *
	protected function _initNavigation()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');

		$cfgPath = $this->getOption('configPath');
		$config = new Zend_Config_Ini($cfgPath . 'navigation.ini', APPLICATION_ENV);

		$config = array(
			array(
				'label'	=> ':: Mainnavigation ::',
				'class'	=> 'head',
				'uri'	=> ''
			),
			array(
				'label'			=> 'Home',
				'controller'	=> 'index',
				'action'		=> 'index'
			),
			array(
				'label'			=> 'Filme',
				'controller'	=> 'movie',
				'action'		=> 'index'
			),
			array(
				'label'			=> 'Bücher',
				'controller'	=> 'book',
				'action'		=> 'index'
			),
			array(
				'label'	=> ' ',
				'uri'	=> '/'
			),
			array(
				'label'	=> ':: Administration ::',
				'class'	=> 'head',
				'uri'	=> ''
			),
			array(
				'label'			=> 'Film hinzufügen',
				'controller'	=> 'movie',
				'action'		=> 'add'
			),
			array(
				'label'			=> 'Buch hinzufügen',
				'controller'	=> 'book',
				'action'		=> 'add'
			),
			array(
				'label'			=> 'Benutzer hinzufügen',
				'controller'	=> 'user',
				'action'		=> 'add'
			),
		);

		$navigation = new Zend_Navigation($config);
		$view->getHelper('navigation')->navigation($navigation);
	}
	 */
}