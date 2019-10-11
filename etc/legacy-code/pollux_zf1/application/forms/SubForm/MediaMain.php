<?php

/**
 * Subform for the left column of the media form. This form
 * contains the fields for editing main information.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	form
 * @package		Form_SubForm_MediaMain
 */

class Form_SubForm_MediaMain extends Zend_Form_SubForm
{
	const F_NAME = 'MediaMain';

	const L_TITLE			= 'Titel';
	const L_ORIGINAL_TITLE	= 'Originaltitel';
	const L_BLURB			= 'Klappentext';

	public function init()
	{
		$this->setLegend('Generelle Infos');
		$this->setAttrib('class', 'general');
		$this->clearDecorators();
		$this->addDecorators(array(
			'FormElements',
			'Fieldset'
		));

		$this->addElements(array(
			$this->createTitleField(),
			$this->createOriginalTitleField(),
			$this->createBlurbTextarea()
		));
	}

	protected function createTitleField()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('fieldLbl');

		$element = new Zend_Form_Element_Text(Model_Media_Table::F_TITLE);
		$element->setLabel(self::L_TITLE)
			->clearDecorators()
			->setDecorators(array(
			'ViewHelper',
			$dtDdWrapper
		));

		return $element;
	}

	protected function createOriginalTitleField()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('fieldLbl');

		$element = new Zend_Form_Element_Text('original_title');
		$element->setLabel(self::L_ORIGINAL_TITLE)
				->clearDecorators()
				->setDecorators(array(
					'ViewHelper',
					$dtDdWrapper
				));

		return $element;
	}

	protected function createBlurbTextarea()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('textareaLbl');

		$element = new Zend_Form_Element_Textarea('blurb');
		$element->setLabel(self::L_BLURB)
			->clearDecorators()
			->setDecorators(array(
			'ViewHelper',
			$dtDdWrapper
		));

		return $element;
	}
}
