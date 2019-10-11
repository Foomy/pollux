<?php

/**
 * Controller for all actions related to the book collection.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	controller
 * @package		MovieController
 */

class BookController extends Pollux_Controller_Abstract
{
	public function indexAction()
	{
		/** @var Model_Media_Table $mediaTable */
		$mediaTable = Model_Table_Abstract::getTableFromString('Model_Media_Table');
		$books = $mediaTable->getAllBooks();

		$this->view->books = $books;
	}
}
