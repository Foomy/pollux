<?php

require_once 'Zend/View/Helper/Abstract.php';

/**
 * 
 *
 * @author		Sascha Schneider <sascha.schneider@vonaffenfels.de>
 *
 * @category
 * @package
 * @subpackage
 */
class Zend_View_Helper_PruneList extends Zend_View_Helper_Abstract
{
	private $prunedString = '';

	public function pruneList($value, $remainCount)
	{
		$elements = explode(', ', $value);
		array_splice($elements, $remainCount);
		return implode(',<br>', $elements);
	}
}
