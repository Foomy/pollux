<?php

/**
 * Controller for all actions related to the movie collection.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	controller
 * @package		MovieController
 */

class MovieController extends Pollux_Controller_Abstract
{
	public function indexAction()
	{
		/** @var Model_Media_Table $mediaTable */
		$mediaTable = $this->getTable('media');
		$movies = $mediaTable->getAllMovies();

		$this->view->movies = $movies;
	}

	public function addAction ()
	{
		$form = Form_Media_Factory::create(Model_Mediatype_Table::MTYPE_MOVIES);

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				$values = $form->getValues();
print_r($values);

				$movie = new Model_Movie();
				$movie->title = $values['title'];

				$movie->original_title = $values[Form_SubForm_MediaMain::F_NAME]['original_title'];
				$movie->blurb = $values[Form_SubForm_MediaMain::F_NAME]['blurb'];

				$movie->medium		= $values[Form_SubForm_MediaExtras::F_NAME]['medium'];
				$movie->genre		= $values[Form_SubForm_MediaExtras::F_NAME]['genre'];
				$movie->director	= $values[Form_SubForm_MediaExtras::F_NAME]['director'];
				$movie->writers		= $values[Form_SubForm_MediaExtras::F_NAME]['writers'];
				$movie->starring	= $values[Form_SubForm_MediaExtras::F_NAME]['starring'];

				$movie->save();
exit;
			}
		}

		$this->view->form = $form;
	}
}
