<?php

/**
 * Subform for the media form. This sub form contains the
 * buttons (e.g. submit, cancel, etc.)
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	form
 * @package		Form_SubForm_MetaCtrl
 */

class Form_SubForm_MediaCtrl extends Zend_Form_SubForm
{
	const F_NAME = 'MediaCtrl';

	public function init()
	{
		$this->clearDecorators();
		$this->addDecorators(array(
			'FormElements',
			array(
				'HtmlTag',
				array(
					'tag' => 'fieldset',
					'class' => 'formCtrl'
				)
			)
		));

		$this->addElements(array(
			$this->createSubmitButton(),
			$this->createCancelButton()
		));
	}

	/**
	 * Creates and returns the cancel button.
	 *
	 * @return Zend_Form_Element_Button
	 */
	protected function createCancelButton()
	{
		$element = new Zend_Form_Element_Button('cancel');
		$element->setLabel('Abbrechen')
			->clearDecorators()
			->addDecorator('ViewHelper')
			->setAttribs(array(
				'class' => 'formButton red'
			));

		return $element;
	}

	/**
	 * Creates and returns the cancel button.
	 *
	 * @return Zend_Form_Element_Button
	 */
	protected function createSubmitButton()
	{
		$element = new Zend_Form_Element_Submit('submit');
		$element->setLabel('Speichern')
			->clearDecorators()
			->addDecorator('ViewHelper')
			->setAttribs(array(
				'class' => 'formButton green'
			));

		return $element;
	}
}
