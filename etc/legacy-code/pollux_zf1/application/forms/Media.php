<?php

class Form_Media extends Zend_Form
{
	private $mediatype_id;

	public function __construct(array $options)
	{
		if (empty($options) || (! array_key_exists(Model_Media_Table::F_MEDIATYPE_ID, $options))) {
			throw new Zend_Form_Exception('No mediatype ID given.');
		}

		$this->mediatype_id = $options[Model_Media_Table::F_MEDIATYPE_ID];
		parent::__construct();
	}

	public function init()
	{
		$this->setAttrib('id', 'mediaForm');
		$this->clearDecorators();
		$this->addDecorators(array(
			'FormElements',
			'Form'
		));

		$subFormMediaMain = new Form_SubForm_MediaMain();
		$subFormMediaMeta = new Form_SubForm_MediaExtras();
		$subFormMediaCtrl = new Form_SubForm_MediaCtrl();

		$this->addElements(array(
			$this->createMediaIdHidden(),
			$this->createMediatypeIdHidden()
		));

		$this->addSubForms(array(
			Form_SubForm_MediaMain::F_NAME		=> $subFormMediaMain,
			Form_SubForm_MediaExtras::F_NAME	=> $subFormMediaMeta,
			Form_SubForm_MediaCtrl::F_NAME		=> $subFormMediaCtrl
		));
	}

	public function createMediaIdHidden()
	{
		$element = new Zend_Form_Element_Hidden(Model_Media_Table::F_ID);
		$element->clearDecorators()
				->addDecorator('ViewHelper');
		return $element;
	}

	public function createMediatypeIdHidden()
	{
		$element = new Zend_Form_Element_Hidden(Model_Media_Table::F_MEDIATYPE_ID);
		$element->setValue($this->mediatype_id)
				->clearDecorators()
				->addDecorator('ViewHelper');
		return $element;
	}
}