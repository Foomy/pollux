<?php

/**
 * Subform for the right column of the media form. This form
 * contains fields for editing meta information.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	form
 * @package		Form_SubForm_MediaMeta
 */

class Form_SubForm_MediaExtras extends Zend_Form_SubForm
{
	const F_NAME = 'MediaExtras';

	const L_MEDIUM		= 'Medium';
	const L_GENRE		= 'Genre';
	const L_DIRECTOR	= 'Regie';
	const L_WRITERS		= 'Drehbuch';
	const L_STARRING	= 'Darsteller';

	public function init()
	{
		$this->setLegend('Zusätzliche Infos');
		$this->setAttrib('class', 'additional');
		$this->clearDecorators();
		$this->addDecorators(array(
			'FormElements',
			'Fieldset'
		));

		$this->addElements(array(
			$this->createMediumField(),
			$this->createGenreField(),
			$this->createDirectorField(),
			$this->createWriterTexarea(),
			$this->createStarringTextarea()
		));
	}

	/**
	 * Creates and returns the text element for the medium type
	 * the movie comes on. (e.g. VHS, DVD or Blu-Ray)
	 *
	 * @return	Zend_Form_Element_Text
	 */
	protected function createMediumField()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('fieldLbl');

		$element = new Zend_Form_Element_Text('medium');
		$element->setLabel(self::L_MEDIUM)
				->clearDecorators()
				->setDecorators(array(
					'ViewHelper',
					$dtDdWrapper
				));

		return $element;
	}

	/**
	 * Creates and returns the text element for the movie's genre.
	 *
	 * @return	Zend_Form_Element_Text
	 */
	protected function createGenreField()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('fieldLbl');

		$element = new Zend_Form_Element_Text('genre');
		$element->setLabel(self::L_GENRE)
				->clearDecorators()
				->setDecorators(array(
					'ViewHelper',
					$dtDdWrapper
				));

		return $element;
	}

	/**
	 * Creates and returns the text element for the director.
	 *
	 * @return	Zend_Form_Element_Text
	 */
	protected function createDirectorField()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('fieldLbl');

		$element = new Zend_Form_Element_Text('director');
		$element->setLabel(self::L_DIRECTOR)
				->clearDecorators()
				->setDecorators(array(
					'ViewHelper',
					$dtDdWrapper
				));

		return $element;
	}

	/**
	 * Creates and returns the textarea element for the writers.
	 *
	 * @return	Zend_Form_Element_Text
	 */
	protected function createWriterTexarea()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('textareaLbl');

		$element = new Zend_Form_Element_Textarea('writers');
		$element->setLabel(self::L_WRITERS)
				->clearDecorators()
				->setDecorators(array(
					'ViewHelper',
					$dtDdWrapper
				));

		return $element;
	}

	/**
	 * Creates and returns the textarea element for starring list.
	 *
	 * @return	Zend_Form_Element_Text
	 */
	protected function createStarringTextarea()
	{
		$dtDdWrapper = new Foo_Form_Decorator_DtDdWrapper();
		$dtDdWrapper->setDtClass('textareaLbl');

		$element = new Zend_Form_Element_Textarea('starring');
		$element->setLabel(self::L_STARRING)
				->clearDecorators()
				->setDecorators(array(
					'ViewHelper',
					$dtDdWrapper
				));

		return $element;
	}
}
