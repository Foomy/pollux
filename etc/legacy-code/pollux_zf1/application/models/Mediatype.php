<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mediatype
 *
 * @author Schneider
 */
class Model_Mediatype extends Model_Table_Row_Abstract
{
	/**
	 * @return	string
	 */
	public function getTypename()
	{
		return $this->{Model_Mediatype_Table::F_TYPENAME};
	}

	/**
	 * @param string $typename
	 */
	public function setTypename($typename)
	{
		$this->{Model_Mediatype_Table::F_TYPENAME} = $typename;
	}
}
